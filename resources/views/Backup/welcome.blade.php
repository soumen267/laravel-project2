@extends('layouts.app')
@section('content')
<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            @foreach ($slider as $item)
            <li>
                <img src="{{asset('storage/'.$item->image) }}" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        {{ $item->title }}
                        {{-- iPhone <span class="primary">6 <strong>Plus</strong></span> --}}
                    </h2>
                    <h4 class="caption subtitle">{{ $item->subtitle }}</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            @endforeach
            {{-- <li><img src="{{asset('assets/img/h4-slide2.png') }}" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        by one, get one <span class="primary">50% <strong>off</strong></span>
                    </h2>
                    <h4 class="caption subtitle">school supplies & backpacks.*</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="{{asset('assets/img/h4-slide3.png') }}" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Apple <span class="primary">Store <strong>Ipod</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Select Item</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="{{asset('assets/img/h4-slide4.png') }}" alt="Slide">
                <div class="caption-group">
                  <h2 class="caption title">
                        Apple <span class="primary">Store <strong>Ipod</strong></span>
                    </h2>
                    <h4 class="caption subtitle">& Phone</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li> --}}
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

<div class="promo-area">
<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo1">
                <i class="fa fa-refresh"></i>
                <p>30 Days return</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo2">
                <i class="fa fa-truck"></i>
                <p>Free shipping</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo3">
                <i class="fa fa-lock"></i>
                <p>Secure payments</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo4">
                <i class="fa fa-gift"></i>
                <p>New products</p>
            </div>
        </div>
    </div>
</div>
</div> <!-- End promo area -->

<div class="maincontent-area">
<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="latest-product">
                <h2 class="section-title">Latest Products</h2>
                <div class="product-carousel">
                    @foreach ($getData as $row)
                    <form action="{{ route('add.to.cart', $row->id) }}" method="post" id="form1">
                    @csrf
                    <input type="hidden" value="{{ $row->id  }}" name="id">
                    <input type="hidden" value="{{ $row->product_name }}" name="title">
                    <input type="hidden" value="{{ $row->category_id }}" name="category">
                    <input type="hidden" value="{{ $row->price }}" name="price">
                    <input type="hidden" value="{{ $row->image }}" name="image">
                    <input type="hidden" value="{{ $row->description }}" name="description">
                    <div class="single-product">
                        <div class="product-f-image">
                            <img src="{{ asset('storage/'.$row->image) }}" class="card-img-top img-fluid" style="width: 18rem; height: 28rem;" alt="">
                            <div class="product-hover">
                                {{-- <button type="submit" name="submit" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                <button type="submit" name="submit" class="view-details-link"><i class="fa fa-link"></i>  See details</button> --}}
                                <a href="javascript:void(0);" class="add-to-cart-link" onclick="document.getElementById('form1').submit();"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                            </div>
                        </div>
                        
                        <h2><a href="single-product.html">{{ substr($row->product_name, 0,20) }}</a></h2>
                        
                        <div class="product-carousel-price">
                            <ins>${{ $row->price }}</ins> <del>$100.00</del>
                        </div> 
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- End main content area -->

<div class="brands-area">
<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="brand-wrapper">
                <div class="brand-list">
                    <img src="{{asset('assets/img/brand1.png') }}" alt="">
                    <img src="{{asset('assets/img/brand2.png') }}" alt="">
                    <img src="{{asset('assets/img/brand3.png') }}" alt="">
                    <img src="{{asset('assets/img/brand4.png') }}" alt="">
                    <img src="{{asset('assets/img/brand5.png') }}" alt="">
                    <img src="{{asset('assets/img/brand6.png') }}" alt="">
                    <img src="{{asset('assets/img/brand1.png') }}" alt="">
                    <img src="{{asset('assets/img/brand2.png') }}" alt="">                            
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- End brands area -->

<div class="product-widget-area">
<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="single-product-widget">
                <h2 class="product-wid-title">Top Sellers</h2>
                <a href="" class="wid-view-more">View All</a>
                @foreach ($ele as $item)
                @if($loop->index < 3)
                <div class="single-wid-product">
                    <a href="single-product.html"><img src="{{ asset('storage/'.$item->image) }}" alt="" class="product-thumb"></a>
                    <h2><a href="single-product.html">{{ $item->product_name }}</a></h2>
                    <div class="product-wid-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-wid-price">
                        <ins>${{ $item->price }}</ins> <del>$425.00</del>
                    </div>                            
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="single-product-widget">
                <h2 class="product-wid-title">Recently Viewed</h2>
                <a href="#" class="wid-view-more">View All</a>
                @foreach ($jwl as $item)
                @if($loop->index < 3)
                <div class="single-wid-product">
                    <a href="single-product.html"><img src="{{ asset('storage/'.$item->image) }}" alt="" class="product-thumb"></a>
                    <h2><a href="single-product.html">{{ $item->product_name }}</a></h2>
                    <div class="product-wid-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-wid-price">
                        <ins>${{ $item->price }}</ins> <del>$425.00</del>
                    </div>                            
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="single-product-widget">
                <h2 class="product-wid-title">Top New</h2>
                <a href="#" class="wid-view-more">View All</a>
                @foreach($men as $item)
                @if($loop->index < 3)
                <div class="single-wid-product">
                    <a href="single-product.html"><img src="{{ asset('storage/'.$item->image) }}" alt="" class="product-thumb"></a>
                    <h2><a href="single-product.html">{{ $item->product_name }}</a></h2>
                    <div class="product-wid-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-wid-price">
                        <ins>${{ $item->price }}</ins> <del>$425.00</del>
                    </div>                            
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div> <!-- End product widget area -->
@endsection