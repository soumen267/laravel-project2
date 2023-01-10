<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id="app"><a class="{{ Route::is('home') ? 'active' : ''}}" href="{{ route('home') }}">Home</a></li>
                    <li id="app"><a class="{{ Route::is('category') ? 'active' : '' }}" href="{{ route('category') }}">Category</a></li>
                    <li id="app"><a class="{{ Route::is('shop') ? 'active' : ''}}" href="{{ route('shop') }}">Shop page</a></li>
                    <li id="app"><a class="{{ Route::is('cart') ? 'active' : ''}}" href="{{ route('cart') }}">Cart</a></li>
                    <li id="app"><a class="##" href="checkout">Checkout</a></li>
                    <li id="app"><a href="javascript:void(0);">Others</a></li>
                    <li id="app"><a href="javascript:void(0);">Contact</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div>