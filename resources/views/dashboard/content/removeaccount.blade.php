<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">Terminate Account</h1>
        <hr class="border-b border-gray-400">
    </div>

    <div class="flex flex-col w-full">
        <div class="flex flex-col space-y-2">
            <label class="text-lg font-medium ">Terminate Account</label>
            <div class="flex flex-col text-xl cursor-pointer ">
                <div x-data= "{isOpenModal:false}" @keydown.escape = 'isOpenModal=false'>
                    <div class='inline-flex'>
                        <button @click = "isOpenModal= true" @keydown.escape = 'isOpenModal = false' class="flex p-2 font-semibold border-0 rounded-full focus:outline-none">Terminate Site</button>
                        <x-help-tooltip :tooltip="__('when you choose this option, your contents including Videos, EBooks, Podcasts, Images, texts, and other information related to your contents will be deleted. The contents you are re using also be deleted as well but not from the owners. But you still have your account information. You can still create a new site again. After you terminate your site, we may store your deleted information for the purpose legal issues and service quality assurance.')"/>
                    </div>
                    <!--Modal-->
                    <div x-show="isOpenModal" @click.away = 'isOpenModal=false' @keydown.escape = 'isOpenModal=false' class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full modal">
                        <div @click = 'isOpenModal = false' class="absolute w-full h-full bg-gray-900 opacity-50"></div>

                        <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container md:max-w-md">
                            <div @click = 'isOpenModal = false'  class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer">
                                <svg @click = 'isOpenModal = false' class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                                <span @click = 'isOpenModal = false'  class="text-sm">(Esc)</span>
                            </div>
                            <!-- Add margin if you want to see some of the overlay behind the modal-->
                            <div class="px-6 py-4 text-left">
                                <!--Title-->
                                <div class="flex items-center justify-between -mb-4">
                                    <p class="ml-3 text-2xl font-bold">Terminate Site</p>
                                    <div @click = 'isOpenModal = false'  class="z-50 cursor-pointer">
                                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <hr/>
                                <!--Body-->
                                <p>Are you sure you want to delete you site?</p>
                                <p> cannot be undone?   </p>
                                <!--Footer-->
                                <div class="flex justify-end pt-2">
                                    <button onclick="event.preventDefault(); document.getElementById('terminate-site').submit();" class="p-3 px-4 mr-2 rounded-full ">Terminate</button>
                                    <button @click = 'isOpenModal = false' class="p-3 px-6 text-white bg-indigo-500 rounded-full hover:bg-indigo-400">Close</button>
                                </div>
                                <form id="terminate-site" action="{{ route('terminate.site',auth()->user()->user_id) }}" method="POST" style="display: none;">
                                    @method('delete')
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div  x-cloak x-data= "{isOpenModal:false}" @keydown.escape = 'isOpenModal=false' class="mt-4">
                    <div class="inline-flex">
                        <button  @click = "isOpenModal= true" @keydown.escape = 'isOpenModal = false'  class="flex p-2 font-semibold border-0 rounded-full focus:outline-none">
                            Terminate Account
                        </button>
                        <x-help-tooltip :tooltip="__('when you choose this option, All your entire information including your site will be deleted and you will not have access to use hikel services except watching other people contents. But we may store your deleted information for the purpose legal issues and service quality assurance. ')"/>
                    </div>
                    <!--Modal-->
                    <div x-show="isOpenModal" @click.away = 'isOpenModal=false' @keydown.escape = 'isOpenModal=false' class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full modal">
                        <div @click = 'isOpenModal = false' class="absolute w-full h-full bg-gray-900 opacity-50"></div>

                        <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container md:max-w-md">
                            <div @click = 'isOpenModal = false'  class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer">
                                <svg @click = 'isOpenModal = false' class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                                <span @click = 'isOpenModal = false'  class="text-sm">(Esc)</span>
                            </div>
                            <!-- Add margin if you want to see some of the overlay behind the modal-->
                            <div class="px-6 py-4 text-left ">
                                <!--Title-->
                                <div class="flex items-center justify-between -mb-4">
                                    <p class="ml-3 text-2xl font-bold">Terminate Account</p>
                                    <div @click = 'isOpenModal = false'  class="z-50 cursor-pointer">
                                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <hr/>
                                <!--Body-->
                                <p>Are you sure you want to delete you account?</p>
                                <p> It cannot be undone?</p>
                                <!--Footer-->
                                <div class="flex justify-end pt-2">
                                    <button onclick="event.preventDefault(); document.getElementById('terminate-user').submit();" class="p-3 px-4 mr-2 rounded-full ">Terminate</button>
                                    <button @click = 'isOpenModal = false' class="p-3 px-6 text-white bg-indigo-500 rounded-full hover:bg-indigo-400">Close</button>
                                </div>
                                <form id="terminate-user" action="{{ route('terminate.user',auth()->user()->user_id) }}" method="POST" style="display: none;">
                                    @method('delete')
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
