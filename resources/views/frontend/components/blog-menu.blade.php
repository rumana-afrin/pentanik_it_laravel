<div class="">
    {{-- <li class="sidebar-item border-bottom border-bottom">
        <a class="" href="">Seo</a>
    </li>
    <li class="sidebar-item border-bottom">
        <a href="" class="">Degital Marketing</a>
    </li>
    <li class="sidebar-item border-bottom">
        <a href=""
            class="">Web Development</a>
    </li> --}}
    {{-- @foreach ($blogs as $blog)
        <li class="sidebar-item border-bottom">
            <a href="{{ route('blog-category', $blog->slug) }}"
                class="{{ request()->routeIs('blog/' . $blog->slug) ? 'active' : '' }}">{{ $blog->name }}</a>
        </li>
    @endforeach --}}


    {{-- <li class="sidebar-item border-bottom">
        <a href="{{ route('privacy-policy') }}"
            class="{{ request()->routeIs('privacy-policy') ? 'active' : '' }}">Privacy Policy</a>
    </li>
    <li class="sidebar-item border-bottom">
        <a href="{{ route('size') }}" class="{{ request()->routeIs('size') ? 'active' : '' }}">Size Guide</a>
    </li>
    <li class="sidebar-item border-bottom">
        <a href="{{ route('loyality-program') }}"
            class="{{ request()->routeIs('loyality-program') ? 'active' : '' }}">Loyality Program</a>
    </li>
    <li class="sidebar-item border-bottom">
        <a href="{{ route('store-location') }}"
            class="{{ request()->routeIs('store-location') ? 'active' : '' }}">Store Location</a>
    </li> --}}

</div>


@push('style')
    <style>
        a.active {
            color: #0354bd;
            font-weight: bold;
        }
    </style>
@endpush
