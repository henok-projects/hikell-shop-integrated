@extends('layouts.app')

@section('content')
<!-- component -->
<div class="flex min-h-screen">
<x-admin-sidebar />
<div class="table w-full px-5 py-2 pt-10 mt-10 mr-3 bg-white">
<table class="space-x-10 border w-full">
        <thead>
            <tr class="border-b bg-gray-50 text-gray-800">
                <th class="py-2 border-r">
                    <input type="checkbox">
                </th>

                <th class="p-2 text-sm border-r cursor-pointer">
                    <div class="flex items-center ">
                        Site Name
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 text-sm border-r cursor-pointer">
                    <div class="flex items-center">
                        Home page Tilte
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>

                <th class="p-2 text-sm border-r cursor-pointer">
                    <div class="flex items-center ">
                        Site Owner
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 text-sm border-r cursor-pointer">
                    <div class="flex items-center">
                        Email
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                {{-- <th class="p-2 text-sm font-thin text-gray-500 border-r cursor-pointer">
                    <div class="flex items-center">
                        Site ID
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th> --}}
                @if(auth()->user()->admin == 2)
                <th class="p-2 text-sm border-r cursor-pointer">
                    <div class="flex items-center justify-center">
                        Action
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
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
            @foreach ($sites as $item)
            <tr class="text-sm text-gray-600 bg-gray-100 border-b">
                <td class="p-2 text-center border-r ">
                    <input type="checkbox">
                </td>
                <td class="p-2 border-r">{{$item->site_name}} </td>
                <td class="p-2 border-r">{{$item->page_title}} </td>
                <td class="p-2 border-r">{{$item->first_name}} {{$item->last_name}} </td>
                <td class="p-2 border-r">{{$item->email}} </td>
                {{-- <td class="p-2 border-r">{{$item->username}} </td> --}}
                {{-- <td class="p-2 border-r">{{$item->site_id}} </td> --}}
                @if(auth()->user()->admin == 2)

                <td class="flex items-center justify-center">
                    {{-- <a href="#" class="p-2 text-xs font-thin text-white bg-blue-500 hover:shadow-lg">Edit</a> --}}
                    <a href="#" class="p-2 text-xs text-white bg-red-500 hover:shadow-lg hover:bg-red-700">Remove</a>
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
