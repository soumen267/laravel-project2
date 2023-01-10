@extends('layouts.app')
@section('content')
    <header class="himage">
        <div class="align">
            <h1 style="padding: 36px;margin-top: -54px; color: white;margin-left: 35px;">Blog</h1>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>
                    <span class="breadcrumb-item active">Blog</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            {{-- <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    
                </div>
            </div> --}}
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            {{-- <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div> --}}
                        </div>
                    </div>
                    @foreach ($data as $row)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <form action="" method="post" id="form1">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-50 mx-auto d-block" src="{{ url('public/image/'.$row->image) }}" alt="Image">
                            </div>
                            </form>
                            <div class="text-center py-4">
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h6>{{ Carbon\Carbon::parse($row->created_at)->format('M d y') }}</h6>
                                </div>
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $row->title }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            {{-- <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
@endsection
@push('style')
    <style>
        .timeStamp{
            border: 1px solid #e8e8e8;
            width: 60px;
            line-height: 1.25;
            padding: 10px;
            font-size: 12px;
        }
        .timeStamp .date {
            font-size: 24px;
            line-height: 1;
            border-bottom: 1px solid #e8e8e8;
            padding-bottom: 12px;
            margin-bottom: 12px;
        }
        .element-block {
            display: block;
        }
        .font-lato {
            font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .fw-normal {
            font-weight: 400;
        }
        .himage{
            background-image: url("/assets/img/img23.jpg");
        }
        p{
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }
    </style>
@endpush