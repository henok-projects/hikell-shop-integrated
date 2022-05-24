@if($content != 'deliverd')
@if($content != 'products')
@if(isset($lists) && count($lists)>0)
@php
$location = 'videos/';
$thumbnail = 'videos/thumnail/';
@endphp
<div class="grid grid-cols-1 gap-3 mx-3 my-3 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 2xl:grid-cols-6">
  @foreach ($lists as $list)
  <div class="flex flex-col w-full text-gray-300 bg-gray-700 rounded shadow hover:bg-gray-800"
    onmouseenter="showPlayIcon(this)" onmouseleave="hidePlayIcon(this)">
    @if($content == 'videos' || $content == 'hgt' || $content == 'reuse')
    <a href="{{ route('watch',[$list->video_id]) }}" class="hover:text-gray-100 hover:font-semibold">
      @elseif ($content == 'ebook')
      <a href="{{ route('site.book.read',$list->book_id) }}" class="hover:text-gray-100 hover:font-semibold">
        @elseif ($content == 'podcast')
        <a href="{{ route('play',['podcast_id',$list->podcast_id]) }}" class="hover:text-gray-100 hover:font-semibold">
          @endif
          <div class="relative flex w-auto cursor-pointer h-44">

            {{-- <img class="object-cover w-full"
              src="{{ Storage::disk('s3')->temporaryUrl($fileThumbnail.$list->thumbnail, '+2 minutes') }}"
              alt="thumbnail"> --}}
            <img class="object-cover w-full" src="{{ asset('storage/thumbnails/'.$list->thumbnail)}}" alt="thumbnail">
            {{-- <span
              class="absolute px-1 text-xs text-gray-200 bg-red-500 rounded playCover bottom-2 right-2 opacity-60">0:12</span>
            --}}
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              class="absolute hidden w-12 h-12 transform -translate-x-1/2 -translate-y-1/2 playCover opacity-70 left-1/2 top-1/2"
              viewBox="0 0 226 226">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                style="mix-blend-mode: normal">
                <path d="M0,226v-226h226v226z" fill="none"></path>
                <g>
                  <path
                    d="M222.51289,113c0,-60.47266 -49.04023,-109.51289 -109.51289,-109.51289c-60.47266,0 -109.51289,49.04023 -109.51289,109.51289c0,60.47266 49.04023,109.51289 109.51289,109.51289c60.47266,0 109.51289,-49.04023 109.51289,-109.51289z"
                    fill="#e74c3c"></path>
                  <path
                    d="M167.16055,107.35l-77.20195,-47.45117c-2.11875,-1.28008 -4.89961,-1.36836 -7.0625,-0.13242c-2.20703,1.23594 -3.57539,3.57539 -3.57539,6.09141v94.46094c0,2.51602 1.36836,4.85547 3.53125,6.09141c1.05938,0.57383 2.20703,0.88281 3.39883,0.88281c1.28008,0 2.51602,-0.35313 3.61953,-1.01523l77.20195,-47.05391c2.07461,-1.23594 3.35469,-3.53125 3.35469,-5.91484c0.08828,-2.42773 -1.1918,-4.72305 -3.26641,-5.95898z"
                    fill="#ffffff"></path>
                </g>
              </g>
            </svg>
            <div class="absolute hidden w-full h-full bg-black playCover opacity-30"></div>
          </div>
        </a>
        <div class="flex flex-col px-3 py-2 space-y-1">
          @if($content == 'videos' || $content == 'hgt' || $content == 'reuse')
          <a href="{{ route('watch',[$list->video_id]) }}" class="hover:text-gray-100 hover:font-semibold">
            @elseif ($content == 'ebook')
            {{-- <a href="{{ route('book.read',['book_id',$list->book_id]) }}"
              class="hover:text-gray-100 hover:font-semibold"> --}}
              <a href="#">
                @elseif ($content == 'podcast')
                {{-- <a href="{{ route('podcast',['podcast_id',$list->podcast_id]) }}"
                  class="hover:text-gray-100 hover:font-semibold"> --}}
                  @endif
                  <span class="break-words">{{ $list->title }}</span>
                </a>
                <div class="flex items-center justify-between">
                  @if($content == 'videos' || $content == 'hgt' || $content == 'reuse' )
                  @if($list->user_id == $list->original_owner)
                  <span class="text-sm text-yellow-600">
                    <a href="{{ route('video_edit', $list->video_id) }}"> Edit </a>
                  </span>
                  @endif
                  <span class="text-sm text-red-600">
                    @if($list->user_id == $list->original_owner &&
                    Carbon\Carbon::now()->subDays(60)->gte(\Carbon\Carbon::parse($list->created_at)))
                    <p style="cursor: pointer;" wire:click="deleteContent('{{$list->video_id}}','1')"> Delete </p>
                    @elseif($list->user_id != $list->original_owner)
                    <p style="cursor: pointer;" wire:click="deleteContent('{{$list->video_id}}','0')"> Unreuse </p>
                    @endif
                  </span>
                  @elseif ($content == 'ebook')
                  <span class="text-sm text-yellow-600">
                    <a href="{{ route('book.edit',$list->book_id) }}"> Edit </a>
                  </span>
                  <span class="text-xs text-red-400">
                    <a href="{{ route('book.destroy',$list->book_id) }}"> Delete </a>
                  </span>
                  @elseif ($content == 'store')
                  <span class="text-sm text-yellow-600">
                    <a href="{{route('product.edit',['slug' =>$list->slug])}}"> Update </a>
                  </span>
                  {{-- <span class="text-xs text-red-400">
                    <a href="#"> Delete </a>
                  </span> --}}
                  @elseif ($content == 'podcast')
                  <span class="text-sm text-yellow-600">
                    {{-- <a href="{{ route('podcast.edit',['pdocast_id',$list->podcast_id]) }}"> Edit </a> --}}
                  </span>
                  <span class="text-xs text-red-400">
                    {{-- <a href="{{ route('pdocast',['podcast_id',$list->podcast_id]) }}"> Delete </a> --}}
                  </span>
                  @endif
                </div>

        </div>
  </div>
  @endforeach
</div>
<div class="flex justify-center mt-3 lg:mt-8">
  {{ $lists->links('livewire.custom-pagination') }}
</div>
@else
<div class="flex flex-col w-full mt-10 mr-10">
  <span>There is no data!</span>
</div>
@endif
@else
<div class="p-2">
  <table class="w-full text-center rounded table-responsive">
    <thead>
      <tr>
        <th class="w-1/8 px-4 py-2 text-center border">#No</th>
        {{-- <th class="w-1/6 px-4 py-2 text-center border">Product Id</th> --}}
        <th class="w-1/6 px-4 py-2 text-center border">Name</th>
        {{-- <th class="w-1/6 px-4 py-2 text-center border">Description</th> --}}
        <th class="w-1/6 px-4 py-2 text-center border">Quantity</th>
        <th class="w-1/6 px-4 py-2 text-center border">Orderd</th>
        <th class="w-1/6 px-4 py-2 text-center border">Status</th>
        <th class="w-1/6 px-4 py-2 text-center border">Price</th>
        <th class="w-1/6 px-4 py-2 text-center border">weight</th>
        {{-- <th class="w-1/6 px-4 py-2 text-center border">Posted date</th> --}}
        <th class="p-2 border-r cursor-pointer text-sm">
          <div class="flex items-center justify-center">
            Action
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
            </svg>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      @if(isset($lists) && count($lists)>0)
      @foreach ($lists as $list )
      <tr>
        <td class="px-4 py-2 text-center border">{{ $loop->iteration }}</td>
        {{-- <td class="px-4 py-2 text-center border">{{ $list->product_id }}</td> --}}
        <td class="px-4 py-2 text-center border">{{ $list->name }}</td>

        {{-- <td class="px-4 py-2 text-center border">{{ $list->description }}</td> --}}
        <td class="px-4 py-2 text-center border">{{ $list->quantity }}</td>
        <td class="px-4 py-2 text-center border">
          @if($list->stock_status == "outofstock")
          {{-- <a href="{{ url('user',['menu'=>'store','content'=>'deliverd']) }}"> --}}
            <button onclick="showMenu(true)">
              {{ ($list->stock_status)== "outofstock"? "YES" :"NO" }}</button>
          </a>
          @else

          {{ ($list->stock_status)== "outofstock"? "YES" :"NO" }}
          @endif
        </td>
        <td class="px-4 py-2 text-center border">{{$list->stock_status}}</td>
        <td class="px-4 py-2 text-center border">{{ $list->regular_price }} $</td>
        <td class="px-4 py-2 text-center border">{{ $list->SKU }} LBS</td>
        {{-- <td class="px-4 py-2 text-center border">{{ $list->created_at->format('Y.m.d') }}</td> --}}
        <td class="flex items-center justify-between space-x-1">
          <a href="{{route('product.edit',['slug' =>$list->slug])}}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs">Edit</a>
          <a href="" wire:click.prevent="deleteproduct({{$list->id}})" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs">Delete</a>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="4">No Product found</td>
      </tr>
      @endif
    </tbody>
  </table>
  <div class="flex justify-center mt-3 lg:mt-8">
    {{-- {{ $lists->links() }} --}}
  </div>
</div>
@endif
@endif
@if(isset($lists) && count($lists)>0)
@if($content == 'deliverd')
@foreach ($lists as $list )
<div class="p-2">
  <table class="w-full text-center rounded bg-blue-200 table-responsive">
    <thead>
      <tr>
        <th class="w-1/12 px-2 py-2 text-center border">#Orderd No</th>
        <th class="w-1/6 px-4 py-2 text-center border">Orderd Item Name</th>
        <th class="w-1/6 px-4 py-2 text-center border">Quantity of Orderd item</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="px-2 py-2 text-center border">{{ $loop->iteration }}</td>
        <td class="px-4 py-2 text-center border">{{ $list->name }}</td>
        <td class="px-4 py-2 text-center border">{{ $list->qty }}</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="w-full py-6">
  <div class="flex">
    <div class="w-1/4">
      <div class="relative mb-2">
        <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-white w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path
                d="M17.677 16.879l-.343.195v-1.717l.343-.195v1.717zm2.823-3.324l-.342.195v1.717l.342-.196v-1.716zm3.5-7.602v11.507l-9.75 5.54-10.25-4.989v-11.507l9.767-5.504 10.233 4.953zm-11.846-1.757l7.022 3.2 1.7-.917-7.113-3.193-1.609.91zm.846 7.703l-7-3.24v8.19l7 3.148v-8.098zm3.021-2.809l-6.818-3.24-2.045 1.168 6.859 3.161 2.004-1.089zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.332l-.35.199v1.717l.35-.199v-1.717zm-16.656-4.036h-2v1h2v-1zm0 2h-3v1h3v-1zm0 2h-2v1h2v-1z" />
            </svg>
          </span>
        </div>
      </div>
      <div class="text-xs text-center md:text-base">Order placed</div>
    </div>
    <div class="w-1/4 ">
      <div class="relative mb-2">
        <div class="absolute flex align-center items-center align-middle content-center"
          style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
          <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
            {{-- {{ ($list->qty) <0 0? "YES" :"NO" }} --}} @if($list->status >2)
              <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
              @else
              <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
              @endif
          </div>
        </div>
        <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-white w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
              height="24">
              <path
                d="M3 18h-2c-.552 0-1-.448-1-1v-2h15v-9h4.667c1.117 0 1.6.576 1.936 1.107.594.94 1.536 2.432 2.109 3.378.188.312.288.67.288 1.035v4.48c0 1.121-.728 2-2 2h-1c0 1.656-1.344 3-3 3s-3-1.344-3-3h-6c0 1.656-1.344 3-3 3s-3-1.344-3-3zm3-1.2c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm12 0c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm-4-2.8h-14v-10c0-.552.448-1 1-1h12c.552 0 1 .448 1 1v10zm3-6v3h4.715l-1.427-2.496c-.178-.312-.509-.504-.868-.504h-2.42z" />
            </svg>
          </span>
        </div>
      </div>
      <div class="text-xs text-center md:text-base">In Transit</div>
    </div>
    <div class="w-1/4">
      <div class="relative mb-2">
        <div class="absolute flex align-center items-center align-middle content-center"
          style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
          <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
            @if($list->qty >23)
            <div class="w-0 bg-green-300 py-1 rounded" style="width: 33%;"></div>
            @else
            <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
            @endif
          </div>
        </div>
        <div
          class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-gray-600 w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
              height="24">
              <path
                d="M7.919 17.377l-4.869-13.377h-2.05c-.266 0-.52-.105-.707-.293-.188-.187-.293-.442-.293-.707 0-.552.447-1 1-1h3.45l5.469 15.025c.841.101 1.59.5 2.139 1.088l11.258-4.097.684 1.879-11.049 4.021c.032.19.049.385.049.584 0 1.932-1.569 3.5-3.5 3.5-1.932 0-3.5-1.568-3.5-3.5 0-1.363.781-2.545 1.919-3.123zm1.581 1.811c.724 0 1.312.588 1.312 1.312 0 .724-.588 1.313-1.312 1.313-.725 0-1.313-.589-1.313-1.313s.588-1.312 1.313-1.312zm5.799-12.29l4.767-1.735 2.736 7.517-11.406 4.152-2.736-7.518 4.759-1.732 1.325 3.639 1.879-.684-1.324-3.639zm.537-1.26l-7.518 2.736-2.052-5.638 7.518-2.736 2.052 5.638z" />
            </svg>
          </span>
        </div>
      </div>
      <div class="text-xs text-center md:text-base">Delivery</div>
    </div>
    <div class="w-1/4">
      <div class="relative mb-2">
        <div class="absolute flex align-center items-center align-middle content-center"
          style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
          <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
            <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
          </div>
        </div>
        <div
          class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-gray-600 w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
              height="24">
              <path class="heroicon-ui"
                d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z" />
            </svg>
          </span>
        </div>
      </div>
      <div class="text-xs text-center md:text-base">Deliverd</div>
    </div>
  </div>
</div>
@endforeach
@endif

<!-- component -->
<div id="menu" class="hidden w-full h-full inset-0 bg-opacity-80 top-0 fixed sticky-0">
  <div class="2xl:container  2xl:mx-auto py-28 px-4 md:px-28 flex justify-center items-center">
    <div
      class="w-full md:w-auto dark:bg-gray-800 relative flex flex-col justify-center items-center bg-gray-400 py-16 px-4 md:px-24 xl:py-24 xl:px-36">

      <div class="flex">
        <div class="w-1/4 pr-12">
          <div class="relative mb-2">
            <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
              <span class="text-center text-white w-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path
                    d="M17.677 16.879l-.343.195v-1.717l.343-.195v1.717zm2.823-3.324l-.342.195v1.717l.342-.196v-1.716zm3.5-7.602v11.507l-9.75 5.54-10.25-4.989v-11.507l9.767-5.504 10.233 4.953zm-11.846-1.757l7.022 3.2 1.7-.917-7.113-3.193-1.609.91zm.846 7.703l-7-3.24v8.19l7 3.148v-8.098zm3.021-2.809l-6.818-3.24-2.045 1.168 6.859 3.161 2.004-1.089zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.332l-.35.199v1.717l.35-.199v-1.717zm-16.656-4.036h-2v1h2v-1zm0 2h-3v1h3v-1zm0 2h-2v1h2v-1z" />
                </svg>
              </span>
            </div>
          </div>
          <div class="text-xs text-center md:text-base">Order Placed</div>
        </div>
        <div class="w-1/4">
          <div class="relative mb-2">
            <div class="absolute flex align-center items-center align-middle content-center"
              style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
              <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                {{-- {{ ($list->qty) <0 0? "YES" :"NO" }} --}} @if($list->qty >2)
                  <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                  @else
                  <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                  @endif
              </div>
            </div>
            <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
              <span class="text-center text-white w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                  height="24">
                  <path
                    d="M3 18h-2c-.552 0-1-.448-1-1v-2h15v-9h4.667c1.117 0 1.6.576 1.936 1.107.594.94 1.536 2.432 2.109 3.378.188.312.288.67.288 1.035v4.48c0 1.121-.728 2-2 2h-1c0 1.656-1.344 3-3 3s-3-1.344-3-3h-6c0 1.656-1.344 3-3 3s-3-1.344-3-3zm3-1.2c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm12 0c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm-4-2.8h-14v-10c0-.552.448-1 1-1h12c.552 0 1 .448 1 1v10zm3-6v3h4.715l-1.427-2.496c-.178-.312-.509-.504-.868-.504h-2.42z" />
                </svg>
              </span>
            </div>
          </div>
          <div class="text-xs text-center md:text-base">In Transit</div>
        </div>
        <div class="w-1/4 ">
          <div class="relative mb-2">
            <div class=" absolute flex align-center items-center align-middle content-center"
              style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
              <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                @if($list->qty >23)
                <div class="w-0 bg-green-300 py-1 rounded" style="width: 33%;"></div>
                @else
                <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                @endif
              </div>
            </div>
            <div
              class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
              <span class="text-center text-gray-600 w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                  height="24">
                  <path
                    d="M7.919 17.377l-4.869-13.377h-2.05c-.266 0-.52-.105-.707-.293-.188-.187-.293-.442-.293-.707 0-.552.447-1 1-1h3.45l5.469 15.025c.841.101 1.59.5 2.139 1.088l11.258-4.097.684 1.879-11.049 4.021c.032.19.049.385.049.584 0 1.932-1.569 3.5-3.5 3.5-1.932 0-3.5-1.568-3.5-3.5 0-1.363.781-2.545 1.919-3.123zm1.581 1.811c.724 0 1.312.588 1.312 1.312 0 .724-.588 1.313-1.312 1.313-.725 0-1.313-.589-1.313-1.313s.588-1.312 1.313-1.312zm5.799-12.29l4.767-1.735 2.736 7.517-11.406 4.152-2.736-7.518 4.759-1.732 1.325 3.639 1.879-.684-1.324-3.639zm.537-1.26l-7.518 2.736-2.052-5.638 7.518-2.736 2.052 5.638z" />
                </svg>
              </span>
            </div>
          </div>
          <div class="text-xs text-center md:text-base">Delivery</div>
        </div>
        <div class="w-1/4">
          <div class="relative mb-2">
            <div class="absolute flex align-center items-center align-middle content-center"
              style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
              <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
              </div>
            </div>
            <div
              class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
              <span class="text-center text-gray-600 w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                  height="24">
                  <path class="heroicon-ui"
                    d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z" />
                </svg>
              </span>
            </div>
          </div>
          <div class="text-xs text-center md:text-base">Finished</div>
        </div>

      </div>
      {{-- <button
        class="w-full dark:text-gray-800 dark:hover:bg-gray-100 dark:bg-white sm:w-auto mt-14 text-base leading-4 text-center text-white py-6 px-16 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 bg-gray-800 hover:bg-black">Mmm...
        Sweet!</button> --}}
      {{-- <a href="javascript:void(0)"
        class="mt-6 dark:text-white dark:hover:border-white text-base leading-none focus:outline-none hover:border-gray-800 focus:border-gray-800 border-b border-transparent text-center text-gray-800">Nope..
        I am on a diet</a> --}}
      <button onclick="showMenu(true)"
        class="text-gray-800 dark:text-gray-400 absolute top-8 right-8 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
        aria-label="close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"
            stroke-linejoin="round" />
          <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </button>
    </div>
  </div>
</div>
@endif
<script>
  let menu = document.getElementById("menu");
const showMenu = (flag) => {
  menu.classList.toggle("hidden");
};
</script>