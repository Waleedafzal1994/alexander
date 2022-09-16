<footer>
    <div class="footer">
        <div id="footer">
            <div class="container" style="padding:15px;">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="special-heading">About <span>Us</span></h6>
                        <p style="text-align: left; margin-top:10px;">GamersPlay is a premium website where you can find a
                            gamer friend. Chat, play and interact with our members or become a GamersPlay+ and offer your own
                            gaming and lifestyle services !</p>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-md-center">
                        <div style="display:flex;" class="mobile_ul_nav">
                            <ul class="footer-menu my-0">
                                <li><a href="/">Home</a></li>
                                <!-- {{-- <li><a href="/gp">Services</a></li> --}} -->
                                <li><a href="#">Services</a></li>
                                <li><a href="/news">News</a></li>
                            </ul>
                            <ul class="footer-menu my-0">
                                <li><a href="/terms-of-service">Terms of Service</a></li>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/community-guidelines">Community Guidelines</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-5 offset-md-1">
                        <h6 class="special-heading">Latest <span>News</span></h6>
                        @if (isset($news) && count($news) > 0)
                            @foreach ($news as $post)
                                <div style="display:flex; margin:10px 0;" class="footer-news-article">
                                    <div>
                                        <a href="/news/{{ $post->id }}"><img src="{{ $post->image }}" alt=""
                                                style="height:64px; object-fit:cover; min-width:120px; max-width:150px; border-radius:4px;"></a>
                                    </div>
                                    <div style="margin-left:5px;">
                                        <p><a href="/news/{{ $post->id }}">{{ $post->title }}</a></p>
                                        <small style="color:white;">
                                            <span class="material-icons" style="font-size:100%; color:white">schedule</span>
                                            {{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No news to show.</p>
                        @endif
                    </div> -->
                </div>
            </div>
        </div>
        <div style="background:black; color:White;">
            <div class="container footer-mobile" style="padding:15px;">
                <div class="row">
                    <div class="col-md-7">
                        <div class="d-flex align-items-center">
                            <h6 class="special-heading mr-5 mb-0">
                                Gamers<span>Play</span>
                            </h6>
                            <small>Copyright © {{ date('Y') }} GamersPlay - All rights reserved.</small>
                        </div>

                    </div>
                    <div class="footer-social col-md-5 d-flex align-items-center">
                        <div class="mr-3">
                            <a href="#" class="footer-link active">Home</a>
                        </div>
                        <div class="mr-3">
                            {{-- <a href="/services" class="footer-link">Services</a> --}}
                            <a href="#" class="footer-link">Services</a>
                        </div>
                        <div class="mr-3">
                            <a href="/news" class="footer-link">News</a>
                        </div>
                        <div class="mr-3">
                            <div style="display:flex;" class="mobile-center">
                                <a href="https://www.facebook.com/gamersplaygg"><img src="/imgs/icons/facebook.svg"
                                        class="footer-socials-icon"></a>
                                <a href="#"><img src="/imgs/icons/instagram.svg" class="footer-socials-icon"></a>
                                <a href="https://twitter.com/gamersplaygg"><img src="/imgs/icons/twitter.svg"
                                        class="footer-socials-icon"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</footer>
