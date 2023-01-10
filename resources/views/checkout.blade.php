@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop') }}">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    @if(Session::has('success'))
    {{Session::get('success')}}
    @endif
    @if(Session::has('error'))
        {{Session::get('error')}}
    @endif

    <!-- Checkout Start -->
    <form class="checkout" method="post" name="checkout" action="{{ route('checkout.store') }}">
    @csrf
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="billing_first_name" placeholder="John">
                            @error('billing_first_name')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="billing_last_name" placeholder="Doe">
                            @error('billing_last_name')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="billing_email" placeholder="example@email.com">
                            @error('billing_email')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="billing_phone" placeholder="+123 456 789">
                            @error('billing_phone')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="billing_address_1" placeholder="123 Street">
                            @error('billing_address_1')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" name="billing_address_2" placeholder="123 Street">
                            @error('billing_address_2')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="billing_country">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                            @error('billing_country')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="billing_city" placeholder="New York">
                            @error('billing_city')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="billing_state" placeholder="New York">
                            @error('billing_state')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" name="billing_postcode" placeholder="123">
                            @error('billing_postcode')
	                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto" name="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="shipping_first_name" placeholder="John">
                                @error('shipping_first_name')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="shipping_last_name" placeholder="Doe">
                                @error('shipping_last_name')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="shipping_email" placeholder="example@email.com">
                                @error('shipping_email')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="shipping_phone" placeholder="+123 456 789">
                                @error('shipping_phone')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" name="shipping_address_1" placeholder="123 Street">
                                @error('shipping_address_1')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" name="shipping_address_2" placeholder="123 Street">
                                @error('shipping_address_2')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select" name="shipping_country">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                                @error('shipping_country')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" name="shipping_city" placeholder="New York">
                                @error('shipping_city')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" name="shipping_state" placeholder="New York">
                                @error('shipping_state')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" name="shipping_postcode" placeholder="123">
                                @error('shipping_postcode')
	                            <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @php
                        $total_quantity = 0;
                        $total_price = 0;
                        @endphp
                        @foreach (session('cart') as $key => $item)
                        <div class="d-flex justify-content-between">
                            <p>{{ $item['name'] }}</p>
                            @php
                            $total = $item['qty'] * $item['price'];
                            @endphp
                            <p>${{ number_format($total, 2) }}</p>
                        </div>
                        @php
                        $total_quantity += $item["qty"];
                        $total_price += ($item["price"]*$item["qty"]);
                        @endphp
                        @endforeach
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${{ number_format($total_price,2) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    @php
                    $tot = $total_price + 10;
                    @endphp
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ number_format($tot, 2) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="card">
                                <label class="custom-control-label" for="card">Card</label>
                            </div>
                        </div>
                        <div class="row" id="card-details">
                            <div class="col-md-6 form-group">
                            <label for="cc-expiration">Number</label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="">
                            @error('number')
                            <p>{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="col-md-6 form-group">
                            <label for="cc-expiration">Month</label>
                            <input type="text" class="form-control" name="exp_month" id="exp_month" placeholder="">
                            @error('exp_month')
                            <p>{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="col-md-6 form-group">
                            <label for="cc-expiration">Year</label>
                            <input type="text" class="form-control" name="exp_year" id="exp_year" placeholder="">
                            @error('exp_year')
                            <p>{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="col-md-6 form-group">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" name="cvc" id="cvc" placeholder="">
                            @error('cvc')
                            <p>{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Checkout End -->
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $('#card-details').hide();
        $('input[name="payment"]:radio').change(function(){
            if($('#card').is(":checked")){
                $('#card-details').show();
            }else if($('#card').not(":checked")){
                $('#card-details').hide();
            }
        })
    })
</script>
@endpush