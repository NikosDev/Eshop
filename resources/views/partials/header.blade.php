<nav class="navbar navbar-toggleable-md navbar-light">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{URL::to('/')}}">MyShop</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{URL::to('/shopping-cart/')}}"> Shopping Cart <span class="badge badge-pill badge-default">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
      </li>
    </ul>
  </div>
</nav>
