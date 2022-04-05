@extends('layouts.app')

@section('content')
<!-- component -->
<div class="min-h-screen flex">
    <x-admin-sidebar />
    <div class="table w-full mt-10 py-2 mr-3 bg-white px-5 pt-10">
        <table class=" space-x-10 border">
            <thead>
                <tr class="bg-gray-50 border-b text-gray-800">
                    <th class="border-r py-2">
                        <input type="checkbox">
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            User Id
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center">
                            Email
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            User Name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center">
                            First Name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            Last Name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            Gender
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            Birth Date
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center">
                            Balance
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            Sign Up At
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
                @foreach ($users as $item)
                <tr class="bg-gray-100 border-b text-sm text-gray-600">
                    <td class="p-2 border-r text-center ">
                        <input type="checkbox">
                    </td>
                    <td class="p-2 border-r">{{$item->user_id}} </td>
                    <td class="p-2 border-r">{{$item->email}} </td>
                    <td class="p-2 border-r">{{$item->username}} </td>
                    <td class="p-2 border-r">{{$item->first_name}} </td>
                    <td class="p-2 border-r">{{$item->last_name}} </td>
                    <td class="p-2 border-r">{{$item->gender}} </td>
                    <td class="p-2 border-r">{{$item->birth_date}} </td>
                    <td class="p-2 border-r">{{$item->balance}} </td>
                    <td class="p-2 border-r">{{$item->created_at}} </td>
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
