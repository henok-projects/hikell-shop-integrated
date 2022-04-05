@extends('layouts.dashboard')
@section('content')
    <div class="container flex flex-wrap w-full px-2 mx-auto mt-16 pt-9 lg:pt-16 lg:flex-nowrap">
        @include('dashboard.menu.'.$menu)
        @include('dashboard.content.'.$content)
    </div>
@endsection
