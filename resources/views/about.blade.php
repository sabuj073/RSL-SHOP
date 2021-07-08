@extends("layout.app")
@section("content")
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li>About Us</li>
         </ul>
      </div>
   </nav>
   <div class="page-header pl-4 pr-4" style="background-color: #f89920;">
      <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">{{ $info->shop_name }}</h1>
      <p class="page-desc text-white mb-0">{{ $description1 }}
      </p>
   </div>
   <div class="page-content mt-10 pt-10">
      <section class="customer-section pb-10 appear-animate fadeIn appear-animation-visible" style="animation-duration: 1.2s;">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-7 mb-4">
                  <figure>
                     <img src="{{ $baseurl."c_scale,w_580/".$info->about_img }}" alt="{{ $info->shop_name }}" width="580" height="507" class="banner-radius" style="background-color: #BDD0DE;">
                  </figure>
               </div>
               <div class="col-md-5 mb-4">
                  {!! $info->about !!}
               </div>
            </div>
         </div>
      </section>
      <!-- End Customer Section -->

      @include("layout.clients")
   </div>
</main>
@endsection
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) {
		toggleCategory();
	});
</script>