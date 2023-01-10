@foreach ($data as $item)
<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2><span>{{ $item->footer_title }}</span></h2>
                    <p>{{ $item->footer_desc }}</p>
                    <div class="footer-social">
                        <a href="{{ $item->footer_social_fb }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $item->footer_social_twt }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $item->footer_social_you }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="{{ $item->footer_social_link }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">{{ $item->footer_nav }}</h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Vendor contact</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul>                        
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        @foreach ($item->footer_category as $row)
                        <li>
                        @if ($row === '1') Electronics @endif
                        @if ($row === '2') Gift @endif
                        @if ($row === '3') Men's Clothing @endif
                        @if ($row === '4') Women's Clothing @endif
                        </li>
                        @endforeach
                    </ul>                        
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">{{ $item->news_title }}</h2>
                    <p>{{ $item->news_desc }}</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->
<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    {{-- <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p> --}}
                    <p>{!! $item->footer_copy !!}</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="footer-card-icon">
                    @php
                        $myArray = explode(',', $item->footer_logo);
                    @endphp
                        @foreach ($myArray as $row)
                        <i class="{{ $row }}"></i>
                        @endforeach                    
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->
@endforeach