{{-- <div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user"></i> Signin</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-user"></i> Signup</a></li>
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                <span class="value">##</span>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="logout.php"><i class="fa fa-user"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="assets/img/logo.png"></a></h1>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="shopping-item">
                    @if(session('cart'))
                    <a href="{{ route('cart') }}">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo (count(session('cart')));?></span></a>
                    @else
                    <a href="javacript:void(0);">Cart - <span class="cart-amunt">$0</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->
<!-- Modal Login-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Login</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="loginForm">
                <span id="errorMsg" class="text-center text-danger"></span>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your emall">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnLogin" name="btnLogin" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Modal Register -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Register</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="" method="post" id="registerForm">
            <span id="errorMsg1" class="text-center text-danger"></span>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="regname" id="regname" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="regemail" id="regemail" placeholder="Enter your emall">
                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="regpassword" id="regpassword" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="cnfpassword" id="cnfpassword" placeholder="Enter confirm password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnRegister" name="btnRegister" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>