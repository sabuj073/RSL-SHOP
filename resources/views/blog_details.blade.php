@extends("layout.app")
@section("content")
@push('styles_different_page')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li><a href="#" class="active">Blog</a></li>
            <li><a href="#" class="active">{{ $blogs->title }}</a></li>
         </ul>
      </div>
   </nav>
   <div class="page-content with-sidebar">
      <div class="container">
         <div class="row gutter-lg">
            <div class="col-lg-9">
               <div class="posts">
                  <article class="post post-classic mb-7">
                     <figure class="post-media overlay-zoom">
                        <a href="/blog-details/{{ $blogs->blog_slug }}">
                        <img src="{{ $baseurl."c_scale,w_870/".$blogs->blog_image }}" width="870" height="420" alt="{{ $blogs->blog_alt }}" />
                        </a>
                     </figure>
                     <div class="post-details">
                        <div class="post-meta">
                           by <a href="#" class="post-author">{{ $info->shop_name }}</a>
                           on <a href="#" class="post-date">{{ $blogs->date }}</a>
                        </div>
                        <h4 class="post-title"><a href="/blog-details/{{ $blogs->blog_slug }}">{{ $blogs->title }}</a>
                        </h4>
                        <p class="post-content">{!! $blogs->description !!}
                        </p>
                     </div>
                  </article>
               </div>
            </div>
            @include("layout.blog_aside")
         </div>
      </div>
   </div>
</main>
@endsection
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function(event) {
     toggleCategory();
   });
</script>