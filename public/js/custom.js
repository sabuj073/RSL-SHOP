function trigger_slider(){
    var featured = $('.product-slide');
    featured.owlCarousel({
        'items': 5,
        'nav': false,
        'dots': true,
        'margin': 20,
        'loop': false,
        'responsive': {
            '0': {
                'items': 2
            },
            '576': {
                'items': 1
            },
            '768': {
                'items': 2
            },
            '1200': {
                'items': 4
            },
            '1600': {
                'items': 5
            }
        }
    });
}

$(".category-dropdown").click(function() {
    $(".dropdown-box-category").toggleClass("d-none",3000);
});

$(document).on('change', '#delivery_charge', function(e) {
    e.preventDefault();
    var value = $("#delivery_charge").val();
    Cart.save_dc(value);
    passcart();
});



function toggleCategory(){
    $(".dropdown-box-category").addClass("d-none",3000);
}


function checkcart(){
    var items = localStorage.getItem('cart-items');
    if (items) {
      items = items;
    } else {
      items = [];
  }
  var token = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    url:"/pass-cart/",
    method:"POST",
    data:{data:items, _token: token},
    success:function(reponse){
        console.log(reponse);
        localStorage.setItem('cart-items',reponse);
    }
  })
}

function passcart(){
    var items = localStorage.getItem('cart-items');
    if (items) {
      items = items;
    } else {
      items = [];
  }
  var dtype = Cart.getdctype();
  var dcharge = Cart.getChargeDetails('delivery-charge-final');
  var token = $('meta[name="csrf-token"]').attr('content');
  console.log(items);
  $.ajax({
    url:"/pass-cart/",
    method:"POST",
    data:{
        data:items,
         _token: token,
         dtype:dtype,
         dcharge:dcharge
     },
    success:function(reponse){
        reponse = JSON.parse(reponse);
        console.log(reponse);
        localStorage.setItem('cart-items',JSON.stringify(reponse.cart));
        localStorage.setItem('inside',reponse.inside);
        localStorage.setItem('outside',reponse.outside);
        var items = localStorage.getItem('cart-items');
        if (items) {
            console.log(items);
           Cart.items = JSON.parse(items);
        } else {
        Cart.items = [];
      }
      Cart.updateme();
    }
  })
}
