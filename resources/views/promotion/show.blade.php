@extends('layouts.app')


@section('ext_css')
    <link rel="stylesheet" href="/css/videojs.css"/>
@endsection

@section('content')
<div class="container max-w-full pb-0 mx-auto sm:px-4">
    <div class="video-block section-padding">
       <div class="flex flex-wrap ">
          <div class="pl-4 pr-4 md:w-2/3">
             <div class="single-video-left">
                <div class="single-video">
                   <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/8LWZSGNjuF0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="mb-3 single-video-title box">
                   <h2><a href="#">Contrary to popular belief, Lorem Ipsum (2019) is not.</a></h2>
                   <p class="mb-0"><i class="fas fa-eye"></i> 2,729,347 views</p>
                </div>
                <div class="mb-3 single-video-author box">
                   <div class="float-right"><button class="inline-block px-3 py-1 font-normal leading-normal text-center text-white no-underline whitespace-no-wrap align-middle bg-red-600 border rounded select-none hover:bg-red-700" type="button">Subscribe <strong>1.4M</strong></button> <button class="inline-block px-3 py-1 font-normal leading-normal text-center text-red-600 no-underline whitespace-no-wrap align-middle bg-white border rounded select-none bo hover:text-white hover:bg-red-700" type="button"><i class="fas fa-bell"></i></button></div>
                   <img class="h-auto max-w-full" src="img/s4.png" alt="">
                   <p><a href="#"><strong>Osahan Channel</strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></span></p>
                   <small>Published on Aug 10, 2018</small>
                </div>
                <div class="mb-3 single-video-info-content box">
                   <h6>Cast:</h6>
                   <p>Nathan Drake , Victor Sullivan , Sam Drake , Elena Fisher</p>
                   <h6>Category :</h6>
                   <p>Gaming , PS4 Exclusive , Gameplay , 1080p</p>
                   <h6>About :</h6>
                   <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved overVarious versions have evolved over the years, sometimes </p>
                   <h6>Tags :</h6>
                   <p class="mb-0 tags">
                      <span><a href="#">Uncharted 4</a></span>
                      <span><a href="#">Playstation 4</a></span>
                      <span><a href="#">Gameplay</a></span>
                      <span><a href="#">1080P</a></span>
                      <span><a href="#">ps4Share</a></span>
                      <span><a href="#">+ 6</a></span>
                   </p>
                </div>
             </div>
          </div>
          <div class="pl-4 pr-4 md:w-1/3">
             <div class="single-video-right">
                <div class="flex flex-wrap ">
                   <div class="pl-4 pr-4 md:w-full">
                      <div class="adblock">
                         <div class="img">
                            Google AdSense<br>
                            336 x 280
                         </div>
                      </div>
                      <div class="main-title">
                         <div class="relative inline-flex float-right align-middle right-action">
                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                               <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                               <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                               <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                            </div>
                         </div>
                         <h6>Up Next</h6>
                      </div>
                   </div>
                   <div class="pl-4 pr-4 md:w-full">
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v1.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">Here are many variati of passages of Lorem</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v2.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v3.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">Culpa qui officia deserunt mollit anim</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v4.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">Deserunt mollit anim id est laborum.</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v5.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">Exercitation ullamco laboris nisi ut.</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v6.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">There are many variations of passages of Lorem</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                      <div class="mt-0 adblock">
                         <div class="img">
                            Google AdSense<br>
                            336 x 280
                         </div>
                      </div>
                      <div class="video-card video-card-list">
                         <div class="video-card-image">
                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                            <a href="#"><img class="h-auto max-w-full" src="img/v2.png" alt=""></a>
                            <div class="time">3:50</div>
                         </div>
                         <div class="video-card-body">
                            <div class="relative inline-flex float-right align-middle right-action">
                               <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                               </a>
                               <div class="absolute left-0 z-50 flex flex-col hidden float-left p-0 py-2 mt-1 text-base list-none bg-white border border-gray-300 rounded dropdown-menu-right">
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                  <a class="block w-full px-6 py-1 font-normal text-gray-900 whitespace-no-wrap border-0" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                               </div>
                            </div>
                            <div class="video-title">
                               <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                            </div>
                            <div class="text-green-500 video-page">
                               Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="text-green-500 fas fa-check-circle"></i></a>
                            </div>
                            <div class="video-view">
                               1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- /.container-fluid -->
@endsection

@section('ext_js')
    <script src="{{ asset("/js/videojs.js") }}" defer></script>
    <script>
        videojs('my-video')
    </script>

@endsection
