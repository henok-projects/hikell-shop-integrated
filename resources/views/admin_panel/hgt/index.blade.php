@extends('layouts.app')

@section('content')
<!-- component -->
<div class="min-h-screen flex">
<x-admin-sidebar />
<div class="table w-full mt-10 py-2 mr-3 bg-white px-5 pt-10">
    {{-- Idol form here --}}
    <h1 class="mb-3 text-2xl font-semibold">Manage HGT Idols</h1>
    @if(auth()->user()->admin == 2)
    <form action="{{ route("admin_panel.hgt.store") }}" method="POST">
        @csrf
        <div class="flex items-center justify-between px-6 py-5">
            <div class="flex flex-col space-y-2">
                <x-label class="text-base text-gray-900" for="idol_name" :value="__('Idol Name')" />
                <x-input placeholder="Enter Idol Name..." id="idol_name" class="block mt-1 w-full" type="text" name="idol_name" :value="old('idol_name')" required autofocus />
            </div>
            <div class="flex flex-col space-y-2">
                <x-label class="text-base text-gray-900" for="start_date" :value="__('Start Date')" />
                <x-input placeholder="Enter Start Date..." id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
            </div>
            <div class="flex flex-col space-y-2">
                <x-label class="text-base text-gray-900" for="end_date" :value="__('End Date')" />
                <x-input placeholder="Enter End Date..." id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
            </div>
            <div class="flex items-center justify-end">
                <button class="flex items-center justify-between bg-purple-800 text-white px-3 py-1 rounded hover:bg-purple-900 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>Add</span>
                </button>
            </div>
        </div>
    </form>
    @endif
    <table class="w-full space-x-10 border">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="border-r py-2">
                    <input type="checkbox">
                </th>
                <th class="p-2 border-r cursor-pointer text-sm text-gray-900">
                    <div class="flex items-center ">
                        ID
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm text-gray-900">
                    <div class="flex items-center">
                        Idol Name
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm text-gray-900">
                    <div class="flex items-center ">
                        Start Date
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm text-gray-900">
                    <div class="flex items-center ">
                        End Date
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                @if(auth()->user()->admin == 2)
                <th class="p-2 border-r cursor-pointer text-sm text-gray-900">
                    <div class="flex items-center ">
                        Action
                    </div>
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            {{-- Idol lists here --}}

            @foreach ($idols as $item)
            <tr class="bg-gray-100 border-b text-sm text-gray-600">
                <td class="p-2 border-r text-center ">
                    <input type="checkbox">
                </td>
                <td class="p-2 border-r">{{$loop->iteration}} </td>
                <td class="p-2 border-r"><a href="/admin_panel/hgt/{{ $item->id }}">{{$item->name}}</a> </td>
                <td class="p-2 border-r">{{\Carbon\Carbon::createFromTimestamp($item->start_date)->toFormattedDateString() }} </td>
                <td class="p-2 border-r">{{\Carbon\Carbon::createFromTimestamp($item->end_date)->toFormattedDateString() }} </td>
                @if(auth()->user()->admin == 2)
                <td>
                    <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                    <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<br>
@endsection
