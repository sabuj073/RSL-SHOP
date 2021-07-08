@extends("layout.app")
@section("content")
<main class="main order">
         <div class="page-content pt-7 pb-10 mb-10">
            <div class="step-by pr-4 pl-4">
               <h3 class="title title-simple title-step"><a href="javascript:void()">1. Shopping Cart</a></h3>
               <h3 class="title title-simple title-step"><a href="javascript:void()">2. Checkout</a></h3>
               <h3 class="title title-simple title-step active"><a href="javascript:void()">3. Order Complete</a></h3>
            </div>
            <div class="container mt-8">
               <div class="order-message mr-auto ml-auto">
                  <div class="icon-box d-inline-flex align-items-center">
                     <div class="icon-box-icon mb-0">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                           <g>
                              <path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
                                 M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
                                 c0-0.7,0-1.4-0.1-2.1"></path>
                                 <polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
                                 48,6.9 24.4,29.8 17.2,22.3    "></polyline>
                           </g>
                        </svg>
                     </div>
                     <div class="icon-box-content text-left">
                        <h5 class="icon-box-title font-weight-bold lh-1 mb-1">Thank You!</h5>
                        <p class="lh-1 ls-m">Your order has been received</p>
                     </div>
                  </div>
               </div>


               <div class="order-results">
                  <div class="overview-item">
                     <span>Order number:</span>
                     <strong>{{ $info->invoice_prefix.$order_details->order_id }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Status:</span>
                     <strong>{{ $order_details->status }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Date:</span>
                     <strong>{{ $order_details->date }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Email:</span>
                     <strong>{{ $order_details->email }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Total:</span>
                     <strong>{{ $currency.$order_details->total_amt }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Payment method:</span>
                     <strong>{{ $order_details->payment_type }}</strong>
                  </div>
               </div>

               <h2 class="title title-simple text-left pt-4 font-weight-bold text-uppercase">Order Details</h2>
               <div class="order-details">
                  <table class="order-details-table">
                     <thead>
                        <tr class="summary-subtotal">
                           <td>
                              <h3 class="summary-subtitle">Product</h3>
                           </td>
                           <td></td>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($details as $row)
                        <tr>
                           <td class="product-name">{{ $row->product_title }}<span> <i class="fas fa-times"></i>
                                 {{ $row->qty }}</span></td>
                           <td class="product-price">{{ $currency.$row->total_amt/$row->qty }}</td>
                        </tr>
                        @endforeach
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Subtotal:</h4>
                           </td>
                           <td class="summary-subtotal-price">{{ $currency.$order_details->product_total }}</td>
                        </tr>
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Shipping:</h4>
                           </td>
                           <td class="summary-subtotal-price">{{ $currency.$order_details->delivery_charge }}</td>
                        </tr>
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Payment method:</h4>
                           </td>
                           <td class="summary-subtotal-price">{{ $order_details->payment_type }}</td>
                        </tr>
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Total:</h4>
                           </td>
                           <td>
                              <p class="summary-total-price">{{ $currency.$order_details->total_amt }}</p>
                           </td>
                     </tbody>
                  </table>
               </div>
               <h2 class="title title-simple text-left pt-10 mb-2">Billing Address</h2>
               <div class="address-info pb-8 mb-6">
                  <p class="address-detail pb-2">
                     {{ $order_details->f_name }}<br>
                     {{ $order_details->phone }}<br>
                    {{ $order_details->email }}<br>
                     {{ $order_details->address }}<br>
                     {{ $order_details->city }}<br>
                     {{ $order_details->zip }}<br>
                  </p>
               </div>

               <a href="/" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4"><i class="d-icon-arrow-left"></i> Back to Home</a>
            </div>
         </div>
      </main>
@endsection
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) {
		toggleCategory();
      passcart();
	});
</script>