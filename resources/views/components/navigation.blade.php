<link rel="stylesheet" href="{{asset('css/navigation.css')}}">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container-fluid no-gutters">
    <a class="navbar-brand" href="{{ url('/') }}"> {{Auth::user()->company_name}}</a>
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


    <div class="dropdown show ml-auto">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{Auth::user()->name}}
        </a>


        <div class="dropdown-menu dropdown-menu-right nav-dropdown-bg" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item font-lato text-color-white" href="{{url('/user/profile',[Auth::user()->id])}}">Profile</a>
        <a class="dropdown-item font-lato text-color-white" href="{{url('/user/change_password')}}">Change Password</a>
          <a class="dropdown-item font-lato text-color-white" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
        </div>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    </div>






</nav>
