@include('include.header')

<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('./img/header-1.jpg') }});" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="category.html">{{ $name_of_tag }}</a>
                </div>
                <h1>{{ $tag->tag }}</h1>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>{{ $tag->created_at->toformatteddatestring() }}</li>
                    <li><i class="fa fa-comments"></i> 3</li>
                    <li><i class="fa fa-eye"></i> 807</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">


                <!-- post -->
						<div class="post post-row">
                            <div class="post-body">
                               <div class="post-category">

                                </div>
                                <ul class="post-meta">
                                   <li><a href="author.html">Tag: {{$tag->tag}}</a></li>
                                </ul>

                           </div>
                       </div>
                       <!-- /post -->

                <!-- post -->

                @foreach ($tag->posts as $post )


                <div class="post post-row">
                    <a class="post-img" href="{{ route('post.show',['slug'=>$post->slug]) }}"><img src="{{ $post->featured }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{ route('post.show',['slug'=>$post->slug]) }}">{{ $post->title }}</a>
                        </div>
                        <h3 class="post-title"><a href="{{ route('post.show',['slug'=>$post->slug]) }}">{{ $post->updated_at->ToformattedDateString() }}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>{{ $post->created_at->diffforHumans() }}</li>
                        </ul>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>

                @endforeach

                <!-- /post -->

                     <br>

                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Load More</a>
                </div>
            </div>
            <div class="col-md-4">
                <!-- galery widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Instagram</h2>
                    </div>
                    <div class="galery-widget">
                        <ul>
                            <li><a href="#"><img src="{{ asset('./img/galery-1.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('./img/galery-2.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('./img/galery-3.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('./img/galery-4.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('./img/galery-5.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('./img/galery-6.jpg') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /galery widget -->



            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->

@include('include.footer')

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>
