var products = [];

$(document).ready(function(){
	var cart = $("div.cart");
	$(document).on("click", "div.products>div.product", function(event) {
    if(products.length==0) //first time
      document.getElementById("submit").disabled=false;
		var product = $(this);
    var productid = parseInt(product.attr("id"));
    var brandname = product.children("span.brandname").html();
    var name = product.children("span.name").html();
    var price = parseFloat(product.children("span.price").html()).toFixed(2);
    var productOnCart = $("div.cart>div.product[id="+productid+"]");
    if(productOnCart.length==0) //isn't on cart yet
    {
      var clonedProduct = product.clone().append("<span class=\"productTotal\">"+price+"€</span>\
        <br>\
        <button class=\"icon-minus-sign sub\"></button>\
        <span class = \"quantity\">1</span>\
        <button class=\"icon-plus-sign add\"></button>\
        <button class=\"icon-remove-sign del\"></button>");
      clonedProduct.children("span.picture").remove();
		  cart.children("h4").after(clonedProduct);
      products.push({'id':productid,'quantity':1,'brandname':brandname,'name':name,'price':parseFloat(price)}); //add to array
      updateTotal(parseFloat(price), true);
    }
    else //already exists, just update quantity
      changeQuantity(productOnCart, true);
	});
	$(document).on("click", "div.cart>div.product button.del", function(event) {
		var product = $(this).parent();
		removeProduct(product);
    if(products.length==0)
      document.getElementById("submit").disabled = true;
	});
  $(document).on("click", "div.cart>div.product button.add", function(event) {
    var product = $(this).parent();
    changeQuantity(product, true);
  });
  $(document).on("click", "div.cart>div.product button.sub", function(event) {
    var product = $(this).parent();
    changeQuantity(product, false);
  });
  $("button.submit").click(function() {
    var string="";
    $.each( products, function( i, val ) {
      string+=val['brandname']+' '+val['name']+' '+val['price']+'\n';
    });
    alert(string);
  });
});

function changeQuantity(product, up){
   var productid = parseInt(product.attr("id"));
   var productInArray = getProductByID(productid);
   if((!up && productInArray['quantity']>1)||(up && productInArray['quantity']<parseInt(product.attr("data-quantity"))))
   {
   	 var quantityElem = product.children("span.quantity");
		 var price = productInArray['price'];
		 var productTotal = product.children("span.productTotal");
		 productInArray['quantity']+=(up?1:-1);
		 quantityElem.html(productInArray['quantity']);
		 productTotal.html((price*productInArray['quantity']).toFixed(2)+'€');
		 updateTotal(price, up);
   }
}

function removeProduct(product){
  var productid = parseInt(product.attr("id"));
  var productInArray = getProductByID(productid);
  var price = productInArray['price'];
  var quantity = productInArray['quantity'];
  products = removeItemByID(productid);
  updateTotal(price*quantity, false);
  product.remove();
}

function updateTotal(value, up){
  var total = $("div.cart>div.total>span.total");
	total.html((parseFloat(total.html())+value*(up?1:-1)).toFixed(2)+'€');
}

function getProductByID(id){
  return $.grep(products, function(e){ return e.id === id; })[0];
}

function removeItemByID(id){
  return $.grep(products, function(e){ return e.id !== id; });
}

var numpages=parseInt($(".products-pagination").attr("data-numpages"));
var search = "";

function getProducts(page, first){
  $.ajax({ url: '../../ajax/products/ajax_get_products.php',
		 data: {search: search,
            pagenr: page},
		 type: 'post',
		 success: function(output) {
					var divProducts = $("div.products");
          var parsed = $.parseJSON(output);
					var products = parsed.products;
					divProducts.empty();
					if(products.length==0)
          {
            $(".products-pagination").attr("data-numpages",numpages);
						divProducts.append('Sem resultados...');
          }
					else
          {
          	for(var i in products)
							divProducts.append('<div class="product" id="'+products[i].productid+'" data-quantity="'+products[i].quantity+'"><span class="picture"><img src="../../img/img-not-available.png"><br></span><span class="brandname">'+products[i].brandname+'</span> <span class="name">'+products[i].name+'</span><br><span class="price">'+products[i].price+'€</span></div>');
          }
          if(first)
          {
            numpages=parseInt(parsed.numpages);
            $(".products-pagination").attr("data-numpages",numpages);
            pagination.setSize(numpages);
          }
		}
  });
}

var pagination = new SAPO.Ink.Pagination(
                  '.products-pagination',
                  {
                      size:     numpages,
                      maxSize:  5,
                      firstLabel:       '|<<',
                      lastLabel:         '>>|',
                      previousPageLabel: '<<',
                      nextPageLabel:     '>>',
                      previousLabel:     '<',
                      nextLabel:         '>',
                      onChange: function(pag)
                      {
                        getProducts(pag.getCurrent(), false);
                      }
                  }
);

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

$(document).ready(function(){
	$("input:text[name='search']").keyup(function()
	{
  		search=$.trim($("input:text[name='search']").val());
		delay(function(){
      getProducts(0, true);
    }, 500);
	});
});
