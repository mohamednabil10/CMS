@include('include.header')

@if($posts->count()>0)

<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('./img/header-1.jpg') }});" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="category.html">{{ $query }}</a>
                </div>
                <h1>{{ $query }}</h1> 
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>

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

                @foreach ($posts as $post )


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

@else

<div class="section-row loadmore text-center">
    <h1> No results !!!!!<h1></a>
</div>


@endif


@include('include.footer')



</body>

</html>
