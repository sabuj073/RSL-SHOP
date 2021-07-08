@if($products)
<div class="product product-classic">
    <figure class="product-media">
        <a href="product-details/{{ $products->product_slug }}">
            <img src="{{ $baseurl."c_scale,w_300/".$products->product_image }}" alt="{{ $products->product_alt }}" width="300"
            height="338">
        </a>
        @if($products->prev_price!="")
        <div class="product-label-group">
            <label class="product-label label-sale">{{ Helpers::getpercentage($products->product_price,$products->prev_price) }}% off</label>
        </div>
        @endif
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="/product-details/{{ $products->product_slug }}">{{ $products->product_title }}</a>
        </h3>
        <div class="product-price">
            <ins class="new-price">{{ $currency.$products->product_price }}</ins>@if($products->prev_price!="")<del class="old-price">{{ $currency.$products->prev_price }}</del>@endif
        </div>
        <div class="ratings-container">
            <div class="ratings-full">
                <span class="ratings" style="width:{{ $products->rating*20 }}%"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>
        </div>
        <div class="product-action">
            @if($products->stock>0)
            <a href="#" 
            class="btn-product btn-cart cart-add"
            data-quantity='1'
            data-id='{{ $products->product_id }}' 
            data-label='{{ $products->product_title }}' 
            data-price='{{ $products->product_price }}'
            data-image='{{ $baseurl."c_scale,w_300/".$products->product_image }}'
            data-stock ='{{ $products->stock }}'
            data-slug = '{{ "/product-details/".$products->product_slug }}'
            data-toggle="modal"
            data-target="#addCartModal" title="Add to cart"><i
            class="d-icon-bag"></i><span>add to
            cart</span></a>
            @else
            <a href="#" 
            class=""
            title="Out of stock"><span>Out Of Stock</span></a>
            @endif
            <a href="#" class="btn-product-icon btn-wishlist wishlist-add check-wish-{{ $products->product_id }}"
            data-quantity='1'
            data-id='{{ $products->product_id }}' 
            data-label='{{ $products->product_title }}' 
            data-price='{{ $products->product_price }}'
            data-image='{{ $baseurl."c_scale,w_300/".$products->product_image }}'
            data-stock ='{{ $products->stock }}'
            data-slug = '{{ "/product-details/".$products->product_slug }}'
            title="Add to wishlist"><i class="d-icon-heart"></i></a>
            <a href="#" class="btn-product-icon btn-quickview" data-id='{{ $products->product_id }}'  title="Quick View"><i
                class="d-icon-search"></i></a>
            </div>
        </div>
    </div>
    @endif