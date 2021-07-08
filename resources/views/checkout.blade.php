@php
if(isset($_POST['confirm_order'])){
   $f_name =  Helpers::mysql_escape($_POST["firstname"]);
   $email =  Helpers::mysql_escape($_POST['email']);
   $number = Helpers::mysql_escape($_POST['telephone']);
   $address =  Helpers::mysql_escape($_POST['address_1']);
   $city =  Helpers::mysql_escape($_POST['city']);
   $zip=  Helpers::mysql_escape($_POST['zip']);
   $comment =  Helpers::mysql_escape($_POST['comment']);
   if(!Auth::guest()){
      $user_id=Auth::user()->id;
   }else{
      $user_id=0;
   }
   $total = 0;
   $total_count=0;
   $price_total = 0;
   $total_discount = 0;
   $date = date("Y-m-d");
   $items = \Session::get('rsl_express_shop');
   $dc = \Session::get('dc_data');
   $delievery_charge = $dc['dc'];
   $d_type = $dc['dt'];

   foreach($items as $row) {
      $total_count++;
      $price_temp = 0;
      $price_temp = $row['quantity']*$row['price'];
      $price_total += $price_temp;
   }
   $total_pay = $price_total+$delievery_charge;
   $payment_type = "COD";
   $trx_id = "";
   $sql = "INSERT INTO `orders_info` 
   (`order_id`,`user_id`,`f_name`,phone, `email`,`address`, 
   `city`, `zip`,`prod_count`,product_total,delivery_charge,`total_amt`,comment,payment_type,date,trans_id,discount,d_type) 
   VALUES (null, '$user_id','$f_name','$number','$email', 
   '$address', '$city', '$zip','$total_count','$price_total','$delievery_charge','$total_pay','$comment','$payment_type','$date','$trx_id','$total_discount','$d_type')";
   $data = DB::insert($sql);
   $order_id =  DB::connection()->getPdo()->lastInsertId();
   foreach($items as $row) {
      $pro_id = $row['id'];
      $qty = $row['quantity'];
      $price_temp = 0;
      $price_temp = $row['quantity']*$row['price'];
      $sql1="INSERT INTO `order_products` 
      (`order_pro_id`,`order_id`,`product_id`,`qty`,`amt`) 
      VALUES (NULL, '$order_id','$pro_id','$qty','$price_temp')";
      Helpers::process_checkout($sql1);
      Helpers::updatestock($pro_id,$qty);
   }
   session()->forget('rsl_express_shop');
   session()->forget('dc_data');
   echo "<script>
   var item = [];
   localStorage.setItem('cart-items',JSON.stringify(item));
   </script>";
   //Helpers::send_order_mail($order_id,$info->shop_name,$info->email);
   $url = "/order-complete/".$order_id;
   echo "<script>window.location.href='".$url."'</script>";
}
@endphp
@extends("layout.app")
@section("content")
<main class="main checkout">
   <div class="page-content pt-7 pb-10 mb-10">
      <div class="step-by pr-4 pl-4 cart-box">
         <h3 class="title title-simple title-step"><a href="/cart">1. Shopping Cart</a></h3>
         <h3 class="title title-simple title-step active"><a href="javascript:void()">2. Checkout</a></h3>
         <h3 class="title title-simple title-step"><a href="javascript:void()">3. Order Complete</a></h3>
      </div>
      <div class="container">
               <div class="cart-data-1"></div>
            </div>
      <div class="container mt-7 cart-box">
         @if(Auth::guest())
         <div class="card accordion">
            <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
               <i class="fas fa-exclamation-circle"></i>
               <span class="text-body">Returning customer?</span>
               <a href="/login" class="text-primary">Click here to login</a>
            </div>
         </div>
         @endif
         <form action="" method="POST" class="form">
            @csrf
            <div class="row">
               <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                  <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                  <div class="row">
                     <div class="col-xs-12">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="@if(!Auth::guest()) {{ Auth::user()->name }} @endif" name="firstname" required="" />
                     </div>
                     <div class="col-xs-6">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="@if(!Auth::guest()) {{ Auth::user()->email }} @endif" name="email" required="" />
                     </div>
                     <div class="col-xs-6">
                        <label>Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="@if(!Auth::guest()) {{ Auth::user()->phone }} @endif" name="telephone" required="" />
                     </div>
                     <div class="col-xs-12">
                        <label>Full Address <span class="text-danger">*</span></label>
                        <textarea class="form-control text-left" name="address_1" required="">@if(!Auth::guest()){{ Auth::user()->address}} @endif</textarea>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xs-6">
                        <label>Town / City *</label>
                        <input type="text" class="form-control" name="city" required="" />
                     </div>
                     <div class="col-xs-6">
                        <label>ZIP *</label>
                        <input type="text" class="form-control" name="zip" required="" />
                     </div>
                  </div>
                  <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                  <label>Order Notes (Optional)</label>
                  <textarea class="form-control pb-2 pt-2 mb-0" name="comment" cols="30" rows="5"
                  placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
               </div>
               <aside class="col-lg-5 sticky-sidebar-wrapper">
                  <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                     <div class="summary pt-5">
                        <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                        <table class="order-table">
                           <table class="order-table">
                              <thead>
                                 <tr>
                                    <th class="text-left">Product</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody class="checkcout-data">
                              </tbody>
                           </table>
                           <table class="order-table">
                              <tbody>
                                 <tr class="summary-subtotal">
                                    <td>
                                       <h4 class="summary-subtitle">Subtotal</h4>
                                    </td>
                                    <td class="summary-subtotal-price pb-0 pt-0 cart-price text-right">
                                    </td>
                                 </tr>
                                 <tr class="sumnary-shipping shipping-row-last">
                                    <td colspan="2">
                                       <h4 class="summary-subtitle">Calculate Shipping</h4>
                                       <div class="shipping-address">

                                          <div class="select-box">
                                             <select name="delivery_charge" id="delivery_charge" class="form-control">
                                                <option value="">--Select--</option>
                                                <option value="inside">Inside Dhaka</option>
                                                <option value="outside">Outside Dhaka</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6">Delivery Charge</div>
                                          <div class="col-md-6 delivery_charge_data text-right"></div>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr class="summary-total">
                                    <td class="pb-0">
                                       <h4 class="summary-subtitle">Total</h4>
                                    </td>
                                    <td class=" pt-0 pb-0">
                                       <p class="summary-total-price ls-s text-primary cart-price-final"></p>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <div class="payment accordion radio-type">
                              <h4 class="summary-subtitle ls-m pb-3">Payment Methods</h4>
                              <div class="card">
                                 <div class="card-header">
                                    <a href="#collapse1" class="collapse text-body text-normal ls-m">Cash on Delivery
                                    </a>
                                 </div>
                                 <div id="collapse1" class="expanded" style="display: block;">
                                    <div class="card-body ls-m">
                                       Pay with cash upon delivery.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-checkbox mt-4 mb-5">
                              <input type="checkbox" class="custom-checkbox" id="terms-condition"
                              name="terms-condition" />
                              <label class="form-control-label" for="terms-condition">
                                 I have read and agree to the website <a target="_blank" checked href="/terms-and-condition">terms and conditions </a>*
                              </label>
                           </div>
                           <input type="submit" name="confirm_order" class="btn btn-dark btn-rounded btn-order" value="Place Order">
                        </div>
                     </div>
                  </aside>
               </div>
            </form>
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