var numpages=parseInt($(".products-pagination").attr("data-numpages"));
var search = "";

function getProducts(page, first){
  $.ajax({ url: '../../../ajax/products/ajax_get_products.php',
		 data: {search: search,
            pagenr: page},
		 type: 'post',
		 success: function(output) {
					var tablebody = $("table.products > tbody");
          var parsed = $.parseJSON(output);
					var products = parsed.products;
					tablebody.empty();
					if(products.length==0)
          {
            $(".products-pagination").attr("data-numpages",numpages);
						tablebody.append('<tr><td colspan=5>Sem resultados...</td></tr>');
          }
					else
          {
						for(var i in products)
							tablebody.append('<tr><td>'+products[i].brandname+'</td><td>'+products[i].name+'</td><td>'+products[i].price+'€</td><td>'+products[i].quantity+'</td><td><a href="../../pages/manager/products/view_product.php?id='+products[i].productid+'"><i class="icon-th-list"></i></a></td></tr>');
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
