<section class="container product-wrapper mt-10" data-animation-options="{
   'delay': '.5s'
   }">
   <div class="tab tab-nav-center">
      <ul class="nav nav-tabs" role="tablist">
         <li class="nav-item">
            <a class="nav-link" href="#new-arrivals">New Arrivals</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#featured">Our Featured</a>
         </li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane active" id="new-arrivals">
            <div class="owl-carousel owl-theme  product-slide row">
               @foreach($new_arrivals as $products)
                  @include("layout.product")
               @endforeach
               </div>
            </div>
         <div class="tab-pane" id="featured">
            <div class="owl-carousel owl-theme  product-slide row">
               @foreach($featured as $products)
                  @include("layout.product")
               @endforeach
               </div>
         </div>
      </div>
   </div>
</section>