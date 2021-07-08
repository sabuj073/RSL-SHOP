@extends("layout.app")
@section("content")
<main class="main mt-lg-4">
    <div class="page-content">
        @if($banner)
        <section class="intro-section container custom-padding-right">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-4 mb-lg-0">
                    <div class="intro-slider animation-slider owl-carousel owl-theme owl-dot-inner row cols-1 gutter-no"
                    data-owl-options="{
                        'items': 1,
                        'dots': true,
                        'loop': true
                    }">
                    @foreach($banner as $row)
                    <div class="intro-slide1 banner banner-fixed" style="background-color: #e8e8ea">
                        <figure>
                            <img src="{{ $baseurl."c_scale,w_880/".$row->banner1 }}" alt="{{ $row->banner_alt }}" class="img-fluid" />
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($SingleLine)
    <section class="container appear-animate">
        <div class="service-list">
            <div class="owl-carousel owl-theme owl-middle row cols-lg-4 cols-md-3 cols-sm-2 cols-2"
            data-owl-options="{
                'items': 4,
                'margin': 20,
                'dots': false,
                'autoplay': true,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '576': {
                        'items': 2
                    },
                    '768': {
                        'items': 3
                    },
                    '992': {
                        'items': 4
                    }
                }
            }">
            <div class="icon-box text-center appear-animate" data-animation-options="{
                'name':'zoomInLeft',
                'delay': '.2s'
            }">
            <center><img src="{{ $baseurl."c_scale,w_50/".$SingleLine->icon1 }}" class="single-banner"></center>
            <div class="icon-box-content">
                <h4 class="icon-box-title">{!! $SingleLine->title1 !!}
                </div>
            </div>
            <div class="icon-box text-center appear-animate" data-animation-options="{
                'name':'zoomInLeft',
                'delay': '.3s'
            }">
            <center><img src="{{ $baseurl."c_scale,w_50/".$SingleLine->icon2 }}" class="single-banner"></center>
            <div class="icon-box-content">
                <h4 class="icon-box-title">{!! $SingleLine->title2 !!}
                </div>
            </div>
            <div class="icon-box text-center appear-animate" data-animation-options="{
                'name':'zoomInLeft',
                'delay': '.4s'
            }">
            <center><img src="{{ $baseurl."c_scale,w_50/".$SingleLine->icon3}}" class="single-banner"></center>
            <div class="icon-box-content">
                <h4 class="icon-box-title">{!! $SingleLine->title3 !!}
                </div>
            </div>
            <div class="icon-box text-center appear-animate" data-animation-options="{
                'name':'zoomInLeft',
                'delay': '.5s'
            }">
            <center><img src="{{ $baseurl."c_scale,w_50/".$SingleLine->icon4}}" class="single-banner"></center>
            <div class="icon-box-content">
                <h4 class="icon-box-title">{!! $SingleLine->title4 !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@include("layout.best_selling")
@if($featured_categories)
<section class="categories container mt-10">
    <h2 class="title title-line title-underline border-1 mb-4">Featured Categories</h2>
    <div class="row">
        @foreach($featured_categories as $row)
        <div class="col-xl-2 col-md-2 mb-4 col-6">
         <a href="/categories/{{ $row->cat_slug }}"> <div class="category category-group-image appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
        <div class="row">
            <div class="col-md-12">
                <figure class="category-media">
                    <img class="cat-img" src="{{ $baseurl."c_scale,w_74/".$row->cat_icon }}" alt="category" />
                </figure>
            </div>
        </div>
        <div class="category-content col-md-12">
            <center><h4 class="category-name text-center">{{ $row->cat_title }}</h4></center>
        </div>
    </div></a>
</div>
@endforeach
</div>
</section>
@endif
@if($info_banner)
<section class="container banner-group mt-10 pt-2">
    <div class="row">
        <div class="col-md-6 mb-4 appear-animate" data-animation-options="{
            'name': 'fadeInRightShorter',
            'delay': '.2s'
        }">
        <div class="banner banner-fixed banner1">
            <figure>
                <img src="{{ $baseurl."c_scale,w_580/".$info_banner->banner1 }}" width="580" height="240"
                alt="{{ $info_banner->banner1_alt }}" />
            </figure>
        </div>
    </div>
    <div class="col-md-6 mb-4 appear-animate" data-animation-options="{
        'name': 'fadeInLeftShorter',
        'delay': '.2s'
    }">
    <div class="banner banner-fixed banner2">
        <figure>
           <img src="{{ $baseurl."c_scale,w_870/".$info_banner->banner2 }}" width="580" height="240"
           alt="{{ $info_banner->banner2_alt }}" />
       </figure>
   </div>
</div>
</div>
</section>
@endif

<div class="col-md-12" id="post-data">
    @include("layout.category_slider")
</div>
@include("layout.loader")
<div class="col-md-12" id="post-data-mixed">
</div>


@if($randomgblogs)
<section class="blog container mt-10 pt-3 mb-10 appear-animate">
    <h2 class="title title-underline title-line mb-4 pb-5">From our Blog</h2>
    <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-1" data-owl-options="{
        'items': 4,
        'margin': 20,
        'loop': false,
        'responsive': {
            '0': {
                'items': 1
            },
            '576': {
                'items': 2
            },
            '768': {
                'items': 3
            },
            '992': {
                'items': 4
            }
        }
    }">
    @foreach($randomgblogs as $row)
    @include("layout.blog_single")
    @endforeach

</div>
</section>
@endif
@include("layout.clients")
</div>
<div class="newsletter-popup mfp-hide" id="newsletter-popup">
    <div class="newsletter-content">
        <img src="{{ $baseurl."c_scale,h_384/".$info->modal_image }}">
    </div>
</div>
</main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        trigger_slider();
        var page = 0;
        var check = true;
        loadmixed();
        $(window).scroll(function(){
            if($(window).scrollTop()+$(window).height()>=$(document).height()){
                page++;
                if(check){
                    loadmoreData(page);
                }
            }
        });
        $('html,body').bind('touchmove', function(e) { 
            if($(window).scrollTop()+$(window).height()>=$(document).height()){
                page++;
                if(check){
                    loadmoreData(page);
                }
            }
        });
    });
    function loadmixed(page){
        $.ajax({
            url:'/mixed-ajax',
            type:'get',
            beforeSend:function(){
            }
        })
        .done(function(data){
            if(data.html==""){
                $('.ajax-load').html("");
                return;
            }
            $("#post-data-mixed").append(data.html);
            trigger_slider();
        })
        .fail(function(jqXHR,ajaxOptions,throwError){
        })
    }
    function loadmoreData(page){
        $.ajax({
            url:'/category-ajax?page='+page,
            type:'get',
            beforeSend:function(){
                $(".ajax-load").show();
            }
        })
        .done(function(data){
            if(data.html==""){
                check = false;
                $('.ajax-load').html("");
                return;
            }
            $('.ajax-load').hide();
            $("#post-data").append(data.html);
            trigger_slider();
        })
        .fail(function(jqXHR,ajaxOptions,throwError){
            check = false;
        })
    }

</script>
