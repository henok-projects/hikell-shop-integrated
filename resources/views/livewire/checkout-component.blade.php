
 <div>

    <main id="main" class="main-site" wire:click="$refresh">
        <style>
            .wrap-address-billing .row-in-form input[type="password"],
            .wrap-address-billing .row-in-form input[type=text],
            .wrap-address-billing .row-in-form input[type=number] {
                font-size: 13px;
                line-height: 19px;
                display: inline-block;
                height: 43px;
                padding: 2px 20px;
                width: 100%;
                border: 1px solid #e6e6e6;
            }

        </style>



        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link"></a></li>
                    <li class="item-link"></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <form wire:submit.prevent="placeorder">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-address-billing">

                                <h3 class="box-title">Billing Address</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input id="fname" type="text" name="fname" value="" placeholder="Your name"
                                            wire:model="fname">
                                        {{-- @error('fname')   <span class="text-danger">{{$message}}</span> @enderror --}}
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input id="lname" type="text" name="lname" value=""
                                            placeholder="Your last name" wire:model="lname">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Addreess:</label>
                                        <input id="email" type="email" name="email" value=""
                                            placeholder="Type your email" wire:model="email">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input id="phone" type="number" name="phone" value="" placeholder="mobile"
                                            wire:model="mobile">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address 1</label>
                                        <input id="add" type="text" name="add" value=""
                                            placeholder="Street at apartment number" wire:model="line1">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Address 2</label>
                                        <input id="add" type="text" name="add" value=""
                                            placeholder="Street at apartment number" wire:model="line2">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country<span>*</span></label>
                                        <input id="country" type="text" name="country" value=""
                                            placeholder="United States" wire:model="country">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:</label>
                                        <input id="zip-code" type="number" name="zip-code" value=""
                                            placeholder="Your postal code" wire:model="zipcode">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Province<span>*</span></label>
                                        <input id="city" type="text" name="city" value="" placeholder="City name"
                                            wire:model="province">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Town / City<span>*</span></label>
                                        <input id="city" type="text" name="city" value="" placeholder="City name"
                                            wire:model="city">
                                    </p>
                                    <p class="row-in-form fill-wife">

                                        <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1" type="checkbox"
                                            wire:model="shipToDifferent">
                                        <span>Ship to a different address?</span>
                                    </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if ($shipToDifferent)
                        <div class="col-md-12">
                        <div class="wrap-address-billing">

                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input id="fname" type="text" name="fname" value="" placeholder="Your name"
                                        wire:model="s_fname">
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input id="lname" type="text" name="lname" value="" placeholder="Your last name"
                                        wire:model="s_lname">
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input id="email" type="email" name="email" value="" placeholder="Type your email"
                                        wire:model="s_email">
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input id="phone" type="number" name="mobile" value="" placeholder="mobile"
                                        wire:model="s_mobile">
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address 1</label>
                                    <input id="add" type="text" name="line1" value=""
                                        placeholder="Street at apartment number" wire:model="s_line1">
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address 2</label>
                                    <input id="add" type="text" name="add" value=""
                                        placeholder="Street at apartment number" wire:model="s_line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input id="country" type="text" name="country" value="" placeholder="United States"
                                        wire:model="s_country">
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input id="zip-code" type="number" name="zipcode" value=""
                                        placeholder="Your postal code" wire:model="s_zipcode">
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Province<span>*</span></label>
                                    <input id="city" type="text" name="city" value="" placeholder="City name"
                                        wire:model="s_province">
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input id="city" type="text" name="city" value="" placeholder="City name"
                                        wire:model="s_city">
                                </p>

                            </div>
                        </div>
                    </div>
                        @endif
                    </div>






                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">

                            <h4 class="title-box">Payment Method</h4>
                            @if ($paymentmode == 'card')
                                <div class="wrap-address-billing">
                                    <p class="row-in-form">
                                        <label for="zip-code">Card Number:</label>
                                        <input id="cardnumber" type="number" name="card_no" value=""
                                            placeholder="Card No" wire:model="card_no">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Expired Month:</label>
                                        <input id="cardnumber" type="number" name="exp_month" value=""
                                            placeholder="Expired Month" wire:model="exp_month">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Expired Year:</label>
                                        <input id="cardnumber" type="number" name="exp_year" value=""
                                            placeholder="Expired year" wire:model="exp_year">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="cvc">CVC:</label>
                                        <input id="cardnumber" type="text" name="cvc" value="" placeholder="CVC"
                                            wire:model="cvc">
                                    </p>
                                </div>
                            @endif

                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-bank" value="bank" type="radio"
                                        wire:model="paymentmode">
                                    <span>Direct Bank Transfer</span>
                                    {{-- <span class="payment-desc">But the majority have suffered alteration in some form, by
                                    injected humour, or randomised words which don't look even slightly
                                    believable</span> --}}
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-visa" value="card" type="radio"
                                        wire:model="paymentmode">
                                    <span>Debit/Credit Card</span>
                                    {{-- <span class="payment-desc">There are many variations of passages of Lorem Ipsum
                                    available</span> --}}
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio"
                                        wire:model="paymentmode">
                                    <span>Paypal</span>
                                    <span class="payment-desc">You can pay with your credit</span>
                                    <span class="payment-desc">card if you don't have a paypal account</span>
                                </label>
                            </div>


                            @if (Session::has('checkout'))
                                <p class="summary-info grand-total"><span>Grand Total</span> <span
                                        class="grand-total-price">${{ Session::get('checkout')['total'] }}</span></p>
                            @endif
                            <button type="submit" class="btn btn-medium btn-success">Place Order</button>
                            <hr>
                            <div class="mt-6">
                                <div id="paypal-button-container"></div>
                            </div>

                        </div>
                        <div class="summary-item shipping-method">

                            <div class="summary-item payment-method">
                                <h4 class="title-box">Shipping Method</h4>
                                <div class="choose-payment-methods">
                                    {{-- <label class="payment-method">
                                        <input name="payment-method" id="payment-method-bank" value="bank" type="radio"
                                            wire:model="shipmethod">
                                        <span>Drop Shipping</span>
                                        <span class="payment-desc">Shipping price $22</span>
                                    </label> --}}
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-visa" value="visa" type="radio"
                                            wire:model="shipmethod">
                                        <span>DHL</span>
                                        <span class="payment-desc">Shipping price $15</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-paypal" value="paypal"
                                            type="radio" wire:model="shipmethod">
                                        <span>EthioPostal</span>
                                        <span class="payment-desc">Shipping Price $4</span>

                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-paypal" value="strip"
                                            type="radio" wire:model="shipmethod">
                                        <span>Self-shipping</span>
                                        <span class="payment-desc">Shipping Price $4</span>

                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>



        </div>

<script
 src="https://www.paypal.com/sdk/js?client-id=AaYb1gdFSzBsGZOmDosrMMRA8gBcHMEPBunAQEpML4-Z-RzuELenODcJjvOmgqiJCmDsTkboyh0FfPU8&currency=USD">
</script>
<script>
    paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: {{ Session::get('checkout')['total'] }} // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                    }
                }]
            });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                // var transaction = orderData.purchase_units[0].payments.captures[0];
                // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var email = $('.email').val();
                var city = $('.city').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var state = $('.state').val();



                $.ajax({
                    method: "POST",
                    url: "/place-order",
                    data: {
                        'fname': fname,
                        'lname': lname,
                        'email': email,
                        'phone': phone,
                        'city': city,
                        'address1': address1,
                        'address2': address2,
                        'state': state,
                    },
                    success: function(response) {
                        alert('success');
                        window.location.href = "/cartlist";
                    }
                });

            });
        }
    }).render('#paypal-button-container');
</script>

</main>

</div>

