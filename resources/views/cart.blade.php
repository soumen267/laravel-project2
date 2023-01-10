@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop') }}">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    @if(session('cart'))
    @php
    $total_quantity = 0;
    $total_price = 0;
    @endphp
    <div class="container-fluid">
        <form method="post" action="{{ route('checkout') }}">
        @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach (session('cart') as $key => $item)
                        <tr>
                            <td class="align-middle"><img src="{{ asset('storage/'.$item['image']) }}" alt="" style="width: 50px;">{{$item['name']}}</td>
                            <td class="align-middle">${{ number_format($item['price'], 2) }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto buttons_added" style="width: 100px;">
                                    {{-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item['qty'] }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div> --}}
                                    <input type="number" size="4" class="input-text qty-text" title="Qty" data-id="{{ $key }}" value="{{ $item['qty'] }}" min="1" max="5" step="1">
                                </div>
                            </td>
                            @php
                            $total = $item['qty'] * $item['price'];
                            @endphp
                            <td class="align-middle">${{ number_format($total, 2) }}</td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-danger remove-from-cart remove" data-id="{{ $key }}"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        @php
                        $total_quantity += $item["qty"];
                        $total_price += ($item["price"]*$item["qty"]);
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3" style="margin-top: 10px;"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${{ number_format($total_price,2) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10.00</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            @php
                                $tot = $total_price + 10;
                            @endphp
                            <h5>${{ number_format($tot, 2) }}</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    @else
    <div class="container-fluid mt-100">
        <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <!-- <div class="card-header">
                   <h5>Cart</h5>
                   </div> -->
                   <div class="card-body cart">
                           <div class="col-sm-12 empty-cart-cls text-center">
                               <img src="{{ asset('assets/img/dCdflKN.png') }}" width="130" height="130" class="img-fluid mb-4 mr-3">
                               <h3><strong>Your Cart is Empty</strong></h3>
                               <h4>Add something to make me happy :)</h4>
                               <a href="{{ route('shop') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                           </div>
                   </div>
               </div>
           </div>
        </div>
       
    </div>
    @endif
    <!-- Cart End -->
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $(".qty-text").on('change', function(e){
            e.preventDefault();
            var ele = $(this);
            var qty = ele.parents("tr").find(".qty-text").val();
            var id = ele.attr("data-id");
            $.ajax({
                type: "patch",
                url: "{{ route('update.cart') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    qty: qty
                },
                //dataType: "json",
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(document).on('click', '.remove', function(e){
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type: "delete",
                url: "{{ route('cart.delete') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                //dataType: "json",
                success: function (response) {
                    window.location.reload();
                }
            });
        })
    });
</script>
@endpush