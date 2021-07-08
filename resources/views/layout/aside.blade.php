<aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
					<div class="sidebar-overlay"></div>
					<a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
					<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
					<div class="sidebar-content">
						<div class="sticky-sidebar">
							<div class="widget widget-collapsible">
								<h3 class="widget-title">All Categories</h3>
								<ul class="widget-body filter-items search-ul">
									@foreach($categories as $row)
									@php
                                    $sub_category = Helpers::getSubcategory($row->cat_id);
                                    @endphp
									<li @if(count($sub_category)>0) class="with-ul" @endif><a href="/categories/{{ $row->cat_slug }}">{{ $row->cat_title }}</a>
										@if(count($sub_category)>0)
										<ul>
                                            @foreach($sub_category as $subrow)
                                            <li><a href="/sub-categories/{{ $subrow->sub_cat_slug }}">{{ $subrow->sub_cat_name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
									</li>
									@endforeach
								</ul>
							</div>
							<div class="widget widget-collapsible">
								<h3 class="widget-title">Filter by Price</h3>
								<div class="widget-body mt-3">
									<div class="filter-price-slider"></div>

									<div class="filter-actions">
										<div class="filter-price-text mb-4">Price:
											<span class="filter-price-range"></span>
											<input type="hidden" name="min" id="min">
											<input type="hidden" name="max" id="max">
										</div>
										<button type="submit"
										class="btn btn-dark btn-filter btn-rounded">Filter</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</aside>