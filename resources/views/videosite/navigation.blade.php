      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Header -->
      <header id="main-header">
         <div class="main-header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                           <div class="navbar-toggler-icon" data-toggle="collapse">
                              <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                           </div>
                        </a>
                        <a class="navbar-brand" href="index.html"> <img class="img-fluid logo" src="{{asset('videoasset/images/logo.png')}}" loading="lazy"
                           alt="streamit" /> </a>
                        <div class="mobile-more-menu">
                           <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                              data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                           <i class="ri-more-line"></i>
                           </a>
                           <div class="more-menu" aria-labelledby="dropdownMenuButton">
                              <div class="navbar-right position-relative">
                                 <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                    <li>
                                       <a href="#" class="search-toggle">
                                       <i class="ri-search-line"></i>
                                       </a>
                                       <div class="search-box iq-search-bar">
                                          <form action="#" class="searchbox">
                                             <div class="form-group position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                   placeholder="type here to search...">
                                                <i class="search-link ri-search-line"></i>
                                             </div>
                                          </form>
                                       </div>
                                    </li>
                                    <li class="nav-item nav-icon">
                                       <a href="#" class="search-toggle position-relative">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                             height="22" class="noti-svg">
                                             <path fill="none" d="M0 0h24v24H0z" />
                                             <path
                                                d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                          </svg>
                                          <span class="bg-danger dots"></span>
                                       </a>
                                       <div class="iq-sub-dropdown">
                                          <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body">
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="{{asset('videoasset/images/notify/thumb-1.jpg')}}" class="img-fluid mr-3" loading="lazy"
                                                         alt="streamit" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">Boop Bitty</h6>
                                                         <small class="font-size-12"> just now</small>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="{{asset('videoasset/images/notify/thumb-2.jpg')}}" class="img-fluid mr-3" loading="lazy"
                                                         alt="streamit" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">The Last Breath</h6>
                                                         <small class="font-size-12">15 minutes ago</small>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="{{asset('videoasset/images/notify/thumb-3.jpg')}}" class="img-fluid mr-3" loading="lazy"
                                                         alt="streamit" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">The Hero Camp</h6>
                                                         <small class="font-size-12">1 hour ago</small>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center">
                                       <img src="{{asset('videoasset/images/user/user.jpg')}}" class="img-fluid avatar-40 rounded-circle" loading="lazy"
                                          alt="user">
                                       </a>
                                       <div class="iq-sub-dropdown iq-user-dropdown">
                                          <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body p-0 pl-3 pr-3">
                                                <a href="manage-profile.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-file-user-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">Manage Profile</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="setting.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-settings-4-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">Settings</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="pricing-plan-1.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-settings-4-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">Pricing Plan</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="login.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-logout-circle-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0">Logout</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <div class="menu-main-menu-container">
                              <ul id="top-menu" class="navbar-nav ml-auto">
                                 <li class="menu-item active">
                                    <a href="index.html">Home</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="movie-category.html">Movies</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="show-category.html">Tv Shows</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="video.html">Videos</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu">
                                       <li class="menu-item"><a href="blog.html">Blog</a></li>
                                       <li class="menu-item"><a href="blog-details.html">Blog details</a></li>
                                    </ul>
                                 </li>
                                 <li class="menu-item">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                       <li class="menu-item"><a href="about-us.html">About Us</a></li>
                                       <li class="menu-item "><a href="contact.html">Contact</a></li>
                                       <li class="menu-item"><a href="faq.html">FAQ</a></li>
                                       <li class="menu-item"><a href="privacy-policy.html">Privacy-Policy</a></li>
                                       <li class="menu-item">
                                          <a href="#">Pricing</a>
                                          <ul class="sub-menu">
                                             <li class="menu-item"><a href="pricing-plan-1.html">Pricing Plan 1</a></li>
                                             <li class="menu-item"><a href="pricing-plan-2.html">Pricing Plan 2</a></li>
                                          </ul>
                                       </li>
                                       <li class="menu-item"><a href="genres.html">Genres</a></li>
                                       <li class="menu-item"><a href="tags.html">Tags</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="navbar-right menu-right">
                           <ul class="d-flex align-items-center list-inline m-0">
                              <li class="nav-item nav-icon">
                                 <a href="#" class="search-toggle device-search">
                                 <i class="ri-search-line"></i>
                                 </a>
                                 <div class="search-box iq-search-bar d-search">
                                    <form action="#" class="searchbox">
                                       <div class="form-group position-relative">
                                          <input type="text" class="text search-input font-size-12"
                                             placeholder="type here to search...">
                                          <i class="search-link ri-search-line"></i>
                                       </div>
                                    </form>
                                 </div>
                              </li>
                              <li class="nav-item nav-icon">
                                 <a href="#" class="search-toggle" data-toggle="search-toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22"
                                       class="noti-svg">
                                       <path fill="none" d="M0 0h24v24H0z" />
                                       <path
                                          d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                    </svg>
                                    <span class="bg-danger dots"></span>
                                 </a>
                                 <div class="iq-sub-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                       <div class="iq-card-body">
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <img src="{{asset('videoasset/images/notify/thumb-1.jpg')}}" class="img-fluid mr-3" loading="lazy"
                                                   alt="streamit" />
                                                <div class="media-body">
                                                   <h6 class="mb-0 ">Boot Bitty</h6>
                                                   <small class="font-size-12"> just now</small>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <img src="{{asset('videoasset/images/notify/thumb-2.jpg')}}" class="img-fluid mr-3" loading="lazy"
                                                   alt="streamit" />
                                                <div class="media-body">
                                                   <h6 class="mb-0 ">The Last Breath</h6>
                                                   <small class="font-size-12">15 minutes ago</small>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <img src="{{asset('videoasset/images/notify/thumb-3.jpg')}}" class="img-fluid mr-3" loading="lazy"
                                                   alt="streamit" />
                                                <div class="media-body">
                                                   <h6 class="mb-0 ">The Hero Camp</h6>
                                                   <small class="font-size-12">1 hour ago</small>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="nav-item nav-icon">
                                 <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                    data-toggle="search-toggle">
                                 <img src="{{asset('videoasset/images/user/user.jpg')}}" class="img-fluid avatar-40 rounded-circle" alt="user" loading="lazy">
                                 </a>
                                 <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                       <div class="iq-card-body p-0 pl-3 pr-3">
                                          <a href="manage-profile.html" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="ri-file-user-line text-primary"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="my-0 ">Manage Profile</h6>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="setting.html" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="ri-settings-4-line text-primary"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="my-0 ">Settings</h6>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="pricing-plan-1.html" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="ri-settings-4-line text-primary"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="my-0 ">Pricing Plan</h6>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="login.html" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="ri-logout-circle-line text-primary"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="my-0 ">Logout</h6>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Header End -->
      <!-- Slider Start -->
      <section id="home-banner-slider" class="iq-main-slider p-0 iq-rtl-direction swiper banner-home-swiper overflow-hidden" data-swiper="home-banner-slider">
         <div  class="slider m-0 p-0 swiper-wrapper home-slider">
            <div class="swiper-slide  slide swiper-bg s-bg-1">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  iq-ltr-direction h-100 ">
                        <div class="col-lg-7 col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                 <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit" loading="lazy">
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase"  data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">Pirates of Sea</h1>
                           <div class="d-flex flex-wrap align-items-center r-mb-23" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                              <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3" >
                                 <ul
                                    class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left" >
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star-half" aria-hidden="true"></i>
                                    </li>
                                 </ul>
                                 <span class="text-white ml-2">4.7(lmdb)</span>
                              </div>
                              <div class="d-flex align-items-center mt-2 mt-md-3">
                                 <span class="badge badge-secondary p-2">NC-17</span>
                                 <span class="ml-3">1hrs : 45mins</span>
                              </div>
                              <p data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".5">
											Piracy is an act of robbery or criminal violence by ship or boat-borne attackers upon another ship or a coastal area, typically with the goal of stealing cargo and other valuable items or properties.										
                              </p>
                           </div>
                           <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                              <div class="text-primary title starring">
                                 Starring: <span class="text-body"><a href="cast-karen-gilchrist.html">Karen Gilchrist,</a>
                                 <a href="#">James Earl Jones</a>
                                 </span>
                              </div>
                              <div class="text-primary title genres">
                                 Genres: <span class="text-body"><a href="category-action.html">Action</a></span>
                              </div>
                              <div class="text-primary title tag">
                                 Tag: <span class="text-body"><a href="tags/action.html">Action,</a><a href="tags/adventure.html">
                                 Adventure,</a><a href="tags/horror.html">Horror</a></span>
                              </div>
                           </div>
                           <div class="d-flex align-items-center r-mb-23" data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".6">
                              <a href="show-details.html" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>Play Now</a>
                           </div>
                        </div>
                        <div class=" col-lg-5 col-md-12 trailor-video iq-slider d-none d-lg-block">
                           <a href="video/trailer.mp4" class="video-open playbtn" tabindex="0">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="80px"
                                 viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                 <polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10"
                                    points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                 <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3">
                                 </circle>
                              </svg>
                              <span class="w-trailor">Watch Trailer</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="swiper-slide slide swiper-bg s-bg-2">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  h-100 iq-ltr-direction">
                        <div class="col-lg-7  col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                 <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit" loading="lazy">
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">Sand Dust
                           </h1>
                           <div class="d-flex flex-wrap align-items-center r-mb-23"
                              data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4" style="opacity: 1;">
                              <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                 <ul
                                    class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star-half" aria-hidden="true"></i>
                                    </li>
                                 </ul>
                                 <span class="text-white ml-2">4.7(lmdb)</span>
                              </div>
                              <div class="d-flex align-items-center mt-2 mt-md-3">
                                 <span class="badge badge-secondary p-2">16+</span>
                                 <span class="ml-3">2hrs : 40mins</span>
                              </div>
                           </div>
                           <p data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".5">
                              Sand and dust storms (SDS), also known as sirocco, haboob, yellow dust, white storms, and the harmattan, are a natural phenomenon linked with land and water management and climate change.										
                           </p>
                           <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                              <div class="text-primary title starring">
                                 Starring: <span class="text-body"><a href="cast-karen-gilchrist.html">Karen Gilchrist,</a>
                                 <a href="#"> James Earl Jones</a>
                                 </span>
                              </div>
                              <div class="text-primary title genres">
                                 Genres: <span class="text-body"><a href="category-action.html">Action</a></span>
                              </div>
                              <div class="text-primary title tag">
                                 Tag: <span class="text-body"><a href="tags/action.html">Action</a><a
                                    href="tags/adventure.html">Adventure,</a> <a href="tags/horror.html">
                                 Horror
                                 </a> </span>
                              </div>
                           </div>
                           <div class="d-flex align-items-center r-mb-23" data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".6">
                              <a href="movie-details.html" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>Play Now</a>
                           </div>
                        </div>
                        <div class=" col-lg-5 col-md-12 trailor-video iq-slider d-none d-lg-block">
                           <a href="video/trailer.mp4" class="video-open playbtn" tabindex="0">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="80px"
                                 viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                 <polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10"
                                    points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                 <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3">
                                 </circle>
                              </svg>
                              <span class="w-trailor">Watch Trailer</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="swiper-slide slide swiper-bg s-bg-3">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  h-100 iq-ltr-direction">
                        <div class="col-lg-7  col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                 <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit" loading="lazy">
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">Shadow
                           </h1>
                           <div class="d-flex flex-wrap align-items-center r-mb-23"
                              data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4" style="opacity: 1;">
                              <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                 <ul
                                    class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star-half" aria-hidden="true"></i>
                                    </li>
                                 </ul>
                                 <span class="text-white ml-2">4.9(lmdb)</span>
                              </div>
                              <div class="d-flex align-items-center mt-2 mt-md-3">
                                 <span class="badge badge-secondary p-2">NC-17</span>
                                 <span class="ml-3">1hrs : 58mins</span>
                              </div>
                           </div>
                           <p data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".5">
                              A shadow is a dark (real image) area where light from a light source is blocked by an opaque object. It occupies all of the three-dimensional volume behind an object with light in front of it. A shadow is a dark (real image) area where light from a light source is blocked by an opaque object.										
                           </p>
                           <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                              <div class="text-primary title starring">
                                 Starring: <span class="text-body"><a href="cast-karen-gilchrist.html">Karen Gilchrist, </a>
                                 James Earl Jones</span>
                              </div>
                              <div class="text-primary title genres">
                                 Genres: <span class="text-body"><a href="category-action.html">Action</a></span>
                              </div>
                              <div class="text-primary title tag">
                                 Tag: <span class="text-body"><a href="tags/action.html">Action,</a>
                                 <a href="tags/adventure.html">Adventure, </a>
                                 <a href="tags/horror.html">Horror </a></span>
                              </div>
                           </div>
                           <div class="d-flex align-items-center r-mb-23" data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".5">
                              <a href="movie-details.html" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>Play Now</a>
                           </div>
                        </div>
                        <div class=" col-lg-5 col-md-12 trailor-video iq-slider d-none d-lg-block">
                           <a href="video/trailer.mp4" class="video-open playbtn" tabindex="0">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="80px"
                                 viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                 <polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10"
                                    points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                 <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3">
                                 </circle>
                              </svg>
                              <span class="w-trailor">Watch Trailer</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="swiper-banner-button-prev swiper-nav" id="home-banner-slider-prev">
            <i class="ri-arrow-left-s-line arrow-icon"></i>
         </div>
         <div class="swiper-banner-button-next swiper-nav" id="home-banner-slider-next">
            <i class="ri-arrow-right-s-line arrow-icon"></i>
         </div>
         <div class="swiper-pagination"></div>
         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
               fill="none" stroke="currentColor">
               <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
         </svg>
      </section>
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
         <section id="iq-favorites">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Latest Movies</h4>
                        <a href="view-all.html" class="text-primary iq-view-all">View All</a>
                     </div>
                  </div>
               </div>
               <!-- Swiper -->
               <div class="favourite-slider">
                  <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                     <ul class="swiper-wrapper p-0 m-0 ">
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/01.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/02.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/06.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/07.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">25+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/08.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 22mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/09.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Black Queen</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1h 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/03.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">25+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/04.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 22mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/05.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Black Queen</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1h 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/10.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                  </div>
               </div>
            </div>
         </section>
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Upcoming Movies</h4>
                        <a href="view-all.html" class="text-primary iq-view-all">View All</a>
                     </div>
                  </div>
               </div>
               <!-- Swiper -->
               <div class="favourite-slider">
                  <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                     <ul class="swiper-wrapper p-0 m-0">
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/01.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/02.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/03.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">25+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/04.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 22mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/01.jpg')}}" class="img-fluid" alt="" loading="lazy">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                  </div>
               </div>
            </div>
         </section>
         <div class="verticle-slider">
            <div class="container-fluid">
               <section class="slider">
                  <div class="slider-flex position-relative">
                     <div class="swiper-button-prev verticle-btn"></div>
                     <h4 class="main-title ">Top 10 in United States</h4>
                     <div class="slider--col position-relative">
                        <div class="slider-prev btn-verticle"><i class="ri-arrow-up-s-line vertical-aerrow"></i></div>
                        <div class="slider-thumbs" data-swiper="slider-thumbs">
                           <div class="swiper-container " data-swiper="slider-thumbs-inner">
                              <div class="swiper-wrapper top-ten-slider-nav">
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative ">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/07.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1hr : 50mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                                class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">2+</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative ">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/08.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">3hr : 10mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">0</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/09.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1hr : 45mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">25+</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/10.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1hr : 22mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">0</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/11.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Black Queen</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1h 45mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">0</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative ">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/12.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1hr : 50mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                                class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">2+</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative ">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/13.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">3hr : 10mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">0</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/14.jpg')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1hr : 45mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">25+</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide swiper-bg">
                                    <div class="block-images position-relative">
                                       <div class="img-box slider--image">
                                          <img src="{{asset('videoasset/images/trending/15.png')}}" class="img-fluid" alt="" loading="lazy">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <span class="text-white">1hr : 22mins</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="show-detail.html" role="button" class="btn btn-hover">
                                             <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                             Play Now
                                             </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
                                          <ul class="list-inline p-0 m-0 music-play-lists">
                                             <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                   <div class="d-flex align-items-center">
                                                      <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                      <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                         target="_blank" rel="noopener noreferrer" class="share-ico"
                                                         tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                      <a href="#"
                                                         data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                         class="share-ico iq-copy-link" tabindex="0"><i
                                                         class="ri-links-fill"></i></a>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <span><i class="ri-heart-fill"></i></span>
                                                <span class="count-box">0</span>
                                             </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="slider-next btn-verticle"><i class="ri-arrow-down-s-line vertical-aerrow"></i></div>
                     </div>
                     <div class="slider-images" data-swiper="slider-images">
                        <div class="swiper-container " data-swiper="slider-images-inner">
                           <div class="swiper-wrapper ">
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/07.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/08.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Skull Island</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/09.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Ghost Couple</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/10.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Worst Vampire</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/11.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Worst Vampire</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/12.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Worst Vampire</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/13.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Worst Vampire</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/14.jpg')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="slider--image block-images"><img src="{{asset('videoasset/images/trending/15.png')}}" loading="lazy" alt="" /></div>
                                 <div class="description">
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <span class="text-white">1hr : 50mins</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                             class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-button-prev verticle-btn"></div>
                     <div class="swiper-button-next verticle-btn"></div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
         <section id="iq-suggestede" class="s-margin">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Suggested For You</h4>
                        <a href="view-all.html" class="text-primary iq-view-all">View All</a>
                     </div>
                  </div>
               </div>
               <!-- Swiper -->
               <div class="favourite-slider">
                  <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                     <ul class="swiper-wrapper p-0 m-0">
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/03.jpg')}}" class="img-fluid" loading="lazy" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">25+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/04.jpg')}}" class="img-fluid" loading="lazy" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 22mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/01.jpg')}}" class="img-fluid" loading="lazy" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/02.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/05.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Black Queen</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1h 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/10.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/06.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/07.jpg')}}"  loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">25+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/08.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 22mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/09.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Black Queen</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1h 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                  </div>
               </div>
            </div>
         </section>
         <section id="parallex" class="parallax-window">
            <div class="container-fluid h-100">
               <div class="row align-items-center justify-content-center h-100 parallaxt-details">
                  <div class="col-xl-5 col-lg-12 col-md-12 r-mb-23">
                     <div class="text-left">
                        <a href="javascript:void(0);">
                        <img src="{{asset('videoasset/images/parallax/parallax-logo.png')}}" loading="lazy" class="img-fluid" alt="bailey">
                        </a>
                        <div class="parallax-ratting d-flex align-items-center mt-3 mb-3">
                           <ul
                              class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                              <li><a href="javascript:void(0);" class="text-primary"><i class="fa fa-star"
                                 aria-hidden="true"></i></a></li>
                              <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star"
                                 aria-hidden="true"></i></a></li>
                              <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star"
                                 aria-hidden="true"></i></a></li>
                              <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star"
                                 aria-hidden="true"></i></a></li>
                              <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star-half-o"
                                 aria-hidden="true"></i></a></li>
                           </ul>
                           <span class="text-white ml-3">9.2 (lmdb)</span>
                        </div>
                        <div class="movie-time d-flex align-items-center mb-3 iq-ltr-direction">
                           <div class="badge badge-secondary mr-3">13+</div>
                           <h6 class="text-white">2hr:30mins</h6>
                        </div>
                        <h4 class="iq-title mb-2">
                           Movie of the year 
                        </h4>
                        <p class="iq-title-desc mb-5">Baileys Irish Cream is an Irish cream liqueur an alcoholic beverage
                           flavoured with cream, cocoa, and Irish whiskey made by Diageo at Republic of Ireland and in
                           Mallusk, Northern Ireland.
                        </p>
                        <div class="parallax-buttons">
                           <a href="movie-details.html" class="btn btn-hover"><i class="fa fa-play mr-1"
                              aria-hidden="true"></i>Play Now</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-12 col-md-12 mt-5 mt-xl-0">
                     <div class="parallax-img">
                        <a href="movie-details.html">
                        <img src="{{asset('videoasset/images/parallax/p2.jpg')}}" class="img-fluid w-100" loading="lazy" alt="bailey">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--swiper Thumbs gallery loop -->
         <section class="">
            <div class="container-fluid">
               <div class="row m-0 p-0">
                  <div id="iq-trending" class="s-margin iq-tvshow-tabs iq-rtl-direction iq-trending-tabs">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                           Trending				
                        </h4>
                     </div>
                     <div class="trending-contens position-relative ">
                        <div id="gallery-top" class="gallery-thumbs" data-swiper="gallery-top">
                           <ul class="swiper-wrapper list-inline p-0 m-0  trending-slider-nav align-items-center ">
                              <li class="swiper-slide">
                                 <a href="javascript:void(0);" >
                                    <div class="movie-swiper position-relative">
                                       <img src="{{asset('videoasset/images/tvthrillers/01.jpg')}}" alt="" />
                                    </div>
                                 </a>
                              </li>
                              <li class="swiper-slide">
                                 <a href="javascript:void(0);" >
                                    <div class="movie-swiper position-relative">
                                       <img src="{{asset('videoasset/images/tvthrillers/02.jpg')}}" alt="" />
                                    </div>
                                 </a>
                              </li>
                              <li class="swiper-slide">
                                 <a href="javascript:void(0);" >
                                    <div class="movie-swiper position-relative">
                                       <img src="{{asset('videoasset/images/tvthrillers/03.jpg')}}" alt="" />
                                    </div>
                                 </a>
                              </li>
                              <li class="swiper-slide">
                                 <a href="javascript:void(0);" >
                                    <div class="movie-swiper position-relative">
                                       <img src="{{asset('videoasset/images/tvthrillers/04.jpg')}}" alt="" />
                                    </div>
                                 </a>
                              </li>
                              <li  class="swiper-slide">
                                 <a href="javascript:void(0);" tabindex="0">
                                    <div class="movie-swiper position-relative">
                                       <img src="{{asset('videoasset/images/tvthrillers/05.jpg')}}" alt="" />
                                    </div>
                                 </a>
                              </li>
                              <li  class="swiper-slide">
                                 <a href="javascript:void(0);" tabindex="0">
                                    <div class="movie-swiper position-relative">
                                       <img src="{{asset('videoasset/images/tvthrillers/06.jpg')}}" alt="" />
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <div id="gallery-bottom" class="swiper trending-tab-slider" data-swiper="gallery-bottom">
                           <ul  class="swiper-wrapper  list-inline p-0 m-0 d-flex align-items-center">
                              <li class="swiper-slide swiper-bg slider-big-img-1">
                                 <div class="position-relative" >
                                    <div class="trending-custom-tab">
                                       <div class="tab-title-info position-relative">
                                          <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data1"
                                                   role="tab" aria-selected="true">Overview</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data2" role="tab"
                                                   aria-selected="false">Episodes</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data3" role="tab"
                                                   aria-selected="false">Trailers</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data4" role="tab"
                                                   aria-selected="false">Similar Like This</a>
                                             </li>
                                          </ul>
                                          <div class="tab-content trending-content">
                                             <div id="trending-data1" class="tab-pane fade active show ">
                                                <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                   <a href="javascript:void(0);" tabindex="0">
                                                      <div class="res-logo">
                                                         <div class="channel-logo">
                                                            <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit">
                                                         </div>
                                                      </div>
                                                   </a>
                                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                   <div class="d-flex align-items-center text-white text-detail">
                                                      <span class="badge badge-secondary p-3">18+</span>
                                                      <span class="ml-3">3 Seasons</span>
                                                      <span class="trending-year">2020</span>
                                                   </div>
                                                   <div class="d-flex align-items-center series mb-4">
                                                      <a href="javascript:void(0);"><img src="{{asset('videoasset/images/trending/trending-label.png')}}"
                                                         class="img-fluid" alt=""></a>
                                                      <span class="text-gold ml-3">#2 in Series Today</span>
                                                   </div>
                                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                      industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                   </p>
                                                   <div class="p-btns">
                                                      <div class="d-flex align-items-center p-0">
                                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                         List</a>
                                                      </div>
                                                   </div>
                                                   <div class="trending-list mt-4">
                                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                         Moura, Boyd Holbrook, Joanna</span>
                                                      </div>
                                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                         Action, Thriller, Biography</span>
                                                      </div>
                                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                         Forceful</span>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="trending-data2" class="tab-pane fade ">
                                                <div
                                                   class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                   <a href="show-details.html" tabindex="0">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                      </div>
                                                   </a>
                                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                                      <span class="season_date ml-2">
                                                      2 Seasons
                                                      </span>
                                                      <span class="trending-year">Feb 2019</span>
                                                   </div>
                                                   <div class="iq-custom-select d-inline-block sea-epi">
                                                      <select name="cars" class="form-control season-select">
                                                         <option value="season1">Season 1</option>
                                                         <option value="season2">Season 2</option>
                                                         <option value="season3">Season 3</option>
                                                      </select>
                                                   </div>
                                                   <div class="episodes-contens mt-4">
                                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 1</a>
                                                                  <span class="text-primary">2.25 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body ">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 2</a>
                                                                  <span class="text-primary">3.23 m</span>
                                                               </div>
                                                               <p class="mb-0">
                                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 3</a>
                                                                  <span class="text-primary">2 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body ">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 4</a>
                                                                  <span class="text-primary">1.12 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 5</a>
                                                                  <span class="text-primary">2.54 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="trending-data3" class="tab-pane fade">
                                                <div
                                                   class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                   <a href="javascript:void(0);" tabindex="0">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                      </div>
                                                   </a>
                                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                   <div class="episodes-contens mt-4">
                                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="watch-video.html" target="_blank">
                                                               <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                                  <span class="text-primary">2.25 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="watch-video.html" target="_blank">
                                                               <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                                  <span class="text-primary">3.23 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="watch-video.html" target="_blank">
                                                               <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                                  <span class="text-primary">2 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="watch-video.html" target="_blank">
                                                               <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                                  <span class="text-primary">1.12 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="watch-video.html" target="_blank">
                                                               <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                                  <span class="text-primary">2.54 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="trending-data4" class="tab-pane fade">
                                                <div
                                                   class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                   <a href="javascript:void(0);" tabindex="0">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                      </div>
                                                   </a>
                                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                   <div class="episodes-contens mt-4">
                                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 1</a>
                                                                  <span class="text-primary">2.25 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 2</a>
                                                                  <span class="text-primary">3.23 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 3</a>
                                                                  <span class="text-primary">2 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 4</a>
                                                                  <span class="text-primary">1.12 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="e-item">
                                                            <div class="block-image position-relative">
                                                               <a href="show-details.html">
                                                               <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                               </a>
                                                               <div class="episode-play-info">
                                                                  <div class="episode-play">
                                                                     <a href="show-details.html" tabindex="0"><i
                                                                        class="ri-play-fill"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="episodes-description text-body">
                                                               <div class="d-flex align-items-center justify-content-between">
                                                                  <a href="show-details.html">Episode 5</a>
                                                                  <span class="text-primary">2.54 m</span>
                                                               </div>
                                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                               </p>
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
                              </li>
                              <li class="swiper-slide swiper-bg slider-big-img-2">
                                 <div class="position-relative" >
                                    <div class="trending-custom-tab">
                                       <div class="tab-title-info position-relative">
                                          <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data5"
                                                   role="tab" aria-selected="true">Overview</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data6" role="tab"
                                                   aria-selected="false">Episodes</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data7" role="tab"
                                                   aria-selected="false">Trailers</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data8" role="tab"
                                                   aria-selected="false">Similar Like This</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="trending-content tab-content">
                                          <div id="trending-data5" class="tab-pane fade active show ">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="res-logo">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit">
                                                      </div>
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                   <span class="badge badge-secondary p-3">18+</span>
                                                   <span class="ml-3">3 Seasons</span>
                                                   <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                   <a href="javascript:void(0);"><img src="{{asset('videoasset/images/trending/trending-label.png')}}"
                                                      class="img-fluid" alt=""></a>
                                                   <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                   industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                   <div class="d-flex align-items-center p-0">
                                                      <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                         class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                      <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                      List</a>
                                                   </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                   <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                      Moura, Boyd Holbrook, Joanna</span>
                                                   </div>
                                                   <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                      Action, Thriller, Biography</span>
                                                   </div>
                                                   <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                      Forceful</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data6" class="tab-pane fade ">
                                             <div
                                                class="trending-info  align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="show-details.html" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail mb-4">
                                                   <span class="season_date ml-2">
                                                   2 Seasons
                                                   </span>
                                                   <span class="trending-year">Feb 2019</span>
                                                </div>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                   <select name="cars" class="form-control season-select">
                                                      <option value="season1">Season 1</option>
                                                      <option value="season2">Season 2</option>
                                                      <option value="season3">Season 3</option>
                                                   </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">
                                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data7" class="tab-pane fade">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data8" class="tab-pane fade">
                                             <div
                                                class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="swiper-slide swiper-bg slider-big-img-3">
                                 <div class="position-relative" >
                                    <div class="trending-custom-tab">
                                       <div class="tab-title-info position-relative">
                                          <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data11"
                                                   role="tab" aria-selected="true">Overview</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data12" role="tab"
                                                   aria-selected="false">Episodes</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data13" role="tab"
                                                   aria-selected="false">Trailers</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data14" role="tab"
                                                   aria-selected="false">Similar Like This</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="trending-content tab-content">
                                          <div id="trending-data11" class="tab-pane fade active show ">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="res-logo">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit">
                                                      </div>
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                   <span class="badge badge-secondary p-3">18+</span>
                                                   <span class="ml-3">3 Seasons</span>
                                                   <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                   <a href="javascript:void(0);"><img src="{{asset('videoasset/images/trending/trending-label.png')}}"
                                                      class="img-fluid" alt=""></a>
                                                   <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                   industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                   <div class="d-flex align-items-center p-0">
                                                      <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                         class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                      <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                      List</a>
                                                   </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                   <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                      Moura, Boyd Holbrook, Joanna</span>
                                                   </div>
                                                   <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                      Action, Thriller, Biography</span>
                                                   </div>
                                                   <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                      Forceful</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data12" class="tab-pane fade ">
                                             <div
                                                class="trending-info  align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="show-details.html" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail mb-4">
                                                   <span class="season_date ml-2">
                                                   2 Seasons
                                                   </span>
                                                   <span class="trending-year">Feb 2019</span>
                                                </div>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                   <select name="cars" class="form-control season-select">
                                                      <option value="season1">Season 1</option>
                                                      <option value="season2">Season 2</option>
                                                      <option value="season3">Season 3</option>
                                                   </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">
                                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data13" class="tab-pane fade">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data14" class="tab-pane fade">
                                             <div
                                                class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="swiper-slide swiper-bg slider-big-img-4">
                                 <div class="position-relative" >
                                    <div class="trending-custom-tab">
                                       <div class="tab-title-info position-relative">
                                          <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data15"
                                                   role="tab" aria-selected="true">Overview</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data16" role="tab"
                                                   aria-selected="false">Episodes</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data17" role="tab"
                                                   aria-selected="false">Trailers</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data18" role="tab"
                                                   aria-selected="false">Similar Like This</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="trending-content tab-content">
                                          <div id="trending-data15" class="tab-pane fade active show ">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="res-logo">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit">
                                                      </div>
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                   <span class="badge badge-secondary p-3">18+</span>
                                                   <span class="ml-3">3 Seasons</span>
                                                   <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                   <a href="javascript:void(0);"><img src="{{asset('videoasset/images/trending/trending-label.png')}}"
                                                      class="img-fluid" alt=""></a>
                                                   <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                   industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                   <div class="d-flex align-items-center p-0">
                                                      <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                         class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                      <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                      List</a>
                                                   </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                   <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                      Moura, Boyd Holbrook, Joanna</span>
                                                   </div>
                                                   <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                      Action, Thriller, Biography</span>
                                                   </div>
                                                   <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                      Forceful</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data16" class="tab-pane fade ">
                                             <div
                                                class="trending-info  align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="show-details.html" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail mb-4">
                                                   <span class="season_date ml-2">
                                                   2 Seasons
                                                   </span>
                                                   <span class="trending-year">Feb 2019</span>
                                                </div>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                   <select name="cars" class="form-control season-select">
                                                      <option value="season1">Season 1</option>
                                                      <option value="season2">Season 2</option>
                                                      <option value="season3">Season 3</option>
                                                   </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">
                                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data17" class="tab-pane fade">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data18" class="tab-pane fade">
                                             <div
                                                class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="swiper-slide swiper-bg slider-big-img-5">
                                 <div class="position-relative" >
                                    <div class="trending-custom-tab">
                                       <div class="tab-title-info position-relative">
                                          <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data19"
                                                   role="tab" aria-selected="true">Overview</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data20" role="tab"
                                                   aria-selected="false">Episodes</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data21" role="tab"
                                                   aria-selected="false">Trailers</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data22" role="tab"
                                                   aria-selected="false">Similar Like This</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="trending-content tab-content">
                                          <div id="trending-data19" class="tab-pane fade active show ">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="res-logo">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit">
                                                      </div>
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                   <span class="badge badge-secondary p-3">18+</span>
                                                   <span class="ml-3">3 Seasons</span>
                                                   <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                   <a href="javascript:void(0);"><img src="{{asset('videoasset/images/trending/trending-label.png')}}"
                                                      class="img-fluid" alt=""></a>
                                                   <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                   industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                   <div class="d-flex align-items-center p-0">
                                                      <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                         class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                      <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                      List</a>
                                                   </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                   <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                      Moura, Boyd Holbrook, Joanna</span>
                                                   </div>
                                                   <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                      Action, Thriller, Biography</span>
                                                   </div>
                                                   <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                      Forceful</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data20" class="tab-pane fade ">
                                             <div
                                                class="trending-info  align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="show-details.html" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail mb-4">
                                                   <span class="season_date ml-2">
                                                   2 Seasons
                                                   </span>
                                                   <span class="trending-year">Feb 2019</span>
                                                </div>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                   <select name="cars" class="form-control season-select">
                                                      <option value="season1">Season 1</option>
                                                      <option value="season2">Season 2</option>
                                                      <option value="season3">Season 3</option>
                                                   </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">
                                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data21" class="tab-pane fade">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data22" class="tab-pane fade">
                                             <div
                                                class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="swiper-slide swiper-bg slider-big-img-6">
                                 <div class="position-relative" >
                                    <div class="trending-custom-tab">
                                       <div class="tab-title-info position-relative">
                                          <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill" href="#trending-data23"
                                                   role="tab" aria-selected="true">Overview</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data24" role="tab"
                                                   aria-selected="false">Episodes</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data25" role="tab"
                                                   aria-selected="false">Trailers</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#trending-data26" role="tab"
                                                   aria-selected="false">Similar Like This</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="trending-content tab-content">
                                          <div id="trending-data23" class="tab-pane fade active show ">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="res-logo">
                                                      <div class="channel-logo">
                                                         <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="streamit">
                                                      </div>
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail">
                                                   <span class="badge badge-secondary p-3">18+</span>
                                                   <span class="ml-3">3 Seasons</span>
                                                   <span class="trending-year">2020</span>
                                                </div>
                                                <div class="d-flex align-items-center series mb-4">
                                                   <a href="javascript:void(0);"><img src="{{asset('videoasset/images/trending/trending-label.png')}}"
                                                      class="img-fluid" alt=""></a>
                                                   <span class="text-gold ml-3">#2 in Series Today</span>
                                                </div>
                                                <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                   industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                </p>
                                                <div class="p-btns">
                                                   <div class="d-flex align-items-center p-0">
                                                      <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                                         class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                                      <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                                      List</a>
                                                   </div>
                                                </div>
                                                <div class="trending-list mt-4">
                                                   <div class="text-primary title">Starring: <span class="text-body">Wagner
                                                      Moura, Boyd Holbrook, Joanna</span>
                                                   </div>
                                                   <div class="text-primary title">Genres: <span class="text-body">Crime,
                                                      Action, Thriller, Biography</span>
                                                   </div>
                                                   <div class="text-primary title">This Is: <span class="text-body">Violent,
                                                      Forceful</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data24" class="tab-pane fade ">
                                             <div
                                                class="trending-info  align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="show-details.html" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="d-flex align-items-center text-white text-detail mb-4">
                                                   <span class="season_date ml-2">
                                                   2 Seasons
                                                   </span>
                                                   <span class="trending-year">Feb 2019</span>
                                                </div>
                                                <div class="iq-custom-select d-inline-block sea-epi">
                                                   <select name="cars" class="form-control season-select">
                                                      <option value="season1">Season 1</option>
                                                      <option value="season2">Season 2</option>
                                                      <option value="season3">Season 3</option>
                                                   </select>
                                                </div>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">
                                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data25" class="tab-pane fade">
                                             <div class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="watch-video.html" target="_blank">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="trending-data26" class="tab-pane fade">
                                             <div
                                                class=" trending-info align-items-center w-100 animated fadeInUp iq-ltr-direction">
                                                <a href="javascript:void(0);" tabindex="0">
                                                   <div class="channel-logo">
                                                      <img src="{{asset('videoasset/images/logo.png')}}" class="c-logo" alt="stramit">
                                                   </div>
                                                </a>
                                                <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                                <div class="episodes-contens mt-4">
                                                   <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0 iq-rtl-direction">
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 1</a>
                                                               <span class="text-primary">2.25 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 2</a>
                                                               <span class="text-primary">3.23 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 3</a>
                                                               <span class="text-primary">2 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 4</a>
                                                               <span class="text-primary">1.12 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="e-item">
                                                         <div class="block-image position-relative">
                                                            <a href="show-details.html">
                                                            <img src="{{asset('videoasset/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                            <div class="episode-play-info">
                                                               <div class="episode-play">
                                                                  <a href="show-details.html" tabindex="0"><i
                                                                     class="ri-play-fill"></i></a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="episodes-description text-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                               <a href="show-details.html">Episode 5</a>
                                                               <span class="text-primary">2.54 m</span>
                                                            </div>
                                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="swiper-arrow swiper-button-next"></div>
                        <div class="swiper-arrow swiper-button-prev"></div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="iq-tvthrillers" class="s-margin">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Recommended For You</h4>
                        <a href="view-all.html" class="text-primary iq-view-all">View All</a>
                     </div>
                  </div>
               </div>
               <!-- Swiper -->
               <div class="favourite-slider">
                  <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                     <ul class="swiper-wrapper p-0 m-0">
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/01.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/02.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/04.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Logan</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 22mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/01.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Shadow Warrior</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 50mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">2+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/03.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">X-Men</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">1hr : 45mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">25+</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="swiper-slide slide-item">
                           <div class="block-images position-relative ">
                              <div class="img-box">
                                 <img src="{{asset('videoasset/images/video/02.jpg')}}" loading="lazy" class="img-fluid" alt="">
                              </div>
                              <div class="block-description">
                                 <h6 class="iq-title"><a href="show-detail.html">Narnia</a></h6>
                                 <div class="movie-time d-flex align-items-center my-2">
                                    <span class="text-white">3hr : 10mins</span>
                                 </div>
                                 <div class="hover-buttons">
                                    <a href="show-detail.html" role="button" class="btn btn-hover">
                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                    </a>
                                 </div>
                              </div>
                              <div class="block-social-info">
                                 <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                class="ri-twitter-fill"></i></a>
                                             <a href="#"
                                                data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                class="share-ico iq-copy-link" tabindex="0"><i
                                                class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <span><i class="ri-heart-fill"></i></span>
                                       <span class="count-box">0</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <footer id="contact" class="footer-one iq-bg-dark">
         <!-- Address -->
         <div class="footer-top">
            <div class="container-fluid">
               <div class="row footer-standard">
                  <div class="col-lg-6">
                     <div class="widget text-left">
                        <div class="menu-footer-link-1-container">
                           <ul id="menu-footer-link-1" class="menu p-0">
                              <li id="menu-item-7314"
                                 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7314">
                                 <a href="#">Terms Of Use</a>
                              </li>
                              <li id="menu-item-7316"
                                 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                 <a href="privacy-policy.html">Privacy-Policy</a>
                              </li>
                              <li id="menu-item-701"
                                 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-701">
                                 <a href="faq.html">FAQ</a>
                              </li>
                              <li id="menu-item-7118"
                                 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                 <a href="watch-video.html">Watch List</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="widget text-left">
                        <div class="textwidget">
                           <p><small>© 2021 STREAMIT. All Rights Reserved. All videos and shows on this platform are
                              trademarks of, and all related images and content are the property of, Streamit Inc.
                              Duplication and copy of this is strictly prohibited. All rights reserved.</small>
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                     <h6 class="footer-link-title">
                        Follow Us :
                     </h6>
                     <ul class="info-share">
                        <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-github"></i></a></li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                     <div class="widget text-left">
                        <div class="textwidget">
                           <h6 class="footer-link-title">Streamit App</h6>
                           <div class="d-flex align-items-center">
                              <a class="app-image" href="#">
                              <img src="{{asset('videoasset/images/footer/01.jpg')}}" loading="lazy" alt="play-store">
                              </a><br>
                              <a class="ml-3 app-image" href="#"><img src="{{asset('videoasset/images/footer/02.jpg')}}" loading="lazy" alt="app-store"></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Address END -->
      </footer>
      <div class="rtl-box">
         <button type="button" id="flip" class="btn btn-light rtl-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">
               <path fill-rule="evenodd"
                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                  clip-rule="evenodd" />
            </svg>
         </button>
         <div class="rtl-panel" id="panel">
            <ul class="modes">
               <li class="dir-btn" data-mode="rtl" data-active="false" data-value="ltr"><a href="#">LTR</a></li>
               <li class="dir-btn" data-mode="rtl" data-active="true" data-value="rtl"><a href="#">RTL</a></li>
            </ul>
         </div>
      </div>
      <!-- MainContent End-->
      <!-- back-to-top -->
      <div id="back-to-top">
         <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
      </div>