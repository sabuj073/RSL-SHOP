@extends("layout.app")
@section("content")
@push('styles_different_page')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
@push("filter_css")
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">
@endpush
@push("fliter_js")
<script src="{{ asset('vendor/nouislider/nouislider.min.js') }}"></script>
@endpush
<main class="main">
			<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb">
						<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
						<li>@if($cat_details) {{ $cat_details->cat_title }} @endif</li>
					</ul>
				</div>
			</nav>
			<div class="page-content pb-10 mb-3">
				<div class="container">
					<div class="row gutter-lg main-content-wrap">
						@include('layout.aside')
						<div class="col-lg-9 main-content">
							@if($cat_details->cat_big_banner)
							<div class="shop-banner-default banner mb-1">
								<img src="{{  $baseurl.$cat_details->cat_big_banner }}"  alt="{{ $cat_details->cat_title }}" class="img-fluid">
							</div>
							@endif
							@if(count($data)>0)
							<nav class="toolbox sticky-toolbox sticky-content fix-top">
								<div class="toolbox-right">
									<div class="toolbox-item toolbox-sort select-box text-dark">
										<label>Sort By :</label>
										<select name="orderby" class="form-control sort-order">
											<option value="default">Default</option>
											<option value="popularity" selected="selected">Most Popular</option>
											<option value="rating">Average rating</option>
											<option value="date">Latest</option>
											<option value="price-low">Sort forward price low</option>
											<option value="price-high">Sort forward price high</option>
											<option value="">Clear custom sort</option>
										</select>
									</div>
								</div>
								<div class="toolbox-right">
									<div class="toolbox-item toolbox-show select-box text-dark">
										<label>Show :</label>
										<select name="count" class="form-control per_page">
											<option value="12">12</option>
											<option value="24">24</option>
											<option value="36">36</option>
										</select>
									</div>
								</div>
							</nav>
							<div class="row cols-2 cols-sm-3 product-wrapper">
								@foreach($data as $products)
								<div class="product-wrap">
									@include("layout.product")
								</div>
								@endforeach
								@else
								<br><h5>No Product Found</h5>
								@endif
							</div>
							<nav class="toolbox toolbox-pagination">
								<center><ul class="pagination">
									{{ $data->links() }}
								</ul></center>
							</nav>
						</div>
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