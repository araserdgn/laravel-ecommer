<footer class="site-footer border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">Menü</h3>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled">
                            <li class="active"><a href="{{ route('home') }}">Ana Sayfa</a></li>
                            <li>
                                <a href="{{ route('about') }}">Hakkımızda</a>
                            </li>
                            <li><a href="{{ route('products') }}">Ürünler</a></li>
                            <li><a href="{{ route('contact') }}">İletisim</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">İletişim Bilgileri</h3>
                    <ul class="list-unstyled">
                        <li class="address">{{ $settings['adres'] }}</li>
                        <li class="phone"><a href="tel://{{str_replace(' ','',$settings['phone'])}}">{{ $settings['phone'] }}</a></li>
                        <li class="email">{{ $settings['email'] }}</li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        {{date('Y')}} Tüm haklarınız bizlerde saklıdır.
                </p>
            </div>

        </div>
    </div>
</footer>
