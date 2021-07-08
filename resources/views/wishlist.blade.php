@extends("layout.app")
@section("content")
<main class="main">
         <nav class="breadcrumb-nav">
            <div class="container">
               <ul class="breadcrumb">
                  <li><a href="/"><i class="d-icon-home"></i></a></li>
                  <li>Wishlist</li>
               </ul>
            </div>
         </nav>
         <div class="page-content pt-10 pb-10 mb-2">
            <div class="container">
               <div class="Wishlist-data-1"></div>
               <table class="shop-table wishlist-table mt-2 mb-4 Wishlist-box">
                  <thead>
                     <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-add-to-cart"></th>
                        <th class="product-remove"></th>
                     </tr>
                  </thead>
                  <tbody class="wishlist-items-wrapper Wishlist-side">
                     
                  </tbody>
               </table>
            </div>
         </div>
      </main>
@endsection
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) {
		toggleCategory();
	});
</script>