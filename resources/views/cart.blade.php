@extends("layout.app")
@section("content")
<main class="main cart">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li>Shopping Cart</li>
         </ul>
      </div>
   </nav>
         <div class="page-content pt-7 pb-10">
            <div class="step-by pr-4 pl-4 cart-box">
                    <h3 class="title title-simple title-step active"><a href="javascript:void(0)">1. Shopping Cart</a></h3>
                    <h3 class="title title-simple title-step"><a href="/checkout">2. Checkout</a></h3>
               <h3 class="title title-simple title-step"><a href="javascript:void(0)">3. Order Complete</a></h3>
            </div>
            <div class="container">
               <div class="cart-data-1"></div>
            </div>
            <div class="container mt-7 mb-2 cart-box">
               <div class="row">
                  <div class="col-lg-8 col-md-12 pr-lg-4">
                     <table class="shop-table cart-table">
                        <thead>
                           <tr>
                              <th><span>Product</span></th>
                              <th></th>
                              <th><span>Price</span></th>
                              <th><span>quantity</span></th>
                              <th>Subtotal</th>
                           </tr>
                        </thead>
                        <tbody class="cart-data">
                           
                        </tbody>
                     </table>
                     <div class="cart-actions mb-6 pt-4">
                        <a href="/shop" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>
                     </div>
                  </div>
                  <aside class="col-lg-4 sticky-sidebar-wrapper">
                     <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                        <div class="summary mb-4">
                           <h3 class="summary-title text-left">Cart Totals</h3>
                           <table class="shipping">
                              <tr class="summary-subtotal">
                                 <td>
                                    <h4 class="summary-subtitle">Subtotal</h4>
                                 </td>
                                 <td>
                                    <p class="summary-subtotal-price cart-price">0</p>
                                 </td>                                  
                              </tr>
                              <tr>
                                 <td>
                                    <h4 class="summary-subtitle">Delivery Charge</h4>
                                 </td>
                                 <td>
                                    <p class="summary-subtotal-price delivery_charge_data">0</p>
                                 </td>                                  
                              </tr>

                           </table>
                           <div class="shipping-address">
                              <label>Shipping to <strong></strong></label>
                              <div class="select-box">
                                 <select name="delivery_charge" id="delivery_charge" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="inside">Inside Dhaka</option>
                                    <option value="outside">Outside Dhaka</option>
                                 </select>
                                        </div>
                           </div>
                           <table class="total">
                              <tr class="summary-subtotal">
                                 <td>
                                    <h4 class="summary-subtitle">Total</h4>
                                 </td>
                                 <td>
                                    <p class="summary-total-price ls-s cart-price-final">0</p>
                                 </td>                                  
                              </tr>
                           </table>
                           <a href="/checkout" class="btn btn-dark btn-rounded btn-checkout">Proceed to checkout</a>
                        </div>
                     </div>
                  </aside>
               </div>
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