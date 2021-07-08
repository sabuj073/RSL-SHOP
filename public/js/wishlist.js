var Wishlist = {};

Wishlist.on = function(eventName, callback) {
  if (!Wishlist.callbacks[eventName]) Wishlist.callbacks[eventName] = [];
  Wishlist.callbacks[eventName].push(callback);
  return Wishlist;
};

Wishlist.trigger = function(eventName, args) {
  if (Wishlist.callbacks[eventName]) {
    for (var i = 0; i<Wishlist.callbacks[eventName].length; i++) {
      Wishlist.callbacks[eventName][i](args||{});
    }
  }
  return Wishlist;
};

Wishlist.save = function() {
  localStorage.setItem('Wishlist-items', JSON.stringify(Wishlist.items));
  Wishlist.trigger('saved');
  return Wishlist;
};

Wishlist.empty =  function() {
  Wishlist.items = [];
  Wishlist.trigger('emptied');
  Wishlist.save();
  return Wishlist;
};

Wishlist.indexOfItem = function(id) {
  for (var i = 0; i<Wishlist.items.length; i++) {
    if (Wishlist.items[i].id===id) return i;
  }
  return null;
};

Wishlist.removeEmptyLines = function() {
  newItems = [];
  for (var i = 0; i<Wishlist.items.length; i++) {
    if (Wishlist.items[i].quantity>0) newItems.push(Wishlist.items[i]);
  }
  Wishlist.items = newItems;
  return Wishlist;
};

Wishlist.addItem = function(item,stock) {
  if (!item.quantity) item.quantity = 1;
  var index = Wishlist.indexOfItem(item.id);
  if (index===null) {
    Wishlist.items.push(item);
    toastr.success('Added to Wishlist');
  } else {
    Wishlist.removeItem(item);
  }
  Wishlist.removeEmptyLines();
  if (item.quantity > 0) {
    Wishlist.trigger('added', {item: item});
  } else {
    Wishlist.trigger('removed', {item: item});
  }
  Wishlist.save();
  return Wishlist;
};

Wishlist.addItemDetails = function(item,stock) {
  if (!item.quantity) item.quantity = 1;
  var index = Wishlist.indexOfItem(item.id);
  if (index===null) {
    Wishlist.items.push(item);
    toastr.success('Added to Wishlist');
  }
  Wishlist.removeEmptyLines();
  if (item.quantity > 0) {
    Wishlist.trigger('added', {item: item});
  }
  Wishlist.save();
  return Wishlist;
};

Wishlist.removeItem = function(item) {
  if (!item.quantity) item.quantity = 1;
  var index = Wishlist.indexOfItem(item.id);
    Wishlist.items[index]. quantity -= Wishlist.items[index]. quantity;
    Wishlist.removeEmptyLines();

    Wishlist.trigger('removed', {item: item});
    toastr.warning('Removed from wishlist');
    Wishlist.save();
    return Wishlist;
};

Wishlist.itemsCount = function() {
  var accumulator = 0;
  for (var i = 0; i<Wishlist.items.length; i++) {
    accumulator += Wishlist.items[i].quantity;
  }
  return accumulator;
};

Wishlist.currency = '৳';

Wishlist.displayPrice = function(price) {
  if (price===0) return '৳ 0';
  var floatPrice = price;
  var decimals = floatPrice==parseInt(floatPrice, 10) ? 0 : 2;
  return Wishlist.currency + floatPrice.toFixed(decimals);
};

Wishlist.linePrice = function(index) {
  return Wishlist.items[index].price * Wishlist.items[index].quantity;
};

Wishlist.subTotal = function() {
  var accumulator = 0;
  for (var i = 0; i<Wishlist.items.length; i++) {
    accumulator += Wishlist.linePrice(i);
  }
  return accumulator;
};

Wishlist.init = function() {
  var items = localStorage.getItem('Wishlist-items');
  if (items) {
    Wishlist.items = JSON.parse(items);
  } else {
    Wishlist.items = [];
  }
  Wishlist.callbacks = {};
  return Wishlist;
}

Wishlist.initJQuery = function() {

  Wishlist.init();

  Wishlist.templateCompiler = function(a,b){return function(c,d){return a.replace(/#{([^}]*)}/g,function(a,e){return Function("x","with(x)return "+e).call(c,d||b||{})})}};

  Wishlist.lineItemTemplate = "<div class='product product-Wishlist'>" +
    "<figure class='product-media'>"+
      "<a href='#'>"+
      "<img src='#{this.image}' alt='#{this.label}' width='80' height='88' />"+
      "</a>"+
      "<button class='btn btn-link btn-close Wishlist-remove' data-id='#{this.id}'>"+
      "<i class='fas fa-times'></i><span class='sr-only'>Close</span>"+
      "</button>"+
   "</figure>"+
   "<div class='product-detail'>"+
      "<a href='#' class='product-name'>#{this.label}</a>"+
      "<div class='price-box'>"+
         "<span class='product-quantity'>#{this.quantity}</span>"+
         "<span class='product-price'>#{Wishlist.displayPrice(this.price)}</span>"+
      "</div>"+
      "<div class='price-box'>"+
         "<span class='pointer Wishlist-add' data-id='#{this.id}' data-stock='#{this.stock}' data-quantity='-1'><img src='https://res.cloudinary.com/techdyno-bd/image/upload/c_scale,w_64/v1625417221/minus_gckp5a.png' width='20'></span>&nbsp;&nbsp"+
         "<span class='pointer Wishlist-add' data-id='#{this.id}' data-stock='#{this.stock}' data-quantity='1'><img src='https://res.cloudinary.com/techdyno-bd/image/upload/c_scale,w_64/v1625417221/plus_1_tim64z.png' width='20'></span>"+
      "</div>"+
   "</div>"+
"</div>";

Wishlist.lineItemTemplate1 = `<tr>
                        <td class="product-thumbnail">
                           <a href="#{this.slug}">
                              <figure>
                                 <img src="#{this.image}" width="100" height="100"
                                    alt="#{this.label}">
                              </figure>
                           </a>
                        </td>
                        <td class="product-name">
                           <a href="product-simple.html">Beige knitted elastic runner shoes</a>
                        </td>
                        <td class="product-name">
                           <span class="amount">#{Wishlist.displayPrice(this.price)}</span>
                        </td>
                        <td class="product-add-to-cart">
                           <a href="#{this.slug}" class="btn-product btn-primary"><span>Select Option</span></a>
                        </td>
                        <td class="product-remove">
                           <button class='btn btn-link btn-close Wishlist-remove' data-id='#{this.id}'>
      <i class='fas fa-times'></i><span class='sr-only'>Close</span>
      </button>
                        </td>
                     </tr>`;



$(document).on('click', '.wishlist-add', function(e) {
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
    Wishlist.addItem(item,stock);
});


$(document).on('click', '.wishlist-add-details', function(e) {
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
    Wishlist.addItemDetails(item,stock);
});



  $(document).on('click', '.Wishlist-remove', function(e) {
    e.preventDefault();
    var button = $(this);
    var item = {
      id: button.data('id'),
    }
    Wishlist.removeItem(item);
  });

  var updateReport = function() {
    var count = Wishlist.itemsCount();
    $('.Wishlist-count').text(count);
    $('.Wishlist-price').html(Wishlist.displayPrice(Wishlist.subTotal()));
    if (count===1) {
      $('.Wishlist-items-count-singular').show();
      $('.Wishlist-items-count-plural').hide();
    } else {
      $('.Wishlist-items-count-singular').hide();
      $('.Wishlist-items-count-plural').show();
    }
  };

  var updateWishlist = function() {
    if (Wishlist.items.length>0) {
      var template = Wishlist.templateCompiler(Wishlist.lineItemTemplate1);
      var lineItems = "";
      for (var i = 0; i<Wishlist.items.length; i++) {
        lineItems += template(Wishlist.items[i]);
        $(".check-wish-"+Wishlist.items[i].id).html('<i class="d-icon-heart-full"></i>');
        $(".check-wish-href-"+Wishlist.items[i].id).html('<i class="d-icon-heart-full"></i> Browse wishlist').addClass("added").attr("title", "Browse wishlist").attr("href", "/wishlist");

      }
      $('.Wishlist-side').html(lineItems);
      $('.Wishlist-box').show();
    } else {
      $('.Wishlist-data-1').html("<center><img src='https://res.cloudinary.com/techdyno-bd/image/upload/v1625472039/4496-empty-cart_cltgmg.gif' class='img-fluid'></center>");
      $('.Wishlist-box').hide();
    }
  };

  var update = function() {
    updateReport();
    updateWishlist();
  };
  var updateCount = function(){
    updateReport();
  }
  update();

  Wishlist.on('saved', updateCount);
  Wishlist.on('removed',update);

  return Wishlist;
};

