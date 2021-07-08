

@if(isset($cat_data))
@if(count($cat_data)>0)
@foreach($cat_data as $row)
@if(count(Helpers::getcategory_product($row->cat_slug))>0)
    <section class="grey-section pt-10 pb-8">
        <div class="container pt-4 pb-4 white-bg" >
            <section class="product-wrapper pt-1">
                <h2 class="title title-underline with-link custom_border"><span>{{ $row->cat_title }}</span><a href="categories/{{ $row->cat_slug }}"
                    class="font-weight-bold">View All Products<i class="d-icon-arrow-right"></i></a></h2>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="banner banner3 banner-fixed overlay-dark h-100">
                                <figure class="h-100">
                                    <img src="{{ $baseurl."c_scale,w_283/".$row->cat_banner }}" class="h-100" alt="{{ $row->cat_title }}"
                                     style="background-color: rgb(37, 36, 42);" />
                                </figure>
                                <div class="banner-content pr-2" data-animation-options="{
                                    'delay': '.3s'
                                }">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8  col-sm-6">
                        <div class="owl-carousel owl-theme row owl-nav-full  product-slide">
                        @php
                        $data = Helpers::getcategory_product($row->cat_slug);
                            foreach($data as $products){
                        @endphp
                        @include("layout.product")
                        @php } @endphp

                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endif
@endforeach
@endif
@endif