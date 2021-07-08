    <div class="post overlay-zoom appear-animate overlay-dark" data-animation-options="{
        'name': 'zoomInShorter'
    }">
    <figure class="post-media">
        <a href="post-single.html">
            <img src="{{ $baseurl."c_scale,w_280/".$row->blog_image }}" width="280" height="189" alt="{{ $row->blog_alt }}" />
        </a>
    </figure>
    <div class="post-details">
        <div class="post-meta">
            <a href="#" class="post-date">{{ $row->date }}</a>
            &nbsp;|&nbsp;
        </div>
        <h3 class="post-title"><a href="post-single.html">{{ $row->title }}</a></h3>
        <a href="/blog-details/{{ $row->blog_slug }}" class="btn btn-link btn-underline btn-sm">Read More<i
            class="d-icon-arrow-right"></i></a>
        </div>
    </div>