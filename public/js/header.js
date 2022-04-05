/**
 * payment_data parameters
 *  INPUT paymentamount <input type = "hidden" id="amount"/>
 *  INPUT source <input type="hidden" id="Source">
 *  INPUT [can add other inputs]
 *  OUTPU <input type="hidden" id="output"/> <!-- this will accept data from paypal_payment function and trigger change of value-->
 *		$("#ouput").bind("change",function(){
 *			$("#likes").html($(this).val());		
 *		});
 */
function paypal_payment(payment_data = null){ 
	let amount = payment_data.paymentamount;	
	let payment_detail = '';
	
	for (const [key, value] of Object.entries(payment_data)) {
		payment_detail += `${key}: `+"'"+`${value}`+"'"+`,`;
	}
	
	paypal_render = `<!-- Paypal  Modal --><style>
.modal-dialog{
    position: relative;
    display: table; /* This is important */ 
    overflow-y: auto;    
    overflow-x: auto;
    width: auto;
    min-width: 300px;   
} </style>
<div class="modal fade" id="paypalModal" tabindex="-1" role="dialog" aria-labelledby="paypalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paypalModalLabel">Paypal Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">				
				<div id="paypal-button-container"></div>
				<script>
					paypal_sdk.Buttons({
						createOrder: function(data, actions) {
							return actions.order.create({
							  purchase_units: [{
								amount: {
								  value: `+amount+`
								}
							  }],
							  application_context: {
								shipping_preference: 'NO_SHIPPING'
							  }
							});
						  },
						  onApprove: function(data, actions) {
							return actions.order.capture().then(function(details) {
								details = Object.assign(details,{ `+payment_detail+`});
								$.post('`+payment_data.source+`',details, function(data, textStatus, xhr) {
									//console.log(details);
									if (data.status == 200) {
										 $("#output").val(data.data).trigger("change");
										 //$('#paypal-render').html();
										$('#paypalModal').modal('hide');
									} else {
										$('#paypalModal').modal('hide');
                                        $('#paypal-render').html();
										alert(data.message);
									}
								});
							});
						  },
						  onCancel: function (data) {
							$('#paypal-render').html();
							$('#paypalModal').modal('hide');
							alert('Transaction not completed ');
						  },
                         onError: function (data) {
							$('#paypal-render').html();
							$('#paypalModal').modal('hide');
							alert('Error occured before transaction ');
						  }
					}).render('#paypal-button-container');
				</script>
            </div>
        </div>
    </div>
</div>
<!-- END Paypal Modal -->
`;
	$("#paypal-render").html(paypal_render);
}



function goldenBuzzer(golden){
    var vote = 0;
    var amount = 0;
    var source = $("#voteSource").val();
    var video_id = $("#vote_id").val();
    var user_id = $("#user_id").val();
    
    if(golden == 1){
        vote = 100;
        amount = 20;
    }
    else if(golden == 2){
        vote = 700;
        amount = 30;
    }
    else if(golden == 3){
        vote = 1000;
        amount = 100;
    }
    
    payment_data = {
        paymentamount:amount,
        source:source,
        vote:vote,
        video_id:video_id,
        user_id:user_id,
    };
    
    paypal_payment(payment_data);
    $('#paypalModal').modal('show');
}
