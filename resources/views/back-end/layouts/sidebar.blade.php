<div style="font-size: 16px" class="row">
    <nav style="margin-top: 76px" class="col-md-2 d-none d-md-block bg-light sidebar">
        <div style="margin-top: -30px">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}" href="{{route('admin.home')}}">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{route('users.index')}}">
                        <span data-feather="user"></span>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}" href="{{route('categories.index')}}">
                        <span data-feather="layers"></span>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/skills*') ? 'active' : '' }}" href="{{route('skills.index')}}">
                        <span data-feather="sliders"></span>
                        Skills
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/tags*') ? 'active' : '' }}" href="{{route('tags.index')}}">
                        <span data-feather="tag"></span>
                        Tags
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/pages*') ? 'active' : '' }}" href="{{route('pages.index')}}">
                        <span data-feather="file"></span>
                        Pages
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/videos*') ? 'active' : '' }}" href="{{route('videos.index')}}">
                        <span data-feather="film"></span>
                        Videos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/messages*') ? 'active' : '' }}" href="{{route('messages.index')}}">
                        <span data-feather="message-circle"></span>
                        Messages
                    </a>
                </li>
                
                
            </ul>
        </div>
    </nav>