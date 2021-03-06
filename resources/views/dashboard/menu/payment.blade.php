<div class="w-full text-xl leading-normal lg:w-1/5 lg:px-6">
    <p class="hidden w-full h-64 py-2 pt-2 mt-0 lg:pb-6 lg:h-auto lg:overflow-y-hidden lg:block ">Balance & Revenu</p>
    <div class="sticky inset-0 block mt-10 lg:hidden">
     <button id="menu-toggle" class="flex justify-between w-full px-3 py-3 border border-gray-600 rounded appearance-none lg:bg-transparent hover:border-yellow-600 focus:outline-none">
         <span class='text-sm'>Go to</span>
         <svg class="float-right h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
             <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
         </svg>
     </button>
    </div>
    <div class="sticky inset-0 z-20 hidden w-full h-auto mt-0 overflow-x-hidden overflow-y-auto border border-gray-700 shadow lg:h-auto lg:overflow-y-hidden lg:block lg:border-transparent lg:shadow-none lg:bg-transparent" style="top:5em;" id="menu-content">
       <ul class="flex flex-col p-0 list-none">
          <li class="py-2 border-b border-white md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
             <a href="{{ url('user',['menu'=>'payment','content'=>'payment']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                <span class="pb-1 text-sm font-bold md:pb-0">Account Balance</span>
             </a>
          </li>
          <li class="py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
             <label>Revenue$ From </label>
             <ul class="flex flex-col p-0 mr-8 text-sm font-semibold list-none ">
                <li class="inline-flex py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
                    <a href="{{ url('user',['menu'=>'payment','content'=>'revenueself']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                         Self contents
                    </a>
                </li>
                <li class="inline-flex py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
                    <a href="{{ url('user',['menu'=>'payment','content'=>'revenuereused'])}}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                         Reused contents
                    </a>
                </li>
                <li class="inline-flex py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
                    <a href="{{ url('user',['menu'=>'payment','content'=>'revenuehikel']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                         Hikel Services
                    </a>
                </li>
                <li class="inline-flex py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
                    <a href="{{ url('user',['menu'=>'payment','content'=>'revenuehgt']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                         HGT Videos
                    </a>
                </li>
                <li class="inline-flex py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
                    <a href="{{ url('user',['menu'=>'payment','content'=>'revenuestore']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                         Store
                    </a>
                </li>

                <li class="inline-flex py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
                    <a href="{{ url('user',['menu'=>'payment','content'=>'revenuereferral']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                        Referrals
                    </a>
                </li>
            </ul>
          </li>
          <li class="py-2 md:my-0 hover:bg-gray-300 lg:hover:bg-transparent">
             <a href="{{ url('user',['menu'=>'payment','content'=>'estimate']) }}" class="block pl-4 no-underline align-middle border-l-4 border-transparent hover:text-black lg:hover:border-gray-600">
             <span class="pb-1 text-sm md:pb-0">Estimate Credit</span>
             </a>
          </li>
       </ul>
    </div>
 </div>
