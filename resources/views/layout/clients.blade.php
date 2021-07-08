<section class="brand-section grey-section pt-10 pb-10 appear-animate">
 <div class="container mt-8 mb-10">
   <h5 class="section-subtitle lh-2 ls-md font-weight-normal mb-1 text-center">Our Clients</h5>
   <div class="owl-carousel owl-theme row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
   data-owl-options="{
     'nav': false,
     'dots': false,
     'autoplay': true,
     'margin': 20,
     'responsive': {
       '0': {
         'items': 2
      },
      '576': {
         'items': 3
      },
      '768': {
         'items': 4
      },
      '992': {
         'items': 5
      },
      '1200': {
         'items': 6
      }
   }
}">
@foreach($clients as $row)
<figure class="brand-wrap bg-white banner-radius">
 <img src="{{ $baseurl."c_scale,w_180/".$row->img }}" alt="{{ $row->alt }}" width="180" height="100" />
</figure>
@endforeach
</div>
</div>
</section>