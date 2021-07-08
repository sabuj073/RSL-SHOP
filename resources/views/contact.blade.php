@extends("layout.app")
@section("content")
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li>Contact Us</li>
         </ul>
      </div>
   </nav>
   <div class="page-header pl-4 pr-4" style="background-color: #f89920;">
      <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Contact Us</h1>
   </div>
   <div class="page-content mt-10 pt-10">
      <section class="contact-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 ls-m mb-4">
                                <div class="grey-section d-flex align-items-center h-100 pt-5 pl-5 pr-5">
                                    <div>
                                        <h4 class="mb-2 text-capitalize">Address</h4>
                                        <p>{!! $info->address !!}</p>

                                        <h4 class="mb-2 text-capitalize">Phone Number</h4>
                                        <p>
                                            <a href="tel:{{ $info->phone }}">{{ $info->phone }}</a><br>
                                        </p>

                                        <h4 class="mb-2 text-capitalize">Support</h4>
                                        <p class="mb-4">
                                            <a href="mailto:{{ $info->email }}">{{ $info->email }}</a><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-6 d-flex align-items-center mb-4">
                                <div class="w-100">
                                    <form class="pl-lg-2" action="#">
                                        <h4 class="ls-m font-weight-bold">Let’s Connect</h4>
                                        <p>Your email address will not be published. Required fields are
                                            marked *</p>
                                        <div class="row mb-2">
                                            <div class="col-12 mb-4">
                                                <textarea class="form-control" required="" placeholder="Comment*"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="text" placeholder="Name *" required="">
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="email" placeholder="Email *" required="">
                                            </div>
                                        </div>
                                        <button class="btn btn-dark btn-rounded">Post Comment<i class="d-icon-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
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