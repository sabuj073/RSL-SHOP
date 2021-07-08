@php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
@endphp
@extends("layout.app")
@section("content")
<main class="main mt-8 single-product">
   <div class="page-content mb-10 pb-6">
      <div class="container">
         <div class="product product-single row mb-8">
            <div class="col-md-6">
               <div class="product-gallery pg-vertical">
                  <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                     <figure class="product-image">
                        <img src="{{ $baseurl."c_scale,w_580/".$data->product_image }}"
                        data-zoom-image="{{ $baseurl."c_scale,w_800/".$data->product_image }}"
                        alt="{{ $data->product_alt }}" width="800" height="900">
                     </figure>
                     @if($data->product_image2)
                     <figure class="product-image">
                        <img src="{{ $baseurl."c_scale,w_580/".$data->product_image2 }}"
                        data-zoom-image="{{  $baseurl."c_scale,w_800/".$data->product_image2 }}"
                        alt="{{ $data->product_alt }}" width="800" height="900">
                     </figure>
                     @endif
                     @if($data->product_image3)
                     <figure class="product-image">
                        <img src="{{ $baseurl."c_scale,w_580/".$data->product_image3 }}"
                        data-zoom-image="{{ $baseurl."c_scale,w_800/".$data->product_image3 }}"
                        alt="{{ $data->product_alt }}" width="800" height="900">
                     </figure>
                     @endif
                     @if($data->product_image4)
                     <figure class="product-image">
                        <img src="{{ $baseurl."c_scale,w_580/".$data->product_image4 }}"
                        data-zoom-image="{{ $baseurl."c_scale,w_800/".$data->product_image4 }}"
                        alt="{{ $data->product_alt }}" width="800" height="900">
                     </figure>
                     @endif
                  </div>
                  <div class="product-thumbs-wrap">
                     <div class="product-thumbs">
                        <div class="product-thumb active">
                           <img src="{{ $baseurl."c_scale,w_109/".$data->product_image }}" alt="{{ $data->product_alt }}"
                           width="109" height="122">
                        </div>
                        @if($data->product_image2)
                        <div class="product-thumb">
                           <img src="{{ $baseurl."c_scale,w_109/".$data->product_image2}}" alt="{{ $data->product_alt }}"
                           width="109" height="122">
                        </div>
                        @endif
                        @if($data->product_image3)
                        <div class="product-thumb">
                           <img src="{{ $baseurl."c_scale,w_109/".$data->product_image3}}" alt="{{ $data->product_alt }}"
                           width="109" height="122">
                        </div>
                        @endif
                        @if($data->product_image4)
                        <div class="product-thumb">
                           <img src="{{ $baseurl."c_scale,w_109/".$data->product_image4}}" alt="{{ $data->product_alt }}"
                           width="109" height="122">
                        </div>
                        @endif
                     </div>
                     <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                     <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                  </div>
               </div>
            </div>
            <div class="col-md-6 sticky-sidebar-wrapper">
               <div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
                  <div class="product-navigation">
                     <ul class="breadcrumb breadcrumb-lg">
                        <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Products</a></li>
                        <li>{{ $data->product_title }}</li>
                     </ul>

                  </div>

                  <h1 class="product-name">{{ $data->product_title }}</h1>
                  <div class="product-meta">
                     SKU: <span class="product-sku">{{ $data->sku }}</span>
                     AVAILABILITY: <span class="product-brand">@if($data->stock>0)<span class="text-success">In Stock</span>@else<span class="text-danger">Out of stock</span>@endif</span>
                  </div>
                  <div class="product-price">
                     <ins class="new-price">{{ $currency.$data->product_price }}</ins>@if($data->prev_price!="")<del class="old-price">{{ $currency.$data->prev_price }}</del>@endif
                  </div>
                  <div class="ratings-container">
                     <div class="ratings-full">
                        <span class="ratings" style="width:{{ $data->rating*20 }}%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                     </div>
                  </div>
                  <p class="product-short-desc">{!! $data->short_desc !!}</p>

                  <hr class="product-divider">

                  <div class="product-form product-qty">
                     <div class="product-form-group">
                        <div class="input-group mr-2">
                           <button class="button-addition quantity-minus d-icon-minus"></button>
                           <input class="form-control" onchange="if(this.value>{{$data->stock}}) this.value={{$data->stock}};" value="1" type="number" min="1" max="{{ $data->stock }}">
                           <button class="button-addition quantity-plus d-icon-plus"></button>
                        </div>
                        @if($data->stock>0)
                        <button class="btn-product modal-cart cart-add no-add btn-cart text-normal ls-normal font-weight-semi-bold"
                        data-id='{{ $data->product_id }}' 
                        data-label='{{ $data->product_title }}' 
                        data-price='{{ $data->product_price }}'
                        data-image='{{ $baseurl."c_scale,w_300/".$data->product_image }}'
                        data-stock ='{{ $data->stock }}'
                        data-slug = '{{ "/product-details/".$data->product_slug }}'
                        data-quantity='1'><i
                        class="d-icon-bag"></i>Add to
                     Cart</button>
                     @else
                     <a href="#" 
                     class=""
                     title="Out of stock"><span>Out Of Stock</span></a>
                     @endif
                  </div>
               </div>

               <hr class="product-divider mb-3">

               <div class="product-footer">
                  <div class="social-links mr-4">
                     <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{  $actual_link }}" class="social-link social-facebook fab fa-facebook-f"></a>
                     <a target="_blank" href="http://twitter.com/share?url={{ $actual_link }}" class="social-link social-twitter fab fa-twitter"></a>
                     <a target="_blank" href="http://pinterest.com/pin/create/button/?url={{ $actual_link }}" class="social-link social-pinterest fab fa-pinterest-p"></a>
                  </div>
                  <span class="divider d-lg-show"></span>
                  <div class="product-action">
                     <a href="#" class="btn-product btn-wishlist mr-6 wishlist-add-details check-wish-href-{{ $data->product_id }}"
                        data-id='{{ $data->product_id }}' 
                        data-label='{{ $data->product_title }}' 
                        data-price='{{ $data->product_price }}'
                        data-image='{{ $baseurl."c_scale,w_300/".$data->product_image }}'
                        data-stock ='{{ $data->stock }}'
                        data-slug = '{{ "/product-details/".$data->product_slug }}'
                        data-quantity='1'
                        ><i
                        class="d-icon-heart"></i><span>Add to
                        wishlist</span></a>
                        <a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add to
                        compare</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="tab tab-nav-simple product-tabs mb-4">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" href="#product-tab-description">Description</a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active in" id="product-tab-description">
                  <div class="row mt-6">
                     <div class="col-md-6">
                        {!! $data->product_desc !!}
                     </div>
                     <div class="col-md-6 pl-md-6 pt-4 pt-md-0">
                     <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description
                     </h5>
                     <figure class="p-relative d-inline-block mb-3">
                        <center><iframe width="330" height="315" src="https://www.youtube.com/embed/{{ $data->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                     </figure>
                  </div>
                  </div>
               </div>
            </div>
            <section class="pt-3 mt-10">
               <h2 class="title justify-content-center">Related Products</h2>

               <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
               data-owl-options="{
                  'items': 5,
                  'nav': false,
                  'loop': false,
                  'dots': true,
                  'margin': 20,
                  'responsive': {
                     '0': {
                        'items': 2
                     },
                     '768': {
                        'items': 3
                     },
                     '992': {
                        'items': 4,
                        'dots': false,
                        'nav': true
                     }
                  }
               }">
               @php
                  $data_temp = Helpers::relatedProducts($data->product_cat,$data->product_slug);
               @endphp
               @foreach($data_temp as $products)
               @include("layout.product")
               @endforeach
                        </div>
                     </section>
                  </div>
               </div>
            </main>
            @endsection
            <script type="text/javascript">
              document.addEventListener("DOMContentLoaded", function(event) {
                toggleCategory();
             });
          </script>