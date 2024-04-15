<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-heading">
                        <a href="{{ url('/') }}"><img width="210" class="logo" src="{{ asset('assets/images/newlogomotomart.png') }}" alt="#" /></a>
                    </div>
                    <div class="footer-underline"></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    {{-- <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">About Us</a></div> --}}
                    {{-- <div class="mb-2"><a href="{{ url('/contact') }}" class="text-white">Contact Us</a></div> --}}
                    <div class="mb-2"><a href="{{ url('/forum') }}" class="text-white">Forum</a></div>
                    {{-- <div class="mb-2"><a href="{{ url('/sitemap') }}" class="text-white">Sitemaps</a></div> --}}
                    <div class="mb-2"><a href="{{ url('/sellercenter/dashboard') }}" class="text-white">Seller Center</a></div>
                    <div class="mb-2" onclick="openLink('{{ url('https://forms.gle/sKQ74gtwkwFUQZHT8') }}')">
                        <a href="#" class="text-white">Request as a seller</a>
                    </div>
                    <div class="mb-2"><a href="{{ url('/privacy-policy') }}" class="text-white">Privacy Policy</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $appSetting->address ?? 'address' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'phone 1' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email 1' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2024 - Motomart. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    {{-- Social media links can be added here --}}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media only screen and (max-width: 991px) {
        .footer-area .col-md-3:first-child {
            display: none; /* Hide the first column containing the logo on small screens */
        }
    }
</style>


<script>
    function openLink(url) {
        window.open(url, '_blank');
    }
</script>
