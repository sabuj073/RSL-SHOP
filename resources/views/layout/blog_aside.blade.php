<aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
               <div class="sidebar-overlay">
                  <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
               </div>
               <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
               <div class="sidebar-content">
                  <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                     <div class="widget widget-search border-no mb-2">
                        <form action="#" class="input-wrapper input-wrapper-inline btn-absolute">
                           <input type="text" class="form-control" name="search" autocomplete="off"
                              placeholder="Search in Blog" required />
                           <button class="btn btn-search btn-link" type="submit">
                           <i class="d-icon-search"></i>
                           </button>
                        </form>
                     </div>
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title">Popular Posts</h3>
                        <div class="widget-body">
                           <div class="post-col">
                              @foreach($randomBlogs as $rand)
                              <div class="post post-list-sm">
                                 <figure class="post-media">
                                    <a href="/blog-details/{{ $rand->blog_slug }}">
                                    <img src="{{ $baseurl."c_scale,w_90/".$rand->blog_image }}" width="90" height="90"
                                       alt="{{ $rand->blog_alt }}" />
                                    </a>
                                 </figure>
                                 <div class="post-details">
                                    <div class="post-meta">
                                       <a href="#" class="post-date">{{ $rand->date }}</a>
                                    </div>
                                    <h4 class="post-title"><a href="/blog-details/{{ $rand->blog_slug }}">{{ $rand->title }}</a>
                                    </h4>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </aside>