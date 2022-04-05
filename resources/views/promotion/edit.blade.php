@extends('layouts.app')
@section('ext_css')
<style type="text/css">
  #promotion_edit fieldset:not(:first-of-type),#hide_start_publish {
    display: none;
  }
  </style>
@endsection
@section('content')
    @include('components.space', ['color' => 'green-700', 'title' => 'Edit Promotion'])
    <div class="w-4/5 sm:w-3/5 z-50 top-20 top-24 relative mx-auto shadow-lg px-4 py-8 text-white" :class="{'bg-gray-100': !dark, 'bg-gray-900 text-white': dark}">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="relative pt-1">
            <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200">
              <div class="progress-bar shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500 "></div>
            </div>
          </div>
          <br/>
          {{-- {{ old('title') }} --}}
        <form id='promotion_edit' action="{{route('promotion.update',$promotion[0]->promotion_id) }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-col space-y-3">
                <fieldset id='ads_info'>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="title" :value="__('Header')" />
                        <x-input placeholder="Header" id="title" class="block mt-1 w-full" type="text" name="header" value="{{ $promotion[0]->header }}"/>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="description" :value="__('Description')" />
                        <x-input placeholder="Description" id="description" class="block mt-1 w-full" type="text" name="description" row='2' value="{{ $promotion[0]->description }}" autofocus />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="url" :value="__('URL')" />
                        <x-input placeholder="URL" id="url" class="block mt-1 w-full" type="text" name="url"  value="{{ $promotion[0]->url }}" autofocus />
                    </div>
                    <div class="flex justify-end mt-3" >
                        <button type="button" id="next1" class="next flex items-center justify-between bg-blue-800 text-white font-bold px-3 py-1 rounded hover:bg-blue-900 text-lg">
                            <span>Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </button>
                    </div>
                </fieldset>
                <fieldset id='ads_detail'>
                    <div class="flex justify-center items-center">
                        <div class="flex flex-col items-center space-y-2">
                            <h2>
                                Promotion Detail
                            </h2>
                        </div>
                    </div>
                    <div class="flex flex-col _items-center w-1/2 transition duration-300 ease-in-out" id="extraInputs">
                        <select name="audience" class="px-3 py-2 my-1 rounded text-dark text-gray-700  focus:outline-none">
                            <option value="">Target Audience</option>
                            <option value="1"> USA</option>
                            <option value="2">Canada</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="payment" :value="__('Payment Type')" />
                        <select name="type" class="px-3 py-2 my-1 rounded text-dark text-gray-700 focus:outline-none">
                            <option value="48">48 ads preday 100$</option>
                            <option value="24"> 24 ads perday 70$</option>
                            <option value="20">20 ads perday 30$</option>
                        </select>
                    </div>
                    <div class="flex justify-between mt-3" >
                        <button type="button" id="previous1" class="previous flex items-center justify-between bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
                            <span>Previous</span>
                        </button>
                        <button type="button" id="next2"class="next flex items-center justify-between bg-blue-800 text-white font-bold px-3 py-1 rounded hover:bg-blue-900 text-lg">
                            <span>Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </button>
                    </div>
                </fieldset>
                <fieldset id='ads_time'>
                    <div class="flex justify-center items-center">
                        <div class="flex flex-col items-center space-y-2">
                            <h2>
                                Promotion Start and End time
                            </h2>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="start_at" :value="__('Start At')" />
                        <x-input id="start_at" class="block mt-1 w-full" type="date" name="start_at" value="{{ $promotion[0]->start_at }}" />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="end_at" :value="__('End At')" />
                        <x-input id="end_at" class="block mt-1 w-full" type="date" name="end_at" value="{{ $promotion[0]->end_at }}"/>
                    </div><input type="hidden" name="test" value="1" required>
                    <div class="flex justify-between mt-3" >
                        <button type="button" id="previous2" class="previous flex items-center justify-between bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
                            <span>Previous</span>
                        </button>
                        <button type="submit" class="next flex items-center justify-between bg-green-800 text-white font-bold px-3 py-1 rounded hover:bg-green-900 text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <span>Update</span>
                        </button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
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
            if(document.getElementsByName('location')[0].files[0].type.includes('location'))
            {
                $(".thumbnail").removeClass('hidden');
            }
            $("span#selectedVideo").text(fileName);
        });

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
                console.log(curStep);
                var percent = parseFloat(100 / total_forms) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                .css("width",percent+"%")
                .html(percent+"%");
            }

        });
    </script>
@endsection
