@extends("layout.app")
@section("content")
<main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="d-icon-home"></i></a></li>
                        <li>FAQs</li>
                    </ul>
                </div>
            </nav>
            <div class="page-header" style="background-image: url(images/page-header/faq.jpg)">
                <h3 class="page-subtitle lh-1">Frequently</h3>
                <h1 class="page-title font-weight-bold text-capitalize lh-1">Asked Questions</h1>
            </div>
            <div class="page-content mb-10 pb-8">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mt-10">
                                <div class="accordion accordion-border accordion-boxed accordion-plus">
                                    @foreach($faqs as $row)
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2-1" class="@if ($loop->first) collapse @else expand @endif">{!! $row->question !!}</a>
                                        </div>
                                        <div id="collapse2-1" class="@if ($loop->first) expanded @else collapsed @endif">
                                            <div class="card-body">
                                                <p><div class="text-justify">{!! $row->answer !!}</div></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
@endsection
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        toggleCategory();
    });
</script>