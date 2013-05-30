var products = [];

$(document).ready(function(){
	var cart = $("div.cart");
	cart.append("<div class=\"total\">Total: <span class=\"totalvalue\">0.00</span></div>");
	$(document).on("click", "div.products>div.product", function(event) {
    if(products.length==0) //first time
      document.getElementById("submit").disabled=false;
		var product = $(this);
    var productid = parseInt(product.attr("id"));
    var brandname = product.children("span.brandname").html();
    var name = product.children("span.name").html();
    var price = parseFloat(product.children("span.price").html()).toFixed(2);
    var productOnCart = $("div.cart>div.product[id="+productid+"]");
    if(productOnCart.length==0)
    {
    	var clone = product.clone().append("<span class=\"totalprice\">"+price+"</span>\
        <br>\
        <button class=\"icon-minus-sign sub\"></button>\
        <span class = \"quantity\">1</span>\
        <button class=\"icon-plus-sign add\"></button>\
        <button class=\"icon-remove-sign del\"></button>");
      clone.children("span.picture").remove();
		  cart.children("h4").after(clone);
      products.push({'id':productid,'quantity':1,'brandname':brandname,'name':name,'price':price});
      var totalValue = $("div.cart>div.total>span.totalvalue");
			totalValue.html((parseFloat(totalValue.html())+price).toFixed(2));
    }
    else
      addQuantity(productOnCart);  
	});
	$(document).on("click", "div.cart>div.product button.del", function(event) {
		var product = $(this).parent();
		removeProduct(product);
    if(products.length==0)
      document.getElementById("submit").disabled = true;
	});
  $(document).on("click", "div.cart>div.product button.add", function(event) {
    var product = $(this).parent();
    addQuantity(product);
  });
  $(document).on("click", "div.cart>div.product button.sub", function(event) {
    var product = $(this).parent();
    subQuantity(product);
  });
  $("button.submit").click(function() {
    var string="";
    $.each( products, function( i, val ) {
      string+=val['brandname']+' '+val['name']+' '+val['price']+'\n';
    });
    alert(string);
  });
});

function addQuantity(product){
   var productid = parseInt(product.attr("id"));
   var productInArray = getProductByID(productid);
   var maxQuantity =  parseInt(product.attr("data-quantity"));
   if(productInArray['quantity']<maxQuantity)
   {
   	 var quantityElem = product.children("span.quantity");
		 var price = parseFloat(product.children("span.price").html());
		 var totalElem = product.children("span.totalprice");
		 productInArray['quantity']+=1;
		 quantityElem.html(productInArray['quantity']);
		 totalElem.html((price*productInArray['quantity']).toFixed(2));
		 var totalValue = $("div.cart>div.total>span.totalvalue");
		 totalValue.html((parseFloat(totalValue.html())+price).toFixed(2));
   }
}

function subQuantity(product){
  var productid = parseInt(product.attr("id"));
  var productInArray = getProductByID(productid);
  if(productInArray['quantity']>1)
  {
    var quantityElem = product.children("span.quantity");
    var price = parseFloat(product.children("span.price").html());
    var totalElem = product.children("span.totalprice");
    productInArray['quantity']-=1;
    quantityElem.html(productInArray['quantity']);
    totalElem.html((price*productInArray['quantity']).toFixed(2));
    updateTotal();
    var totalValue = $("div.cart>div.total>span.totalvalue");
		totalValue.html((parseFloat(totalValue.html())-price).toFixed(2));
  }
}

function removeProduct(product){
  var productid = parseInt(product.attr("id"));
  products = removeItemByID(productid);
  product.remove();
  updateTotal();
}

function getProductByID(id){
  return $.grep(products, function(e){ return e.id === id; })[0];
}

function removeItemByID(id){
  return $.grep(products, function(e){ return e.id !== id; });
}

function updateTotal(price){
  var totalValue = $("div.cart>div.total>span.totalvalue");
	totalValue.html((parseFloat(totalValue.html())+price).toFixed(2));
}
