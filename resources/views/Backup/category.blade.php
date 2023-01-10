@extends('layouts.app')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Category</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Category</h2>
                        <input type="hidden" name="all" value="false">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="" id="checkbox" value="all"> All
                            </label>
                        </div>
                        @foreach ($getCategory as $item)
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input category" type="checkbox" name="category" class="checkbox" id="category" value="{{ $item->id }}"> {{ $item->cat_name }}
                            </label>
                        </div>                          
                        @endforeach
                        {{-- <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="" id="ele" value="electronics"> Electronics
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="" id="men" value="men"> Men's clothing
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="" id="wmen" value="women"> Women's clothing
                            </label>
                        </div> --}}
                        <!-- <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form> -->
                    </div>
                </div>
                {{-- <div id="updateDiv"></div> --}}
                <div class="col-md-10">
                    <div class="product-content-right">
                        <div class="all jewelery box" id="updateDiv">
                        <form action="" method="post">
                        @if (!empty($getCategoryById))
                        @foreach ($getCategoryById as $row)
                        @foreach ($row->product as $item)
                            <div class="col-md-3 col-sm-6">
                                <div class="single-shop-product">
                                    <div class="product-upper">
                                        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top img-fluid" style="width: 18rem; height: 18rem;" alt="">
                                    </div>
                                    <h2><a href="single-product.php?id=#">{{ $item->product_name }}</a></h2>
                                    <div class="product-carousel-price">
                                        <ins class="price">{{ number_format($item->price, 2) }}</ins> <del>$999.00</del>
                                    </div>
                                    <div class="product-option-shop">
                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                                        <button type="submit" name="submit" class="add_to_cart_button">Add to cart</button>
                                    </div>                       
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                            @endif
                        </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $(".category").click(function(){
            var brand = [];
            $(".category").each(function (indexInArray, valueOfElement) { 
                 if($(this).is(":checked")){
                    brand.push($(this).val());
                 }
            });
            FinalBrand = brand.toString();
            $.ajax({
                type: "get",
                url: "",
                data: "brand=" + FinalBrand,
                dataType: "html",
                success: function (response) {
                    console.log(response);
                    //$("#updateDiv").html(response)
                }
            });
        });
    })
</script>
@endpush