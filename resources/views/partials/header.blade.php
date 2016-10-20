<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('product.index')}}">Franklin Baker <i class="fa fa-birthday-cake" aria-hidden="true"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{route('product.shoppingCart')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
              Shopping cart
            <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty:''}}</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          @if(Auth::check())
          <i class="fa fa-user" aria-hidden="true"></i> 
                                                User Account 
          <span class="caret"></span></a>
            @else
          <i class="fa fa-users" aria-hidden="true"></i> User Management <span class="caret"></span></a>

          @endif
          <ul class="dropdown-menu">
            @if(Auth::check())
                 <li><a href="{{ route('user.profile')}}"><i class="fa fa-book" aria-hidden="true"></i> User Profile</a></li>
               <li role="separator" class="divider">
               <li><a href="{{ route('user.logout')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Log Out</a></li>
                @else
            <li><a href="{{ route('user.signUp')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up!</a></li>
               <li role="separator" class="divider">
            <li><a href="{{ route('user.signIn')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a></li> 
            @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>