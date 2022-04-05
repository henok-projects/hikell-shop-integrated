async function stripeTokenHandler(token, amount, descr, cardEndpoint, metadata) {

    var details = {
        stripeToken: token.id,
        amount: amount,
        description: descr,
        source: 'stripe',
        _token: $("input[name='_token']").val(),
        origin_site: $("input[name='origin_site']").val(),
        ...metadata
    }
    // Finish the payment process in backend by sending card token id only.
    await $.post(cardEndpoint, details, function (data, textStatus, xhr) {
        if (cardEndpoint === "/goldenbuzzer") {
            // the success payment is for goldenbuzzer, add the vote amount.
            let { votes } = metadata
            let curVotes = parseInt($("button#vote span:last-child").text());
            let updatedVotes = curVotes + parseInt(votes);
            $("button#vote span:last-child").text(updatedVotes);
        }
        if (data.message) {
            $("input[name='payment_id']").val(data.payment_id);
            $('div#msgBox').css('display', 'block');
            $('div#msgBox').html('<div class="px-4 py-2 bg-green-700 text-white rounded">' + data.message + '</div>');
            if (cardEndpoint === "/enroll/pay")
                window.location.href = "/upload/hgt";
        } else {
            $('div#msgBox').css('display', 'block');
            $('div#msgBox').html('<div class="px-4 py-2 bg-red-700 text-white rounded">' + data.error + '</div>');
        }
    });

}



async function submitPromotion(token, amount, descr, cardEndpoint, metadata) {
    var details = {
        stripeToken: token.id,
        amount: amount,
        paymentDescr: descr,
        source: 'stripe',
        _token: $("input[name='_token']").val(),
        origin_site: $("input[name='origin_site']").val(),
        ...metadata
    }

    var formData = new FormData();

    formData.append('stripeToken', token.id);
    formData.append('amount', amount);
    formData.append('source', details.source);
    formData.append('paymentDescr', descr);
    formData.append('_token', details._token);
    formData.append('origin_site', details.origin_site);
    formData.append('location', details.location);
    formData.append('header', details.header);
    formData.append('description', details.description);
    formData.append('url', details.url);
    formData.append('thumbnail', details.thumbnail);
    formData.append('audience', details.audience);
    formData.append('type', details.type);
    formData.append('start_at', details.start_at);
    formData.append('end_at', details.end_at);
    // Finish the payment process in backend by sending card token id only.
    await $.ajax({
        url: cardEndpoint,
        type: 'POST',
        // dataType: 'json',
        data: formData,
        cache: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            if (data.message) {
                // $("input[name='payment_id']").val(data.payment_id);
                window.location.href = "/promotion";
            } else {
                $('div#msgBox').css('display', 'block');
                $('div#msgBox').html('<div class="px-4 py-2 bg-red-700 text-white rounded">' + data.error + '</div>');
            }
            // return data;
        }
    });
}

function requestPayment(amount, description, type, clientSecret, cardEndpoint, metadata = null, cardElement = "#card-element", cardForm = "payment-form", payButton = "button#payBtn", cardErrorsElement = "card-errors") {
    // var stripe = Stripe("{{ env('pk_token') }}");
    var stripe = Stripe("pk_live_51JVeGfIVtxqIX1q0S6YDh73BY8Wrr9Fm9L39IGs6dYwRiFdHFW4mxfJ2FotiO3eKwTAS243cSVXXqX5wek6rGnvv00ruuWrJqn");
    var elements = stripe.elements();
    if (type == 'card') // process card payment.
    {
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '20px',
                color: 'gray',
            },
        };
        // Create an instance of the card Element.
        var card = elements.create('card', { style: style });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount(cardElement);
        // Create a token or display an error when the form is submitted.
        var form = document.getElementById(cardForm);

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            $("#loadingComp").removeClass('hidden');
            $(payButton).prop('disabled', true);
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the customer that there was an error.
                    var errorElement = document.getElementById(cardErrorsElement);
                    errorElement.textContent = result.error.message;
                } else {
                    $("#loadingComp").removeClass('hidden').addClass("hidden");
                    // Send the token to your server.
                    stripeTokenHandler(result.token, amount, description, cardEndpoint, metadata);
                }
            });
        });

    } else if (type == 'requestAPI') // process ApplePay, GooglePay and Browser-Saved payment.
    {

        var paymentRequest = stripe.paymentRequest({
            country: 'US',
            currency: 'usd',
            total: {
                label: description,
                amount: amount,
            },
            requestPayerName: true,
            requestPayerEmail: true,
        });
        // Custom styling can be passed to options when creating an Element.

        var prButton = elements.create('paymentRequestButton', {
            paymentRequest: paymentRequest,
        });

        // Check the availability of the Payment Request API first.
        paymentRequest.canMakePayment().then(function (result) {
            if (result) {
                prButton.mount('#payment-request-button');
            } else {
                document.getElementById('payment-request-button').style.display = 'none';
            }
        });
        paymentRequest.on('paymentmethod', function (ev) {
            // Confirm the PaymentIntent without handling potential next actions (yet).
            stripe.confirmCardPayment(
                clientSecret,
                { payment_method: ev.paymentMethod.id },
                { handleActions: false }
            ).then(function (confirmResult) {
                if (confirmResult.error) {
                    // Report to the browser that the payment failed, prompting it to
                    // re-show the payment interface, or show an error message and close
                    // the payment interface.
                    ev.complete('fail');
                    $('div#msgBox').html('<div class="alert alert-error">' + confirmResult.error + '</div>');

                } else {
                    // Report to the browser that the confirmation was successful, prompting
                    // it to close the browser payment method collection interface.
                    ev.complete('success');

                    // Check if the PaymentIntent requires any actions and if so let Stripe.js
                    // handle the flow. If using an API version older than "2019-02-11"
                    // instead check for: `paymentIntent.status === "requires_source_action"`.
                    if (confirmResult.paymentIntent.status === "requires_action") {
                        // Let Stripe.js handle the rest of the payment flow.
                        stripe.confirmCardPayment(clientSecret).then(function (result) {
                            if (result.error) {
                                // The payment failed -- ask your customer for a new payment method.
                                $('div#msgBox').html('<div class="alert alert-success">' + result.error + '</div>');

                            } else {
                                // The payment has succeeded.
                                $('div#msgBox').html('<div class="alert alert-success">Successfully paid for enrollment!</div>');

                            }
                        });
                    } else {
                        $('div#msgBox').html('<div class="alert alert-success">Successfully paid for enrollment!</div>');
                        // The payment has succeeded.
                    }
                }
            });
        });

    } else if (type == 'boleto') // process Boleto payment.
    {
        var boletoForm = document.getElementById('boleto-payment-form');

        boletoForm.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.confirmBoletoPayment(
                clientSecret,
                {
                    payment_method: {
                        boleto: {
                            tax_id: document.getElementById('tax_id').value,
                        },
                        billing_details: {
                            name: document.getElementById('name').value,
                            email: document.getElementById('email').value,
                            address: {
                                line1: document.getElementById('address').value,
                                city: document.getElementById('city').value,
                                state: document.getElementById('state').value,
                                postal_code: document.getElementById('postal_code').value,
                                country: 'BR',
                            },
                        },
                    },
                }) // Stripe.js will open a modal to display the Boleto voucher to your customer
                .then(function (result) {
                    // This promise resolves when the customer closes the modal
                    if (result.error) {
                        // Display error to your customer
                        $('#error-message').removeClass('hidden')
                        var errorMsg = document.getElementById('error-message');
                        errorMsg.innerText = result.error.message;
                    } else {
                        $('div#msgBox').html('<div class="alert alert-error">Successfully paid using boleto!</div>');
                    }
                });
        });
    }
}


async function payWithPaypal(payload, element = "#paypal-button-container") {
    if (payload.isSubscription)
        paypal.Buttons({
            style: { color: 'blue', shape: 'rect', layout: 'horizontal', tagline: false, label: 'pay', height: 40 },
            createSubscription: function (data, actions) {
                return actions.subscription.create({
                    'plan_id': payload.plan_id
                });
            },
            onApprove: function (data, actions) {
                // Save subscription ID? or maybe add user_id as metadata in subscription
                if (data && data.subscriptionID) {
                    // If it was successful, redirect to the next step (create site / create EK)
                    // $.get(payload.success_url + output.subscriptionID);
                    var result = null;
                    window.location.search.substr(1).split("&")
                        .forEach(function (item) {
                            tmp = item.split("=");
                            let parameterName = "origin-site";
                            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                        });
                    let params = result ? '?origin-site=' + result : '';
                    window.location.href = payload.success_url + '/' + data.subscriptionID + '/paypal' + params;
                }

                return data;
            }
        }).render(element);
    else
        paypal.Buttons({
            style: { color: 'blue', shape: 'pill', layout: 'horizontal', tagline: false, label: 'pay', height: 40 },
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: payload.amount
                        }
                    }]
                });
            },
            onApprove: async function (data, actions) {
                if (data) {
                    var result = null;
                    window.location.search.substr(1).split("&")
                        .forEach(function (item) {
                            tmp = item.split("=");
                            let parameterName = "origin-site";
                            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                        });
                    let params = result ? '?origin-site=' + result : '';
                    var details = {
                        amount: payload.amount,
                        _token: payload.csrf_token,
                        source: 'paypal',
                        payment_id: data.orderID,
                        // origin_site: $("input[name='origin_site']").val(),
                        // ...metadata
                    }

                    console.log(details, payload);

                    if (payload.descr === "Hikel promotion payment")
                        details['origin_site'] = $("input[name='origin_site']").val();

                    if (payload.descr === "Hikel video payment - buy" && payload.payment_type) {
                        details['payment_type'] = payload.payment_type;
                        details['video_id'] = payload.video_id;
                    }
                    if (payload.descr === "Hikel goldenbuzzer payment" && payload.votes) {
                        details['video_id'] = payload.video_id;
                        var votes = payload.votes;
                    }
                    await $.post(payload.success_url, details, function (data, textStatus, xhr) {
                        if (payload.descr === "Hikel goldenbuzzer payment") {
                            // the success payment is for goldenbuzzer, add the vote amount.
                            let curVotes = parseInt($("button#vote span:last-child").text());
                            let updatedVotes = curVotes + parseInt(votes);
                            $("button#vote span:last-child").text(updatedVotes);
                        }
                        if (data.message) {
                            $("input[name='payment_id']").val(data.payment_id);
                            $('div#msgBox').css('display', 'block');
                            $('div#msgBox').html('<div class="px-4 py-2 bg-green-700 text-white rounded">' + data.message + '</div>');
                        } else {
                            $('div#msgBox').css('display', 'block');
                            $('div#msgBox').html('<div class="px-4 py-2 bg-red-700 text-white rounded">' + data.error + '</div>');
                        }
                    });
                }
                return data;
            }
        }).render(element);
}

async function payWithPaypalForPromotion(payload, element = "#paypal-button-container") {

    paypal.Buttons({
        style: { color: 'blue', shape: 'pill', layout: 'horizontal', tagline: false, label: 'pay', height: 40 },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: payload.amount
                    }
                }]
            });
        },
        onApprove: async function (data, actions) {
            if (data) {
                var result = null;
                window.location.search.substr(1).split("&")
                    .forEach(function (item) {
                        tmp = item.split("=");
                        let parameterName = "origin-site";
                        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                    });
                let params = result ? '?origin-site=' + result : '';
                var details = {
                    amount: payload.amount,
                    _token: payload.csrf_token,
                    source: 'paypal',
                    payment_id: data.orderID,
                    origin_site: $("input[name='origin_site']").val(),
                    ...payload.metadata
                }

                console.log(details, payload);

                var formData = new FormData();

                formData.append('amount', details.amount);
                formData.append('source', details.source);
                formData.append('_token', details._token);
                formData.append('origin_site', details.origin_site);
                formData.append('location', details.location);
                formData.append('payment_id', details.payment_id);
                formData.append('header', details.header);
                formData.append('description', details.description);
                formData.append('url', details.url);
                formData.append('thumbnail', details.thumbnail);
                formData.append('audience', details.audience);
                formData.append('type', details.type);
                formData.append('start_at', details.start_at);
                formData.append('end_at', details.end_at);
                // Finish the payment process in backend by sending card token id only.
                await $.ajax({
                    url: payload.success_url,
                    type: 'POST',
                    // dataType: 'json',
                    data: formData,
                    cache: false,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log(data);
                        if (data.message) {
                            // $("input[name='payment_id']").val(data.payment_id);
                            window.location.href = "/promotion";
                        } else {
                            $('div#msgBox').css('display', 'block');
                            $('div#msgBox').html('<div class="px-4 py-2 bg-red-700 text-white rounded">' + data.error + '</div>');
                        }
                        // return data;
                    }
                });
            }
            return data;
        }
    }).render(element);
}


async function createCustomer(card, stripe, csrf_token, source = "normal") {
    let billingEmail = document.querySelector('#email').value;
    let billingName = document.querySelector('#name').value;
    let priceId = document.querySelector('#priceId').value;
    $("button#payBtn").attr("disabled", true);
    $("button#payBtn").removeClass("hover:bg-blue-900 bg-blue-800").addClass("bg-blue-600"); // custom disable class.

    // check if customer exists and skip this step if he/she does exist?
    return fetch('/stripe/create-customer', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            email: billingEmail,
            source,
            name: billingName,
            _token: csrf_token,
        }),
    })
        .then((response) => {
            return response.json();
        })
        .then((result) => {
            // result.customer.id is used to map back to the customer object
            console.log(result);
            if (result.id)
                createPaymentMethod(card, stripe, csrf_token, result.id, billingName, priceId, source)
            return result;
        });
}

function displayError(res) {
    console.log('Err: ' + res);
}

function createPaymentMethod(card, stripe, csrf_token, customerId, billingName, priceId, source) {
    // Set up payment method for recurring usage
    stripe
        .createPaymentMethod({
            type: 'card',
            card: card,
            billing_details: {
                name: billingName,
            },
        }).then((result) => {
            if (result.error) {
                displayError(result);
            } else {
                createSubscription(csrf_token, {
                    customerId,
                    paymentMethodId: result.paymentMethod.id,
                    priceId,
                }, source);
            }
        });
}

function createSubscription(csrf_token, { customerId, paymentMethodId, priceId }, source) {
    var result = null;
    window.location.search.substr(1).split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            let parameterName = "origin-site";
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    // console.log('origin_site from sub: ' + result);
    return (
        fetch('/stripe/create-subscription', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
            },
            body: JSON.stringify({
                customerId: customerId,
                paymentMethodId: paymentMethodId,
                priceId,
                source,
                origin_site: result,
                _token: csrf_token,
            }),
        }).then((response) => {
            return response.json();
        })
            // If the card is declined, display an error to the user.
            .then((result) => {
                if (result.error) {
                    // The card had an error when trying to attach it to a customer.
                    throw result;
                }
                return result;
            })
            // Normalize the result to contain the object returned by Stripe.
            // Add the additional details we need.
            .then((result) => {
                console.log(result)
                return {
                    paymentMethodId: paymentMethodId,
                    priceId: priceId,
                    resp: result,
                };
            })
            // Some payment methods require a customer to be on session
            // to complete the payment process. Check the status of the
            // payment intent to handle these actions.
            // .then(handlePaymentThatRequiresCustomerAction)
            // If attaching this card to a Customer object succeeds,
            // but attempts to charge the customer fail, you
            // get a requires_payment_method error.
            // .then(handleRequiresPaymentMethod)
            // No more actions required. Provision your service for the user.
            .then(onSubscriptionComplete)
            .catch((error) => {
                // An error has happened. Display the failure to the user here.
                // We utilize the HTML element we created.
                showCardError(error);
            })
    );
}

function showCardError(e) {
    console.log("Error in creating subscription: ")
    console.log(e);
}

function onSubscriptionComplete(e) {
    // Save payment info:
    let origin_site = e.resp.origin_site;
    // console.log(e);
    $('div#msgBox').css('display', 'block');
    $('div#msgBox').html('<div class="px-4 py-2 bg-green-700 text-white my-2">You are successfully subscribed to your service!</div>');
    let subscriptionID = e.resp.sub.id;
    let paidAmount = e.resp.sub.items.data[0].price.unit_amount;
    // console.log(paidAmount);
    let params = origin_site ? '?origin-site=' + origin_site : '';
    let redirectTo = paidAmount == 799 ? '/paid/ek' : '/paid/site';
    window.location.href = `${redirectTo}/${subscriptionID}/stripe` + params;
}

function handlePaymentThatRequiresCustomerAction(e) {
    console.log("handlePaymentThatRequiresCustomerAction: ");
    console.log(e);
}

function handleRequiresPaymentMethod(e) {
    console.log("handleRequiresPaymentMethod: ");
    console.log(e);
}
