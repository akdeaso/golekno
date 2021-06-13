@auth()
    @include('user.layouts.navbars.navs.auth')
@endauth

@guest()
    @include('user.layouts.navbars.navs.guest')
@endguest
