 <footer>
     <div class="footer d-flex justify-content-center align-items-center">
         <div class="footer-logo">
             <div class="footerlogo">
                 <img src="{{ getimage(getOption('footer_logo')) }}" alt="">
             </div>
         </div>
         <div class="footer-menu">
             <ul class="d-flex justify-content-center align-items-center list-unstyled flex-wrap menu-item m-0">
                 @foreach ($pages as $page)
                     <li class="p-2"><a class="text-decoration-underline text-light"
                             href="{{ route('aditional-page', ['slug' => $page->slug]) }}">{{ $page->name }}</a></li>
                 @endforeach
                 {{-- <li class="p-2"><a class="text-decoration-underline text-light"
                            href="{{route('aditional-page')}}">Privacy</a></li>
                    <li class="p-2"><a class="text-decoration-underline text-light" href="{{route('aditional-page')}}">Terms of
                            use</a></li>
                    <li class="p-2"><a class="text-decoration-underline text-light" href="{{route('aditional-page')}}">Legal
                            disclosure</a></li>
                    <li class="p-2"><a class="text-decoration-underline text-light"
                            href="{{route('aditional-page')}}">Copyright</a></li>
                    <li class="p-2"><a class="text-decoration-underline text-light" href="{{route('aditional-page')}}">FAQ</a>
                    </li>
                    <li class="p-2"><a class="text-decoration-underline text-light" href="{{route('team')}}">Team Member</a>
                    </li> --}}
                   

             </ul>
         </div>
         <div class="footer-office-address">
             <div class="offce-address text-light text-end">
                 <p class="p-0 m-0"><span>Corporate Office:</span>{{ getOption('app_address') }}</p>
                 <p class="p-0 m-0"><span>Email:</span>{{ getOption('app_gmail') }}</p>
                 <p class="p-0 m-0"><span>Phone:</span>+{{ getOption('app_phone') }}</p>
             </div>
         </div>

     </div>

     <div class="bottom-footer">
         <div class="copyright text-center">
             <p class="p-0 m-0 fw-bold fs-6">Copyright © 2025 <span class="com-name">Pentanik It</span>. All rights
                 reserved.</p>
             <p class="p-0 m-0 fs-6">Designed & Developed By <span class="com-name">Pentanik It</span></p>
         </div>
     </div>
 </footer>
