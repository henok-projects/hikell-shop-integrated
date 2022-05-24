<style>
    /* rating */
    .rating-css div {
                    
                    font-size: 30px;
                    font-family: sans-serif;
                    font-weight: 800;
                    text-align: center;
                    text-transform: uppercase;
                    padding: 20px 0;
                }
                .rating-css input {
                    display: none;
                }
                .rating-css input + label {
                    font-size: 30px;
                    text-shadow: 1px 1px 0 hsl(48, 19%, 95%);
                    cursor: pointer;
                  

                }
                .rating-css input:checked + label ~ label {
                    color: hsla(0, 43%, 97%, 0.927);
                }
                .rating-css input:checked + label::before {
                    color: #ffe400;
                }
                
                .rating-css label:active {
                    transform: scale(0.8);
                    transition: 0.3s ease;
                   
                }

                /* End of Star Rating */

		.login_popup{
			width: 100%;
			height: 80%;
			padding: 0 10px;
		}
		.login_popup .box{
			background-color: rgb(57, 56, 56);
			padding: 0 10px;
			width: 400px;
			height: 300px;
			border-radius: 20px;
			position: absolute;
			left: 50%;
			top: 40%;
			transform: translate(-50%, -50%);
			opacity: 0;
			transition: all 1s ease-in-out;
		}
		.login_popup.anyname{
			visibility: visible;
			opacity: 1;
		}
		.login_popup.anyname .box{
			margin-left: 0;
			opacity: 1;
		}
		.login_popup .box .form{
			padding: 40px 30px;
		}
		.login_popup .box .form h1{
			color: #000;
			font-size: 30px;
			margin: 0 0 30px;
		}
		.popup_input{
			height: 45px;
			margin-bottom: 30px;
			width: 100%;
			border: none;
			border-bottom: 1px solid #ccc;
			font-size: 15px;
			color: #cccc;
		}
		.popup_input:focus{
			outline: none;
		}
		label{
			font-size: 18px;
			color: #555;
		}
		
		.close{
			position: absolute;
			right: 20px;
			top: 12px;
			font-size: 30px;
			cursor: pointer;
            color: white;
		}
        .bb{
            width: 80%;
            margin-right: 40px;
            border-radius: 10px;
                   }
</style>
<div>
    <main id="main" class="main-site">
        <div class="container">
            <div class="wrap-breadcrumb">

            </div>

        </div>
        <div class="container pb-60">
            <div class="row">
                <div class="text-center col-md-12">
                    <h2>Thankyou for your Order</h2>
                    <p>A Confirmation email will sent to your email </p>
                    <p>please confirm your email</p>
                    <a href="/home" class="btn btn-submit btn-success">Continue shipping</a>
                </div>
                {{--Popup  --}}
                <div class="login_popup" id="popup_form">
                    <div class="box">
                        <div class="form">
                            <div class="close" id="close_btn">&times;</div>
                            <form action="{{ url('/add-rating') }}" method="post">
                                 @csrf
                                 <input type="hidden" name="product_id">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel" style="color: white">Rate the Service!</h5>
                                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    {{-- <span aria-hidden="true">&times;</span> 
                                    </button>--}}
                                    </div>
                                    <div class="modal-body">
                                        <div class="rating-css">
                                            <div class="star-icon">
                                                <input type="radio" value="1" name="product_rating" id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="product_rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="product_rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="product_rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="product_rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                    <button type="submit" class="btn btn-primary bb">submit</button>
                                    </div>
                             </form>
                            
                        </div>
                    </div>
                </div>
                <!-- Now add javascript -->
                <script type="text/javascript">
                    var popup_login = document.getElementById('popup_form');
                    var close = document.getElementById('close_btn');
                
                    window.addEventListener("load", function(){
                
                        setTimeout(function(){
                
                            popup_login.classList.add('anyname');
                
                         },1000) 
                    }) 
                    close.addEventListener("click", function(){
                            popup_login.classList.remove('anyname');
                         }) 
                </script>
                {{--  --}}
            </div>
        </div>
    </main>

</div>
