@if(isset($best_selling))
@if(count($best_selling)>0)
    <section class="grey-section pt-10 pb-8">
        <div class="container pt-4 pb-4 white-bg" >
            <section class="product-wrapper pt-1">
                <h2 class="title title-underline with-link custom_border"><span>Best Selling Products</span><a href="/best-selling"
                    class="font-weight-bold">View All Products<i class="d-icon-arrow-right"></i></a></h2>
                    <div class="row">
                    <div class="col-lg-12 col-md-12  col-sm-12">
                        <div class="owl-carousel owl-theme row owl-nav-full  product-slide">
                        @php
                        foreach($best_selling as $products){
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
@endif