var Cart = {};

Cart.on = function(eventName, callback) {
  if (!Cart.callbacks[eventName]) Cart.callbacks[eventName] = [];
  Cart.callbacks[eventName].push(callback);
  return Cart;
};

Cart.trigger = function(eventName, args) {
  if (Cart.callbacks[eventName]) {
    for (var i = 0; i<Cart.callbacks[eventName].length; i++) {
      Cart.callbacks[eventName][i](args||{});
    }
  }
  return Cart;
};

Cart.save = function() {
  localStorage.setItem('cart-items', JSON.stringify(Cart.items));
  Cart.trigger('saved');
  return Cart;
};

Cart.save_dc = function(dc_type){
  localStorage.setItem('delivery-charge-type',dc_type);
  localStorage.setItem('delivery-charge-final',Cart.getChargeDetails(dc_type));
  Cart.trigger('saved');
}

Cart.getdctype = function(){
  var item = localStorage.getItem('delivery-charge-type');
  return item;
}

Cart.empty =  function() {
  Cart.items = [];
  Cart.trigger('emptied');
  Cart.save();
  return Cart;
};

Cart.indexOfItem = function(id) {
  for (var i = 0; i<Cart.items.length; i++) {
    if (Cart.items[i].id===id) return i;
  }
  return null;
};

Cart.removeEmptyLines = function() {
  newItems = [];
  for (var i = 0; i<Cart.items.length; i++) {
    if (Cart.items[i].quantity>0) newItems.push(Cart.items[i]);
  }
  Cart.items = newItems;
  return Cart;
};

Cart.addItem = function(item,stock) {
  if (!item.quantity) item.quantity = 1;
  var index = Cart.indexOfItem(item.id);
  if (index===null) {
    Cart.items.push(item);
    toastr.success('Added to cart');
  } else {
    var qty = Number(Cart.items[index]. quantity);
    if(qty+Number(item.quantity)>stock){
      toastr.warning('Desired quantity not in stock');
    }else{
      Cart.items[index]. quantity += Number(item.quantity);
      Cart.items[index]. stock = Number(stock);
      if(item.quantity>0){
      toastr.success('Added to cart');
    }
    }
  }
  Cart.removeEmptyLines();
  if (item.quantity > 0) {
    Cart.trigger('added', {item: item});
  } else {
    Cart.trigger('removed', {item: item});
  }
  Cart.save();
  return Cart;
};

Cart.removeItem = function(item) {
  if (!item.quantity) item.quantity = 1;
  var index = Cart.indexOfItem(item.id);
    Cart.items[index]. quantity -= Cart.items[index]. quantity;
  Cart.removeEmptyLines();
    Cart.trigger('removed', {item: item});
  Cart.save();
  return Cart;
};

Cart.itemsCount = function() {
  var accumulator = 0;
  for (var i = 0; i<Cart.items.length; i++) {
    accumulator += Number(Cart.items[i].quantity);
  }
  return accumulator;
};

Cart.currency = '৳';

Cart.displayPrice = function(price) {
  if (price===0) return '৳ 0';
  var floatPrice = price;
  var decimals = floatPrice==parseInt(floatPrice, 10) ? 0 : 2;
  return Cart.currency + floatPrice.toFixed(decimals);
};

Cart.linePrice = function(index) {
  return Number(Cart.items[index].price) * Number(Cart.items[index].quantity);
};

Cart.subTotal = function() {
  var accumulator = 0;
  for (var i = 0; i<Cart.items.length; i++) {
    accumulator += Number(Cart.linePrice(i));
  }
  return accumulator;
};


Cart.init = function() {
  var items = localStorage.getItem('cart-items');
  if (items) {
    Cart.items = JSON.parse(items);
  } else {
    Cart.items = [];
  }
  Cart.callbacks = {};
  return Cart;
}

Cart.getChargeDetails = function(data){
  var charge = Number(localStorage.getItem(data));
  return charge;
}

Cart.initJQuery = function() {

  Cart.init();

  Cart.templateCompiler = function(a,b){return function(c,d){return a.replace(/#{([^}]*)}/g,function(a,e){return Function("x","with(x)return "+e).call(c,d||b||{})})}};

  Cart.lineItemTemplate = "<div class='product product-cart'>" +
    "<figure class='product-media'>"+
      "<a href='#{this.slug}'>"+
      "<img src='#{this.image}' alt='#{this.label}' width='80' height='88' />"+
      "</a>"+
      "<button class='btn btn-link btn-close cart-remove' data-id='#{this.id}'>"+
      "<i class='fas fa-times'></i><span class='sr-only'>Close</span>"+
      "</button>"+
   "</figure>"+
   "<div class='product-detail'>"+
      "<a href='#{this.slug}' class='product-name'>#{this.label}</a>"+
      "<div class='price-box'>"+
         "<span class='product-quantity'>#{this.quantity}</span>"+
         "<span class='product-price'>#{Cart.displayPrice(this.price)}</span>"+
      "</div>"+
      "<div class='price-box'>"+
         "<span class='pointer cart-add' data-id='#{this.id}' data-stock='#{this.stock}' data-quantity='-1'><img src='https://res.cloudinary.com/techdyno-bd/image/upload/c_scale,w_64/v1625417221/minus_gckp5a.png' width='20'></span>&nbsp;&nbsp"+
         "<span class='pointer cart-add' data-id='#{this.id}' data-stock='#{this.stock}' data-quantity='1'><img src='https://res.cloudinary.com/techdyno-bd/image/upload/c_scale,w_64/v1625417221/plus_1_tim64z.png' width='20'></span>"+
      "</div>"+
   "</div>"+
"</div>";

Cart.checkouttemplate = `<tr>
                                 <td class="product-name">#{this.label}<span
                                    class="product-quantity">×&nbsp;#{this.quantity}</span></td>
                                    <td class="product-total text-body text-right">#{Cart.displayPrice(this.price*this.quantity)}</td>
                                 </tr>`;

Cart.lineItemTemplate1 = `<tr>
                              <td class="product-thumbnail">
                                 <figure>
                                    <a href="#{this.slug}">
                                       <img src="#{this.image}" width="100" height="100"
                                          alt='#{this.label}'>
                                    </a>
                                 </figure>
                              </td>
                              <td class="product-name">
                                 <div class="product-name-section">
                                    <a href="#{this.slug}">#{this.label}</a>
                                 </div>
                              </td>
                              <td class="product-subtotal">
                                 <span class="amount">#{Cart.displayPrice(this.price)}</span>
                              </td>
                              <td class="product-quantity">
                                 <div class="input-group">
                                    <button class="quantity-minus d-icon-minus cart-add" data-id='#{this.id}' data-stock='#{this.stock}' data-quantity='-1'></button>
                                    <input class="form-control" value="#{this.quantity}" readonly type="number" min="1"
                                       max="#{this.stock}">
                                    <button class="quantity-plus d-icon-plus cart-add" data-id='#{this.id}' data-stock='#{this.stock}' data-quantity='1'></button>
                                 </div>
                              </td>
                              <td class="product-name">
                                 <span class="amount">#{Cart.displayPrice(this.price*this.quantity)}</span>
                              </td>
                              <td class="product-close">
                                 <a href="#" class="product-remove cart-remove" data-id='#{this.id}' title="Remove this product">
                                    <i class="fas fa-times"></i>
                                 </a>
                              </td>
                           </tr>`;



$(document).on('click', '.cart-add', function(e) {
    e.preventDefault();
    var button = $(this);
    var stock = button.data('stock')
    var item = {
      id: button.data('id'),
      price: button.data('price'),
      quantity: button.data('quantity'),
      label: button.data('label'),
      image: button.data('image'),
      stock: button.data('stock'),
      slug: button.data('slug')
    }
    Cart.addItem(item,stock);
});

$(document).on('change', '.per_page', function(e) {
    e.preventDefault();
    var data = $(this).val();
    window.history.searchParams.append('?per-page='+data);
    var location = window.location.pathname+window.location.search;
  });

$(document).on('change', '.sort-order', function(e) {
    e.preventDefault();
    var data = $(this).val();
    var location = window.location.pathname+window.location.search;
    location  = location+'?sort-order='+data;
    window.history.pushState("",'',location);
    
});


  

  $(document).on('click', '.button-addition', function(e) {
  e.preventDefault();
  var $button = $(this);
  var oldValue = $button.parent().find("input").val();
  var max = Number($button.parent().find("input").attr('max'));

  if ($button.attr('class') == "button-addition quantity-plus d-icon-plus") {
      if(oldValue<max){
      var newVal = parseFloat(oldValue) + 1;
    }else{
      var newVal = parseFloat(oldValue);
    }
    } else {
   // Don't allow decrementing below zero
    if (oldValue > 0) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 0;
    }
  }
  $(".modal-cart").attr("data-quantity",newVal);
   $button.parent().find("input").val(newVal);

});

  $(document).on('click', '.cart-remove', function(e) {
    e.preventDefault();
    var button = $(this);
    var item = {
      id: button.data('id'),
    }
    Cart.removeItem(item);
  });


  Cart.updateme = function(){
    updateReport();
    updateCart();
  }

  var updateReport = function() {
    var count = Cart.itemsCount();
    $('.cart-count').text(count);
    $('.cart-price').html(Cart.displayPrice(Cart.subTotal()));
    $('.cart-price-final').html(Cart.displayPrice(Cart.subTotal()+Number(Cart.getChargeDetails('delivery-charge-final'))));
    $('.delivery_charge_data').html(Cart.displayPrice(Cart.getChargeDetails('delivery-charge-final')));
    $('#delivery_charge').val(Cart.getdctype());
    if (count===1) {
      $('.cart-items-count-singular').show();
      $('.cart-items-count-plural').hide();
    } else {
      $('.cart-items-count-singular').hide();
      $('.cart-items-count-plural').show();
    }
  };

  var updateCart = function() {
    if (Cart.items.length>0) {
      var template = Cart.templateCompiler(Cart.lineItemTemplate);
      var template2 = Cart.templateCompiler(Cart.lineItemTemplate1);
      var checkouttemplate = Cart.templateCompiler(Cart.checkouttemplate);
      var lineItems = "";
      var lineItems2 = "";
      var checkout_data_template = "";
      for (var i = 0; i<Cart.items.length; i++) {
        lineItems += template(Cart.items[i]);
        lineItems2 += template2(Cart.items[i]);
        checkout_data_template += checkouttemplate(Cart.items[i]);

      }
      $('.cart-side').html(lineItems);
      $('.cart-data').html(lineItems2);
      $('.checkcout-data').html(checkout_data_template);
      $('.cart-box').show();
    } else {
      $('.cart-side').html("<center><img src='https://res.cloudinary.com/techdyno-bd/image/upload/v1625414794/42176-empty-cart_xjkphe.gif' class='img-fluid'></center>");
      $('.cart-data-1').html("<center><img src='https://res.cloudinary.com/techdyno-bd/image/upload/v1625414794/42176-empty-cart_xjkphe.gif' class='img-fluid'></center>");
      $('.cart-box').hide();
    }
  };

  var update = function() {
    updateReport();
    updateCart();
  };

  update();

  Cart.on('saved', update);

  return Cart;
};

