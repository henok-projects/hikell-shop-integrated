@extends('layouts.app')

@section('content')
<!-- component -->
<div class="flex min-h-screen">
<x-admin-sidebar />
<div class="table w-full px-5 py-2 pt-10 mt-10 mr-3 bg-white">
<table class="space-x-10 border ">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="py-2 border-r">
                    <input type="checkbox">
                </th>
                <th class="p-2 text-sm font-thin text-gray-500 border-r cursor-pointer">
                    <div class="flex items-center">
                        Video
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 text-sm font-thin text-gray-500 border-r cursor-pointer">
                    <div class="flex items-center">
                        Name
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 text-sm font-thin text-gray-500 border-r cursor-pointer">
                    <div class="flex items-center ">
                        Reason
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 text-sm font-thin text-gray-500 border-r cursor-pointer">
                    <div class="flex items-center justify-center">
                        Action
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $item)
            <tr class="text-sm text-gray-600 bg-gray-100 border-b">
                <td class="p-2 text-center border-r ">
                    <input type="checkbox">
                </td>
                <td class="p-2 border-r">{{$item->video->title}} </td>
                <td class="p-2 border-r">{{$item->reporter->username}} </td>
                <td class="p-2 border-r">{{$item->reason}} </td>
                <td>
                    <a href="#" class="p-2 text-xs font-thin text-white bg-red-500 hover:shadow-lg">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<br>
@endsection
