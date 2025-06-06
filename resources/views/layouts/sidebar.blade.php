<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/clear-all') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        
<!-- start App Setting Nav -->
        <li class="nav-heading">App Setting</li>

        <li class="nav-item">
            <a class="nav-link {{ @$settingShowClass ? '' : 'collapsed' }}" href="{{route('admin.app-setting')}}">
                <i class="bi bi-person"></i>
                <span>Setting</span>
            </a>
        </li>
        </li><!-- End Dashboard Nav -->

        </li><!-- start user Nav -->
        <li class="nav-item">
            <a class="nav-link {{ @$userShowClass ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse  {{ @$userShowClass }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.all-user') }}" class="{{ @$allUserActiveClass }}"><i class="bi bi-circle"></i><span>All Users</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.create-user') }}"  class="{{ @$userActiveClass }}"><i class="bi bi-circle"></i><span>Add User</span></a>
                </li>
            </ul>
        </li><!-- End user Nav -->

        </li><!-- start service category Nav -->
        <li class="nav-item">
            <a class="nav-link {{ @$serviceCategoryShowClass ? '' : 'collapsed' }}" data-bs-target="#digitalservices-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>digital Services</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="digitalservices-nav" class="nav-content collapse  {{ @$serviceCategoryShowClass }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.all-service-category') }}" class="{{ @$allSrviceCategoryActiveClass }}"><i class="bi bi-circle"></i><span>All Service Categories</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.create-service-category') }}"  class="{{ @$createSrviceCategoryActiveClass }}"><i class="bi bi-circle"></i><span>Add Service Category</span></a>
                </li>
            </ul>
        </li><!-- End service category Nav -->

        </li><!-- start work process Nav -->
        <li class="nav-item">
            <a class="nav-link {{ @$workProcessShowClass ? '' : 'collapsed' }}" data-bs-target="#workprocess-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Work Process</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="workprocess-nav" class="nav-content collapse  {{ @$workProcessShowClass }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.all-work-process') }}" class="{{ @$allworkProcessActiveClass }}"><i class="bi bi-circle"></i><span>All Work Process</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.create-work-process') }}"  class="{{ @$createworkProcessActiveClass }}"><i class="bi bi-circle"></i><span>Add Work Process</span></a>
                </li>
            </ul>
        </li><!-- End work process Nav -->

        </li><!-- start work process Nav -->
        <li class="nav-item">
            <a class="nav-link {{ @$teamShowClass ? '' : 'collapsed' }}" data-bs-target="#team-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Team</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="team-nav" class="nav-content collapse  {{ @$teamShowClass }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.all-team') }}" class="{{ @$allteamActiveClass }}"><i class="bi bi-circle"></i><span>All Team</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.create-team') }}"  class="{{ @$createteamActiveClass }}"><i class="bi bi-circle"></i><span>Add Team</span></a>
                </li>
            </ul>
        </li><!-- End work process Nav -->

        </li><!-- start work process Nav -->
        <li class="nav-item">
            <a class="nav-link {{ @$blogShowClass ? '' : 'collapsed' }}" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blog-nav" class="nav-content collapse  {{ @$blogShowClass }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.all-blog') }}" class="{{ @$allblogActiveClass }}"><i class="bi bi-circle"></i><span>All Blog</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.create-blog') }}"  class="{{ @$createblogActiveClass }}"><i class="bi bi-circle"></i><span>Add Blog</span></a>
                </li>
            </ul>
        </li><!-- End work process Nav -->



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->


    </ul>

</aside>
