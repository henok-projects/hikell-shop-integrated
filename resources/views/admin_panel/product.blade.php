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
                            Id
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                         Image
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center">
                            name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            stock status
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center">
                            quantity
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    {{-- <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                         Description
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th> --}}
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                          Price
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
 <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                          wheight
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm">
                        <div class="flex items-center ">
                            Posted date
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                   
                   
                    @if(auth()->user()->admin == 1)
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
                @foreach ($product as $item)
                <tr class="bg-gray-100 border-b text-sm text-gray-600">
                    <td class="p-2 border-r text-center ">
                        <input type="checkbox">
                    </td>
                    <td class="p-2 border-r">{{$item->id}} </td>
                    <td class="p-2 border-r"><img src="{{asset('/products/'.$item->image)}}"/></td>
                    <td class="p-2 border-r">{{$item->name}} </td>
                    <td class="p-2 border-r">{{$item->stock_status}} </td>
                    <td class="p-2 border-r">{{$item->quantity}} </td>
                    <td class="p-2 border-r">{{$item->regular_price}}$ </td>
                    <td class="p-2 border-r">{{$item->SKU}} </td>
                    {{-- <td class="p-2 border-r">{{$item->selling_price}} $</td> --}}
                   {{-- <td class="p-2 border-r">{{$item->weight}} LBS</td> --}}
                    <td class="p-2 border-r">{{$item->created_at}} </td>
                    {{-- <td class="p-2 border-r"><img class="h-6 w-full" src="{{ asset('thumbnails/'.$item->image)}}"
                                alt="Product image">
                    </td> --}}
                    @if(auth()->user()->admin == 1)
                    <td class="flex items-center justify-between space-x-1">
                        <a href="{{route('product.edit',['slug' =>$item->slug])}}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs">Edit</a>
                        <a href="" wire:click.prevent="deleteproduct({{$item->id}})" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs">Remove</a>
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
