 <header>
     <nav>
         <div class="container-fluid p-0 m-0">
             <div class="navbar-container d-flex justify-content-center align-items-center">
                 <div class="navbar p-0 m-0">
                     <div class="logo text-light fs-4">
                         <div class="hem-menu">
                             <a class="mobile-menu-icon" href="javascript:void(0)" onclick="openNav()"><i
                                     class="fa-solid fa-bars"></i></a>
                         </div>
                         <a href="{{url('/')}}"><img class="logo-image" src="{{ getimage(getOption('header_logo')) }}" alt="" width="150"
                                 height="60"></a>
                         {{-- <a href="{{url('/')}}"><img class="logo-image" src="{{asset('assets/frontend/Pentanik-IT-Logo.png')}}" alt="" width="150"
                                 height="60"></a> --}}
                     </div>
                     <div class="menus p-0 m-0">
                         <!--start category menu -->
                         <ul class="category-menu m-0 p-0">
                             <li class="menus-item">
                                 <a href="{{route('header-page', ['slug' => 'about-us'])}}">About</a>
                             </li>
                             <li>
                                 <a href="{{route('header-page', ['slug' => 'portfolio'])}}">Portfolio</a>
                             </li>
                            
                             <li>
                                 <a href="{{route('header-page', ['slug' => 'team-member'])}}">Team</a>
                             </li>
                             <li>
                                 <a href="{{route('header-page', ['slug' => 'blog'])}}">Blog</a>
                             </li>
                             <li class="dropdown">
                                 <div class="d-flex dropdownbtn">
                                     <a href="javascript:void(0)">Service</a><i
                                         class="fa-solid fa-chevron-down dropdown-icon"></i>
                                 </div>
                                 <ul class="drop-content p-0 m-0">
                                     <li>
                                         <a href="">Digital Marketing</a>
                                     </li>
                                     <li>
                                         <a href="">Social Media Marketing</a>
                                     </li>
                                     <li>
                                         <a href="">SEO</a>
                                     </li>
                                     <li>
                                         <a href="">Web Design</a>
                                     </li>
                                     <li>
                                         <a href="">UI/UX Design</a>
                                     </li>
                                     <li>
                                         <a href="">Ecommerce Design</a>
                                     </li>
                                     <li>
                                         <a href="">Business Development</a>
                                     </li>
                                 </ul>
                             </li>
                         </ul>
                         <!--end category menu -->
                         <!--start page menu -->
                         <ul class="page-menus p-0 ms-1">
                             <!-- <li class="menus-item">
                                    <a href="">link1</a>
                                </li>
                                <li>
                                    <a href="">link2</a>
                                </li>
                                <li>
                                    <a href="">link3</a>
                                </li> -->
                         </ul>
                     </div>
                     <!--end page menu -->
                     <div class="right-nav">
                         <a href="tel:01868366628"><i class="fa-solid fa-phone-volume pe-2"></i>{{ getOption('contact_phone') }}</a>
                         <i class="fa-solid fa-magnifying-glass header-icon" onclick="searchbar()"></i>
                         <div class="search-bar">
                             <input class="search" type="search" placeholder="search...">
                         </div>
                         <div class="ms-3">
                             <a class="text-decoration-none text-light" href="{{route('login')}}">
                                 <i class="fa-solid fa-user"></i>&nbsp login</a>
                         </div>
                     </div>

                     <!--start mobile menu -->
                     <div id="mySidebar" class="sidebar">
                         <div class="mlogo mb-5">
                             <a href="index.html">
                                 <img class="mlogo-image ms-5" src="{{ getimage(getOption('footer_logo')) }}" alt="" width="150"
                                     height="60">
                             </a>
                         </div>
                         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                         <li class="navbar-item">
                             <a href="{{route('header-page', ['slug' => 'about-us'])}}">About</a>
                         </li>
                         <li class="navbar-item">
                             <a href="{{route('header-page', ['slug' => 'portfolio'])}}">PortFolio</a>
                         </li>
                         <li class="navbar-item">
                             <a href="{{route('header-page', ['slug' => 'team-member'])}}">Team</a>
                         </li>
                         <li class="dropdown-container">
                             <a href="#" class="dropdown-togglee d-flex justify-content-between align-items-center">
                                 <span class="">Services</span>
                                 <i class="fa-solid fa-chevron-down mobile-drop-icon"></i>
                             </a>
                             <ul class="dropdown-menus p-0 m-0">
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">Digital Marketing</a>
                                 </li>
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">Social Media Marketing</a>
                                 </li>
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">SEO</a>
                                 </li>
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">Web Design</a>
                                 </li>
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">UI/UX Design</a>
                                 </li>
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">Ecommerce Design</a>
                                 </li>
                                 <li class="mdropdown-item">
                                     <a class="nav-links dropdown-link" href="">Business Development</a>
                                 </li>
                             </ul>
                         </li>
                         <li class="navbar-item">
                             <a href="{{route('header-page', ['slug' => 'blog'])}}">Blog</a>
                         </li>

                     </div>
                 </div>
             </div>
         </div>
     </nav>

 </header>