@php
$refURL = isset($identifier) ? url('/enroll') . "?ref=" . $identifier : '';
$service = $refURL != '' ? 'apply-ek' : 'launch-site'
@endphp
@extends('layouts.app')
@section('content')
@include('components.space', ['color' => 'green-700', 'title' => 'Subscription plans', 'subtitle' => 'Create Your
Subscription Plans.'])

{{-- <div class="w-4/5 sm:w-3/5 z-10 top-28 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white"> --}}
<div class="w-4/5 sm:w-3/5 z-10 top-20 top-24 relative mx-auto shadow-lg px-4 py-8 text-white"
    :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">

    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="/request_connect" method="POST" class="lg:px-10" enctype="multipart/form-data">
        @csrf
        <div class="mx-auto my-2" style="align-items: center;justify-content:center;text-align:center">
            <div class="my-3">
                <h1 class="text-3xl font-semibold tracking-wide text-center text-green-700 my-3 display-1 text-shadow">
                    <strong>Create Hikel Connected Account</strong> </h1>
                <p>
                    by start filling all the neccessary information like your full name,
                    legal adress,bank account and other related information, you will create
                    your hikel accout and start selling now.

                </p>
            </div>
            <div class="py-3">
                <button class="p-1 px-10 bg-green-700 text-gray-100 text-lg
                 rounded-lg focus:border-4 border-green-300">Connect Now</button>
            </div>
        </div>
    </form>
</div>
<br>
@endsection



@section('ext_js')
<script>


</script>
@endsection