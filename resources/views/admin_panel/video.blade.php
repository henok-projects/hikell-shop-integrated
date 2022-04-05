@extends('layouts.app')

@section('content')
<!-- component -->
<div class="min-h-screen flex">
<x-admin-sidebar />
<div class="table w-full mt-10 py-2 mr-3 bg-white px-5 pt-10">
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-50 border-b text-gray-800">
                <th class="border-r py-2">
                    <input type="checkbox">
                </th>
                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center ">
                       Video ID
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center">
                      Uploader ID
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center ">
                       Title
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                {{-- <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center ">
                      Subscription Fee
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th> --}}
                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center ">
                        Allow Reuse
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center">
                     Category
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>

                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center">
                      Description
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                @if(auth()->user()->admin == 2)
                <th class="p-2 border-r cursor-pointer text-sm">
                    <div class="flex items-center justify-center">
                        Action
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $item)
            <tr class="bg-gray-100 border-b text-sm text-gray-600">
                <td class="p-2 border-r text-center ">
                    <input type="checkbox">
                </td>
                <td class="p-2 border-r">{{$item->video_id}}</td>
                <td class="p-2 border-r">{{$item->user_id}} </td>
                <td class="p-2 border-r">{{$item->title}} </td>
                <td class="p-2 border-r">{{$item->allow_reuse}} </td>
                <td class="p-2 border-r">{{$item->name}} </td>
                <td class="p-2 border-r">{{$item->description}} </td>
                @if(auth()->user()->admin == 2)
                <td class="flex items-center justify-between space-x-1">
                    <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs">Edit</a>
                    <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs">Remove</a>
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
