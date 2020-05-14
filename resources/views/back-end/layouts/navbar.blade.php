<nav class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
  <h4 class="my-0 mr-md-auto font-weight-normal text-white"> <a class="nav-link text-white" href="{{route('home')}}"> The Platform</a></h4>
  <ul style="font-size: 17px" class="nav justify-content-end">
    
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
  </ul>
</nav>
