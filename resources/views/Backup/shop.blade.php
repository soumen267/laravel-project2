@extends('layouts.app')
@section('content')
@if(Session::has('success'))
    {{Session::get('success')}}
@endif
@if(Session::has('error'))
    {{Session::get('error')}}
@endif
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
                @foreach($getData as $row)
                <form action="{{ route('add.to.cart', $row->id) }}" method="post">
                @csrf
                <input type="hidden" value="{{ $row->id  }}" name="id">
                <input type="hidden" value="{{ $row->product_name }}" name="title">
                <input type="hidden" value="{{ $row->category_id }}" name="category">
                <input type="hidden" value="{{ $row->price }}" name="price">
                <input type="hidden" value="{{ $row->image }}" name="image">
                <input type="hidden" value="{{ $row->description }}" name="description">
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ asset('storage/'.$row->image) }}" class="card-img-top img-fluid" style="width: 18rem; height: 18rem;" alt="">
                        </div>
                        <h2><a href="single-product.php?id=<?php echo $row->id ;?>"><?php echo $row->product_name ;?></a></h2>
                        <div class="product-carousel-price">
                            <ins>$<?php echo number_format($row->price, 2) ;?></ins> <del>$999.00</del>
                              {{-- <select value="qty" name="qty" style="padding: 6px;" class="card-title">
                                  <?php
                                  for($i = 1; $i<=5; $i++){
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                  }
                                  ?>
                              </select> --}}
                        </div>
                        <div class="product-option-shop">
                            <!-- <a onClick="myFunction()" class="add_to_cart_button" href="cart.php?id=<?php echo $row->id ;?>">Add to cart</a> -->
                            <button type="submit" name="submit" class="add_to_cart_button">Add to cart</button>
                            <a href="{{ route('product.single', $row->id) }}" class="add_to_cart_button" style="padding: 11px 25px;">Buy Now</a>
                        </div>
                    </div>
                </div>
                </form>
                @endforeach
            </div>
          </form>
          <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        {{-- <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                         --}}
                        {{ $getData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection