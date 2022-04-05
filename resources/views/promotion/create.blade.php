@php
    $originSite = Request::filled('origin-site') ? request('origin-site') : null;
@endphp
@extends('layouts.app')
@section('ext_css')
<style type="text/css">
  #promotion_create fieldset:not(:first-of-type),#hide_start_publish {
    display: none;
  }
  </style>

<script defer src="https://js.stripe.com/v3/"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}" async></script>


<script src="/js/payments.js"></script>
@endsection
@section('content')
    @include('components.space', ['color' => 'green-700', 'title' => 'Create Promotion'])
    <div class="relative z-50 w-4/5 px-4 py-8 mx-auto text-white shadow-lg sm:w-3/5 top-20 top-24" :class="{'bg-gray-100': !dark, 'bg-gray-900 text-white': dark}">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if(session('message'))
            <x-request-response class="mb-4" :message="session('message')" />
        @endif
        <div class="relative pt-1">
            <div class="overflow-hidden h-4 text-xs flex rounded bg-purple-200">
              <div class="progress-bar transition-width duration-300 ease shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500 "></div>
            </div>
          </div>
          <br/>
          {{-- {{ old('title') }} --}}
        <form id='promotion_create' name="promotion" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="origin_site" value="{{ $originSite }}">
            <div class="flex flex-col space-y-3">
                <fieldset id='ads_info' class="flex flex-col space-y-2">
                    <div class="flex justify-center items-center">
                        <div class="flex flex-col items-center space-y-2">
                            <label class="flex items-center px-4 py-2 tracking-wide uppercase rounded-lg shadow-lg cursor-pointer text-blue"  :class="{'bg-blue-500 text-gray-200 hover:bg-blue-700 hover:text-white': !dark, 'bg-blue-800 hover:bg-blue-700 hover:text-white': dark}">
                                <svg class="flex-shrink-0 w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="ml-3 text-sm leading-normal">Select Promotion</span>
                                <input type="file" id="promoFile" name="location" accept="video/*,image/*"  class="hidden" />
                            </label>
                            <span class="text-green-700 break-all" id="selectedVideo"></span>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="title" :value="__('Header')" />
                        <x-input placeholder="Header" id="title" class="block w-full mt-1" type="text" name="header" required autofocus />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="description" :value="__('Description')" />
                        <x-input placeholder="Description" id="description" class="block w-full mt-1" type="text" name="description" row='2' autofocus />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="url" :value="__('URL')" />
                        <x-input placeholder="URL" id="url" class="block w-full mt-1" type="text" name="url"  autofocus />
                    </div>
                    <div class="flex flex-col hidden space-y-2 thumbnail">
                        <x-label class="text-base" for="thumbnail" :value="__('Thumbnail')" />
                            <label class="flex items-center px-6 py-4  text-blue rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:text-white"  :class="{'hover:border-gray-500 hover:bg-gray-500': !dark, 'hover:border-gray-800 hover:bg-gray-700': dark}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                                {{-- <span class="ml-3 text-sm leading-normal">Select Thumbnail</span> --}}
                                <input type='file' accept="image/*" class="absolute left-0 hidden w-full bottom-3" id="thumbnail" name="thumbnail" />
                            </label>
                            <span class="text-green-700 break-all" id="selectedThumbnail"></span>
                        </div>
                    </div>
                    <div class="flex justify-end" >
                        <button type="button" id="next1" class="next mt-2 lg:mt-3 flex items-center justify-between bg-blue-800 text-white font-bold px-3 py-1 rounded hover:bg-blue-900 text-lg">
                            <span>Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </button>
                    </div>
                </fieldset>
                <fieldset id='ads_detail' class="lg:py-3">
                    <div class="flex items-center justify-center">
                        <div class="flex flex-col items-center space-y-2">
                            <h2>
                                Promotion Detail
                            </h2>
                        </div>
                    </div>
                    <div class="flex flex-col _items-center w-1/2" id="extraInputs">
                        <select name="audience" class="px-3 py-2 audience my-1 rounded text-dark text-gray-700">
                            @foreach ($countries as $key=>$country )
                            <option value="{{ $key }}"
                                @if ($loop->first)
                                    selected
                                @endif
                                ><span>{{ $country }}</span></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="payment" :value="__('Payment Type')" />
                        <select name="type" class="my-1 text-gray-700 rounded text-dark focus:outline-none">
                            @foreach ($paymentTypes as $paymentType )
                                <option value="{{ $paymentType->type }}">{{ $paymentType->type }} ads per day {{ $paymentType->amount / 100 }}$</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-between mt-3 lg:mt-8" >
                        <button type="button" id="previous1" class="flex items-center justify-between px-4 py-2 font-bold text-gray-800 bg-gray-300 rounded-l previous hover:bg-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
                            <span>Previous</span>
                        </button>
                        <button type="button" id="next2"class="flex items-center justify-between px-3 py-1 text-lg font-bold text-white bg-blue-800 rounded next hover:bg-blue-900">
                            <span>Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </button>
                    </div>
                </fieldset>
                <fieldset id='ads_time'>
                    <div class="flex items-center justify-center">
                        <div class="flex flex-col items-center space-y-2">
                            <h2>
                                Promotion Start and End time
                            </h2>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="start_at" :value="__('Start At')" />
                        <x-input id="start_at" class="block w-full mt-1" type="date" placeholder="mm/dd/yyyy" name="start_at" required />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="end_at" :value="__('End At')" />
                        <x-input id="end_at" class="block w-full mt-1" type="date" placeholder="mm/dd/yyyy" name="end_at" required/>
                    </div><input type="hidden" name="test" value="1" required>
                    <div class="flex justify-between mt-3 lg:mt-8">
                        <button type="button" id="previous2" class="flex items-center justify-between px-4 py-2 font-bold text-gray-800 bg-gray-300 rounded-l previous hover:bg-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
                            <span>Previous</span>
                        </button>

                        <button onclick="showPayment();" type="button" id="next2"class="flex items-center justify-between px-3 py-1 text-lg font-bold text-white bg-blue-800 rounded next hover:bg-blue-900">
                            <span>Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </button>
                    </div>
                </fieldset>
            </div>
            <input type="hidden" name="payment_id">
        </form>
        <div id="paymentForm" class="flex flex-col items-center justify-center hidden space-y-2">
            <form method="post" id="payment-form">
                <div id="msgBox" class="my-2"></div>
                <div class="w-full" id="stripeCard">
                      <div id="payment-request-button" style="margin-bottom: 1em">
                    <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <div style="padding: 3wm 0;display: none">
                        <span>or pay with card:</span>
                    </div>
    
                    <div class="flex flex-col space-y-2 mt-3">
                        <label class="text-base text-gray-300" for="name">Name on card</label>
                        <x-input placeholder="Name on card" id="name" class="block bg-transparent border rounded-lg focus:placeholder-gray-200 border-gray-700 focus:outline-none mt-1 w-full" type="text" name="name" required  />
                    </div>

                    <!-- Used to display Element errors. -->
                    <div id="card-errors" role="alert"></div>
                  </div>
                  <div class="flex items-center justify-between w-full">
                    <span id="payBoletoBtn" class="px-2 py-1 text-sm bg-gray-600 rounded hover:bg-gray-700 text-white">Or pay with Boleto</span>
                    <button id="payBtn" type="submit" class="px-2 py-1 bg-blue-800 hover:bg-blue-900 text-white rounded mt-3">Submit Payment</button>
                  </div>
                <div class="row">
                    <div class="hidden col-md-12">
                        <label for="">Other payment methods:</label>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-default btn-sm" style="margin-top: 4%;">Bank debits</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-default btn-sm" style="margin-top: 4%;">Bank redirects</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-default btn-sm" style="margin-top: 4%;">Bank transfers</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-default btn-sm" style="margin-top: 4%;">Wallets</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="flex items-center justify-end hidden">
                    <button onclick="" type="submit" class="next flex items-center lg:mt-5 justify-between bg-green-800 text-white font-bold px-3 py-1 rounded hover:bg-green-900 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 fill-current text-gray-200"viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
                        <span>Publish</span>
                    </button>
                </div>
            </form>
            <form id="boleto-payment-form" class="hidden" class="form-group">
                @csrf
                <div class="py-1">
                    <label for="name">
                    Name
                    </label>
                    <x-input id="name" name="name" class="w-full" required />
                </div>

                <div class="py-1">
                    <label for="tax_id">
                    CPF/CNPJ
                    </label>
                    <x-input id="tax_id" name="tax_id" class="w-full" required />
                </div>

                <div class="py-1">
                    <label for="email">
                    Email
                    </label>
                    <x-input id="email" name="email" class="w-full" required />
                </div>

                <div class="py-1">
                    <label for="address">
                    Address
                    </label>
                    <x-input id="address" name="address" class="w-full" required />
                </div>

                <div class="py-1">
                    <label for="city">
                    City
                    </label>
                    <x-input id="city" name="city" class="w-full" required />
                </div>

                <div class="py-1">
                    <label for="state">
                    State
                    </label>
                    <x-input id="state" name="state" class="w-full" required />
                </div>

                <div class="py-1">
                    <label for="postal_code">
                    Postal Code
                    </label>
                    <x-input id="postal_code" name="postal_code" class="w-full" required />
                </div>

                <!-- Used to display form errors. -->
                <div id="error-message" class="hidden alert alert-danger" role="alert"></div>

                <div class="flex items-center justify-center">
                    <button class="px-2 py-1 mt-3 text-sm bg-indigo-700 rounded hover:bg-indigo-800" id="submit-button">Pay with Boleto</button>
                </div>
            </form>
            <div class="flex items-center justify-end">
                <button onclick="document.forms.promotion.submit()" type="submit" class="flex items-center justify-between px-3 py-1 text-lg font-bold text-white bg-green-800 rounded next lg:mt-5 hover:bg-green-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-gray-200 fill-current"viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
                    <span>Publish</span>
                </button>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection

@section('ext_js')
    <script>
        $("input[name='thumbnail']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];

            $("span#selectedThumbnail").text(fileName);
        });

        $("input[name='location']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];
            $(".thumbnail").removeClass('hidden').addClass('hidden');
            if(document.getElementsByName('location')[0].files[0].type.includes('video'))
            {
                $(".thumbnail").removeClass('hidden');
            }
            $("span#selectedVideo").text(fileName);
        });

        $('span#payBoletoBtn').click(function(e){
            $('form#boleto-payment-form').toggleClass('hidden');
        });

        function showPayment()
        {
            loadPayments();
            $("form#promotion_create").hide()
            $("div#paymentForm").removeClass('hidden').addClass('block')
        }

        function loadPayments()
        {

            var cardEndpoint = "{{ route('promotion.store') }}";
            console.log(cardEndpoint);

            var promotionType = $("select[name='type']").val();
            var promotionPrice = 0;
            switch(promotionType)
            {
                case '48':
                    promotionPrice = 3000;
                    break;
                case '24':
                    promotionPrice = 2500;
                    break;
                case '20':
                    promotionPrice = 2000;
                    break;
                case '16':
                    promotionPrice = 1500;
                    break;
                case '12':
                    promotionPrice = 1000;
                    break;
                default:
                    promotionPrice = 700;
                    break;
            }
            requestPayment(promotionPrice, "Hikel promotion payment", "card", null, cardEndpoint);
            requestPayment(promotionPrice, "Hikel promotion payment", "requestAPI", null, cardEndpoint);
            requestPayment(promotionPrice, "Hikel promotion payment", "boleto", null, cardEndpoint);

        }
        $(document).ready(function(){

            var form_count = 1, form_count_form, next_form, total_forms;
            total_forms = $("fieldset").length;
            $(".next").click(function(){
                let previous = $(this).closest("fieldset").attr('id');
                let next = $('#'+this.id).closest('fieldset').next('fieldset').attr('id');
                $('#'+next).show();
                $('#'+previous).hide();
                setProgressBar(++form_count);
            });

            $(".previous").click(function(){
                let current = $(this).closest("fieldset").attr('id');
                let previous = $('#'+this.id).closest('fieldset').prev('fieldset').attr('id');
                $('#'+previous).show();
                $('#'+current).hide();
                setProgressBar(--form_count);
            });

            setProgressBar(form_count);
            function setProgressBar(curStep){
                var percent = parseFloat(100 / (total_forms+1)) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                .css("width",percent+"%")
                .html(percent+"%");
            }

        });
    </script>
@endsection
