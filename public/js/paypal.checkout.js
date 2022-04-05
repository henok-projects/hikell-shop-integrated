function payWithPaypal(payload) {
    if (payload.isSubscription)
        paypal.Buttons({
            style: { color: 'blue', shape: 'pill', label: 'pay', height: 40 },
            createSubscription: function (data, actions) {
                return actions.subscription.create({
                    'plan_id': payload.plan_id
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    return details
                });
            }
        }).render('#paypal-button-container');

    else
        paypal.Buttons({
            style: { color: 'blue', shape: 'pill', label: 'pay', height: 40 },
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: payload.amount
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    return details
                });
            }
        }).render('#paypal-button-container');
}

//Test the function
// var payload = { 
//     amount: "12.76",
//     isSubscription:false,
//     plan_id:null
// }
// var output = payWithPaypal(payload)

// console.log(output)