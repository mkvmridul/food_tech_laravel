
<nav class="bg-light" id="navbar">
    <h2 class="p-3"><a class="text-secondary" href="{{route('welcome')}}">Food<span class="text-primary" >Shala</span> </a></h2>
    <a href="{{route('menus')}}" class="float-right btn btn-outline-primary mx-2" >Meals</a>&nbsp;
    @if(Auth::guard('web')->check())
        <a href="{{route('user.order')}}" class="float-right btn btn-outline-primary mx-2" >My Orders</a>
        &nbsp;
    @endif
    @if(Auth::guard('restaurant')->check())
        <a href="{{route('restaurant.order')}}" class="float-right btn btn-outline-primary" >My Jobs</a>
    @endif
    @if(!Auth::guard('web')->check() || !Auth::guard('restaurant')->check())
    <div class="dropdown float-right pr-5">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="registerDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Register
        </button>
        <div class="dropdown-menu" aria-labelledby="registerDropDown">
            @if(!Auth::guard('web')->check())
                <a class="dropdown-item" href="{{route('register')}}">Customer</a>
            @endif
            @if(!Auth::guard('restaurant')->check())
                <a class="dropdown-item" href="{{route('restaurant.registration.form')}}">Restaurant</a>
            @endif
            
        </div>
    </div>
    @endif

    <div class="dropdown float-right px-2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="loginDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(!Auth::guard('web')->check() || !Auth::guard('restaurant')->check())
                    Login
                @else
                    Logout
                @endif
        </button>
        <div class="dropdown-menu" aria-labelledby="loginDropDown">
                @if(!Auth::guard('web')->check())
                    <a class="dropdown-item" href="{{route('login')}}">Customer</a>
                @else
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout as Customer</a>
                @endif
                @if(!Auth::guard('restaurant')->check())
                    <a class="dropdown-item" href="{{route('restaurant.login.form')}}">Restaurant</a>
                @else
                    <a class="dropdown-item" href="{{route('restaurant.logout')}}" onclick="event.preventDefault();
                    document.getElementById('restaurant-logout-form').submit();">Logout as Restaurant</a>
                @endif
            
        </div>
    </div>

</nav>

<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    @csrf   
</form>

<form id="restaurant-logout-form" action="{{route('restaurant.logout')}}" method="get" style="display: none;">
    @csrf   
</form>