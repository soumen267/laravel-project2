@extends('layouts.app')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/img/product-thumb-1.jpg') }}" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/img/product-thumb-1.jpg') }}" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/img/product-thumb-1.jpg') }}" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/img/product-thumb-1.jpg') }}" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    @foreach ($getProduct as $item)
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ $item->category->id }}">{{ $item->category->cat_name }}</a>
                            <a href="{{ $item->id }}">{{ $item->product_name }}</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $item->product_name }}</h2>
                                    <div class="product-inner-price">
                                        <ins>${{ number_format($item->price, 2) }}</ins> <del>$100.00</del>
                                    </div>    
                                    
                                    <form action="{{ route('add.to.cart', $item->id) }}" class="cart" method="post" id="form1">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id  }}" name="id">
                                        <input type="hidden" value="{{ $item->product_name }}" name="title">
                                        <input type="hidden" value="{{ $item->category_id }}" name="category">
                                        <input type="hidden" value="{{ $item->price }}" name="price">
                                        <input type="hidden" value="{{ $item->image }}" name="image">
                                        <input type="hidden" value="{{ $item->description }}" name="description">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <a href="javascript:void(0);" class="add_to_cart_button" onclick="document.getElementById('form1').submit();">Add to cart</a>
                                        {{-- <button class="add_to_cart_button" type="submit">Add to cart</button> --}}
                                    </form>
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">{{ $item->category->cat_name }}</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p>{{ $item->description }}</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                @foreach ($getProductByCategory as $row)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset('storage/'.$row->image) }}" alt="">
                                        <div class="product-hover">
                                            <form action="{{ route('add.to.cart', $item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id  }}" name="id">
                                            <input type="hidden" value="{{ $item->product_name }}" name="title">
                                            <input type="hidden" value="{{ $item->category_id }}" name="category">
                                            <input type="hidden" value="{{ $item->price }}" name="price">
                                            <input type="hidden" value="{{ $item->image }}" name="image">
                                            <input type="hidden" value="{{ $item->description }}" name="description">
                                            <a href="javascript:void(0);" class="add-to-cart-link" onclick="document.getElementById('form1').submit();"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            {{-- <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> --}}
                                            </form>
                                            <a href="{{ route('product.single', $row->id) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">{{ $row->product_name }}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>${{ number_format($row->price, 2) }}</ins> <del>$100.00</del>
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach               
                </div>
            </div>
        </div>
    </div>
@endsection