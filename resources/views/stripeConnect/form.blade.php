@php
$refURL = isset($identifier) ? url('/enroll') . "?ref=" . $identifier : '';
$service = $refURL != '' ? 'apply-ek' : 'launch-site'
@endphp
@extends('layouts.app')
@section('content')
@include('components.space', ['color' => 'green-700', 'title' => 'Subscription plans', 'subtitle' => 'Create Your
Subscription Plans.'])

<div class="w-4/5 sm:w-2/5 z-10 top-20 top-24 relative mx-auto shadow-lg px-4 py-8 text-white"
    :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">

    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="/create-resource" method="POST" class="lg:px-10" enctype="multipart/form-data">
        @csrf
        <div class="my-2 py-2" style="align-items: center;">
            <div class="mx-1">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="sub_fee" :value="__('Plan Name')" />
                    <x-input type="text" placeholder="Basic Plan" name="plan_name" class="my-1" value="Basic Plan"
                        required />
                </div>
            </div>
            <div class=" mx-1 my-2 py-2">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="sub_fee" :value="__('Subscription Fee')" />
                    <x-input type="number" placeholder="Subscription Fee ( $ / Mo)" min="1" step="1" name="plan_fee" class="my-1"
                        required value="19" />
                </div>
            </div>
        </div>

        @if(session('message'))
        <div class="my-2" style="align-items: center;">
            <div class="w-full md:w-6/6 mx-1">
                <div class="flex flex-col space-y-2">
                    <x-request-response class="mb-4" :message="session('message')" />
                </div>
            </div>
        </div>
        @endif
        <div class="xs:flex-none flex-row md:flex my-2" style="align-items: center;justify-content:space-between">
            <div class="w-full md:w-6/6 mx-1">
                <button name="save" class="p-1 px-10 bg-green-700 text-gray-100 text-lg
                  focus:border-4 border-green-300">Save and Next</button>
            </div>
            <div class="w-full md:w-6/6 text-right">
                <button name="save_and_exit" class="p-1 px-10 bg-green-700 text-gray-100 text-lg
                 focus:border-4 border-green-300">Save and Exit</button>
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection



@section('ext_js')
<script>

</script>
@endsection