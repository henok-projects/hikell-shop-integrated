@props(['users', 'icon', 'title'])

<div class="flex items-center">
    {!! $icon !!}
    <span class="ml-2 text-lg text-white">{{ $title }}</span>
</div>
 <div class="center" style="top: 20%;left: 0;
    right: 0; width: 400px;height: 0px; margin: auto;">
        <form action="{{url('/search')  }}"   type="get" class="form-control" :class="{'bg-gray-200': !dark, 'bg-gray-700': dark}">
           {{ csrf_field() }}
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 fill-current" :class="{'text-gray-600': !dark, 'text-gray-400': dark}" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
            <x-input name="query" maxlength="10" autocomplete="off" class="px-2 py-1 mr-3 leading-tight placeholder-gray-400 bg-transparent border-none appearance-none lg:w-64 focus:border-gray-100 focus:outline-none"  :class="{'bg-gray-100 text-gray-400 focus:placeholder-gray-600': !dark, 'bg-gray-700 text-gray-200 focus:placeholder-gray-100': dark}"
            placeholder="Search podcast">
        </form>
    </div>
    @foreach ($users as $user)
        <div class="p-10">
    <!--Card 1-->
    <div class="w-full lg:max-w-full lg:flex">
      <div class="flex-none h-48 overflow-hidden text-center bg-cover rounded-t lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" style="background-image: url('{{ asset("storage/image/" . $user->audio_thumbnail) }}')" title="Mountain">
      </div>
      <div class="flex flex-col justify-between p-4 leading-normal bg-white border-b border-l border-r border-gray-400 rounded-b lg:border-l-0 lg:border-t lg:border-gray-400 lg:rounded-b-none lg:rounded-r">
        <div class="mb-8">

          <div class="mb-2 text-xl font-bold text-gray-900">Epsiode : {{ $user->episode_number  }} {{ $user->podcast_title }}</div>
            <p class="flex items-center text-sm text-gray-600">
            {{-- <svg class="w-3 h-3 mr-2 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
            </svg> --}}
             <span style="color: black">Published at: {{ date('j F,y', strtotime($user->publish_date)); }}</span>
          </p>
          <br>
          <p class="text-base text-gray-700">{{$user->podcast_description}}</p>
        </div>
        <div class="flex items-center">
          {{-- <img class="w-10 h-10 mr-4 rounded-full" src="/ben.png" alt="Avatar of Writer"> --}}
          <div class="text-sm">
            <p class="leading-none text-gray-900"></p>


              <audio id="player2" preload="none" controls style="max-width: 600%;width:550px">

               <source src="{{ asset("storage/audios/" . $user->audio_location) }}" type="audio/mp3">
               </audio>
            {{-- <p class="text-gray-600">Aug 18</p> --}}

          </div>
        </div>
      </div>
    </div>
  </div>

    @endforeach
</div>
