@extends('layouts.app')
@section('content')
<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop') }}">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{{ $message }}</p>
    </div>
    @endif
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('shop') }}" method="POST" id="form2">
                    @csrf
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price" value="price-all" @if(request('price') == 'price-all') checked @endif class="custom-control-input" id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price" class="custom-control-input" id="price-1" value="price-1" @if(request('price') == 'price-1') checked @endif onChange="document.getElementById('form2').submit();">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price" class="custom-control-input" id="price-2"value="price-2" @if(request('price') == 'price-2') checked @endif onChange="document.getElementById('form2').submit();">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price" class="custom-control-input" id="price-3" value="price-3" @if(request('price') == 'price-3') checked @endif onChange="document.getElementById('form2').submit();">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price" class="custom-control-input" id="price-4" value="price-4" @if(request('price') == 'price-4') checked @endif onChange="document.getElementById('form2').submit();">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" name="price" class="custom-control-input" id="price-5" value="price-5" @if(request('price') == 'price-5') checked @endif onChange="document.getElementById('form2').submit();">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <form action="{{ route('shop') }}" method="POST" id="form1">
                                    @csrf
                                    {{-- <button type="submit" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button> --}}
                                    <select name="sorting" id='sorting' class="btn btn-sm btn-light dropdown-toggle" onchange="document.getElementById('form1').submit();">
                                        <option class="dropdown-item">Sorting</option>
                                        <option class="dropdown-item" value="all">All</option>
                                        <option class="dropdown-item" value="latest">Latest</option>
                                        <option class="dropdown-item" value="popularity">Popularity</option>
                                        <option class="dropdown-item" value="rating">Best Rating</option>
                                    </select>
                                    </form>
                                </div>
                                <div class="btn-group ml-2">
                                    <form action="" method="POST">
                                    {{-- <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button> --}}
                                    <select class="btn btn-sm btn-light dropdown-toggle">
                                    {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                                        <option value="">Showing</option>
                                        <option class="dropdown-item" value="">10</option>
                                        <option class="dropdown-item" value="">20</option>
                                        <option class="dropdown-item" value="">30</option>
                                    </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($getData)
                    @forelse($getData as $row)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <form action="{{ route('add.to.cart', $row->id) }}" method="post" id="form1">
                            @csrf
                            <input type="hidden" value="{{ $row->id  }}" name="id">
                            <input type="hidden" value="{{ $row->product_name }}" name="title">
                            <input type="hidden" value="{{ $row->category_id }}" name="category">
                            <input type="hidden" value="{{ $row->price }}" name="price">
                            <input type="hidden" value="{{ $row->image }}" name="image">
                            <input type="hidden" value="{{ $row->description }}" name="description">
                            <div class="product-img position-relative overflow-hidden" style="padding-top: 4px;">
                                <img class="img-fluid w-50 mx-auto d-block" src="{{ asset('storage/'.$row->image) }}" alt="">
                                <div class="product-action">
                                    {{-- <a class="btn btn-outline-dark btn-square" href="javascript:void(0)" onclick="document.getElementById('form1').submit();"><i class="fa fa-shopping-cart"></i></a> --}}
                                    <button type="submit" name="submit" class="btn btn-outline-dark btn-square tlc"><i class="fa fa-shopping-cart"></i></button>
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('product.single', $row->id) }}"><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            </form>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="{{ route('product.single', $row->id) }}">{{ $row->product_name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>${{ number_format($row->price,2) }}</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No products found</p>
                    @endforelse
                    @else
                    <p>No products found</p>
                    @endif
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            {{-- <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                            {{ $getData->links() }}
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection