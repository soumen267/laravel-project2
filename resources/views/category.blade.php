@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>
                    <span class="breadcrumb-item active">Category</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <div class="container-fluid pt-5 pb-3">
        @if(!empty($getCategory) && !isset($getCategoryById))
        <div class="row px-xl-5">
            @foreach ($getCategory as $row)
            @php
                $tt = $row->product()->first();
            @endphp
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1 py-6">
                <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{ $row->cat_name }}</span></h5>
                <a class="text-decoration-none" href="{{ route('category.id', $row->id) }}">
                <div class="product-item bg-light mb-4" style="padding: 10px;">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-50  mx-auto d-block" src="{{ asset('storage/'.$tt->image) }}" alt="">
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    @elseif(!empty($getCategoryById) && empty($getCategory))
    @foreach ($getCategoryById as $item)
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{ $item->cat_name }}</span></h2>
    @endforeach
    <div class="row px-xl-5">
        @foreach ($getCategoryById as $item)
        @foreach ($item->product as $row)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                    <form action="{{ route('add.to.cart', $row->id) }}" method="post" id="form1">
                    @csrf
                    <input type="hidden" value="{{ $row->id  }}" name="id">
                    <input type="hidden" value="{{ $row->product_name }}" name="title">
                    <input type="hidden" value="{{ $row->category_id }}" name="category">
                    <input type="hidden" value="{{ $row->price }}" name="price">
                    <input type="hidden" value="{{ $row->image }}" name="image">
                    <input type="hidden" value="{{ $row->description }}" name="description">
                    <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-50  mx-auto d-block" src="{{ asset('storage/'.$row->image) }}" alt="">
                    <div class="product-action">
                        <button type="submit" name="submit" class="btn btn-outline-dark btn-square tlc"><i class="fa fa-shopping-cart"></i></button>
                        {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a> --}}
                        <a class="btn btn-outline-dark btn-square" href="{{ route('product.single', $row->id) }}"><i class="far fa-heart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                    </div>
                </div>
                </form>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="{{ route('product.single', $row->id) }}">{{ $row->product_name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{ number_format($row->price) }}</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
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
        @endforeach
        @endforeach
    @endif
    </div>
@endsection