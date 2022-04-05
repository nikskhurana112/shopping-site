<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="{{route("/")}}"> <b>Shopping Site</b><span> Flipkart</span> </a>
  
    <!-- Links -->
    <ul class="navbar-nav">
    
  
      <!-- Dropdown -->
      @if(Auth::check() == false)
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Log-In
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("user.login")}}">Login User</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Register
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("user.register")}}">Register User</a>
        </div>
      </li>

      @elseif(Auth::check() == true && Auth::user()->is_admin)
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
          Add 
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("admin.product.add")}}">Add Products</a>
          <a class="dropdown-item" href="{{route("admin.product.upload_data")}}">Upload Products</a>
        </div>
  
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
          Download 
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("admin.product.download_data")}}">Download Excel Sheet of Products</a>
        </div>
  
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
          Update
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("admin.product.products_list")}}">Update Existing Produts</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{route("admin.order.orders_list")}}" id="navbardrop" data-toggle="dropdown">
          Orders 
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("admin.order.orders_list")}}">Orders List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Log-Out
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("user.logout")}}">Logout User</a>
        </div>
      </li>


      @else

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Log-Out
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route("user.logout")}}">Logout User</a>
        </div>
      </li>

      @endif 
      
    </ul>
  </nav>