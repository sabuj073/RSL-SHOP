@extends("layout.app")
@section("content")
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li>Terms & Conditions</li>
         </ul>
      </div>
   </nav>
   <div class="page-header pl-4 pr-4" style="background-color: #f89920;">
      <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Terms & Conditions</h1>
   </div>
   <div class="page-content mt-10 pt-10">
      <section class="contact-section">
                    <div class="container">
                        <div class="row">
                            {!! $info->terms !!}
                        </div>
                    </div>
                </section>
      <!-- End Customer Section -->
   </div>
</main>
@endsection
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        toggleCategory();
    });
</script>