<nav class="navMenu">
            <a href="/"><img class="logo" src="../images/akla.png" alt="Akla Logo "> </a>
             <a href="#">Home</a>
            <a href="{{url('menu')}}">Meals</a>
            <a href="#">Today's Offers</a>
            <a href="#footer">Contact Us</a>
            <a href="#about-section">About</a>
            <div class="dot"></div>
            
</nav>
<div class="login ls-auto">
             @if (Route::has('login'))
                @auth   

                    @if(Auth::user()->is_admin)
                   <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="/profile">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        @endif
                        
                @else
                    <a href="{{ route('login') }}"> <span class="icon-sign-in"></span> Log in</a>

                    @if (Route::has('register'))
                         <a href="{{ route('register') }}" > <span class="icon-register"></span> Register</a>
                         
                    @endif
                @endauth
             @endif
            </div>


      <!-- <a href="#">Home</a>
      <a href="#">Blog</a>
      <a href="#">Work</a>
      <a href="#">About</a>
  -->
