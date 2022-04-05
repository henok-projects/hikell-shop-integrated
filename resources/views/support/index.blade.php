@extends('layouts.app')
<!-- component -->
@section('content')
<div :class="{'text-gray-900': !dark, 'text-white': dark}"
    class="flex items-center justify-center pt-16 w-full lg:text-4xl sm:text-3xl font-bold">
    <h1>How can we help you<h1>
</div>
@livewire('search-bar')

<div class="container lg:ml-5 pt-8 mx-auto lg:p-4 lg:font-semibold">
    <div class="flex flex-col md:flex-row justify-between gap-1 md:gap-3">
        <div class="flex justify-center lg:text-xl sm:text-normal border-2 border-gray-300 rounded-xl p-1 lg:p-4 bg-gray-100">
            <a href="{{ url('support',['menu'=>'launch']) }}">Launch Your Site/Sell Your Videos</a>
        </div>
        <div class="flex justify-center lg:text-xl sm:text-normal border-2 border-gray-300 rounded-xl p-1 lg:p-4 bg-gray-100">
            <a href="{{ url('support',['menu'=>'reuse']) }}">Re-Use Affilate Program</a>

        </div>
        <div class="flex justify-center lg:text-xl sm:text-normal border-2 border-gray-300 rounded-xl p-1 lg:p-4 bg-gray-100">
            <a href="{{ url('support',['menu'=>'hikel']) }}">Hikel’s Got Talent (HGT)</a>

        </div>
        <div class="flex justify-center lg:text-xl sm:text-normal border-2 border-gray-300 rounded-xl p-y-1 lg:p-4 bg-gray-100">
            <a href="{{ url('support',['menu'=>'ek']) }}" class=" p-x-4">Ek</a>

        </div>
        <div class="flex justify-center lg:text-xl sm:text-nsm border-2 border-gray-300 rounded-xl p-1 lg:p-4 bg-gray-100">
            <a href="{{ url('support',['menu'=>'payment'])}}">Receiving Your Money</a>


        </div>
    </div>
</div>
<section class="flex items-center flex-rows">
    <livewire:support-fqa :menu="$menu">
</section>

@endsection