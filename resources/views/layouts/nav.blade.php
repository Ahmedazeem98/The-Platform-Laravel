<nav class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
    <h4 class="my-0 mr-md-auto font-weight-normal text-white"> <a class="nav-link text-white" href="{{route('home')}}"> The Platform</a></h4>
    <ul style="font-size: 17px" class="nav justify-content-end">
      <li class="nav-item">
        <div class="dropdown">
          <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          
          <div class="dropdown-menu">
            @foreach($categories as $category)
              <a class="dropdown-item" href="{{route('front.category', ['id' => $category->id])}}">{{$category->name}}</a>
            @endforeach
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Skills
          </a>
          <div class="dropdown-menu">
            @foreach($skills as $skill)
              <a class="dropdown-item" href="{{route('front.skill', ['id' => $skill->id])}}">{{$skill->name}}</a>
            @endforeach
          </div>
        </div>
      </li>
    </li>
    <li class="nav-item">
      <div class="dropdown">
        <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tags
        </a>
        <div class="dropdown-menu">
          @foreach($tags as $tag)
            <a class="dropdown-item" href="{{route('front.tag', ['id' => $tag->id])}}">{{$tag->name}}</a>
          @endforeach
        </div>
      </div>
    </li>
      @if(!auth()->user())
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('/login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('/register')}}">Register</a>
        </li>
      @endif
      @if(auth()->user())
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if(auth()->user() && auth()->user()->group == 'admin')
            <a class="dropdown-item" href="{{route('admin.home')}}">Admin mode</a>
          @endif
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
         
      @endif
      <li class="nav-item dropdown">
      <div style="display: none;">
        <form class="form-inline mt-2 mt-md-0" action="{{route('home')}}">
          <input name="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      <a href="" onclick="$(this).prev('div').fadeIn(1000),$(this).css({'display':'none'});return false;" class="btn btn-outline-primary my-2 my-sm-0 text-white">Serach</a>
      </li>
    </ul>
  </nav>
