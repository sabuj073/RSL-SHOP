@php
$actual_link = asset('product-details/'.$data->product_slug);
@endphp
<div class="product product-single  product-variable product-single-single row product-popup">
	<div class="col-md-6">
		<div class="product-gallery">
			<div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
				<figure class="product-image">
					<img src="{{ $baseurl."c_scale,w_300/".$data->product_image }}" alt="{{ $data->product_alt }}"
						width="580" height="580">
				</figure>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="product-details scrollable pr-0 pr-md-3">
			<h1 class="product-name mt-0">{{ $data->product_title }}</h1>
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
						<input class="quantity form-control" onchange="if(this.value>{{$data->stock}}) this.value={{$data->stock}};" value="1" type="number" min="1" max="{{ $data->stock }}">
						<button class="button-addition quantity-plus d-icon-plus"></button>
					</div>
					@if($data->stock>0)
					<button class="btn-product modal-cart cart-add no-add btn-cart text-normal ls-normal font-weight-semi-bold"
					data-id='{{ $data->product_id }}' 
            		data-label='{{ $data->product_title }}' 
            		data-price='{{ $data->product_price }}'
           			data-image='{{ $baseurl."c_scale,w_300/".$data->product_image }}'
            		data-stock ='{{ $data->stock }}'
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
                     <a href="#" class="btn-product btn-wishlist mr-6"><i
                        class="d-icon-heart"></i><span>Add to
                        wishlist</span></a>
                        <a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add to
                        compare</a>
                     </div>
                  </div>
		</div>
	</div>
</div>