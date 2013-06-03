var numpages=parseInt($(".customers-pagination").attr("data-numpages"));
var search = "";

function getCustomers(page, first){
  $.ajax({ url: '../../../ajax/customers/ajax_get_customers.php',
		 data: {search: search,
		 			pagenr: page},
		 type: 'post',
		 success: function(output) {
					var tablebody = $("table.customers > tbody");
          var parsed = $.parseJSON(output);
					var customers = parsed.customers;
					tablebody.empty();
					if(customers.length==0)
          {
            $(".customers-pagination").attr("data-numpages",numpages);
						tablebody.append('<tr><td colspan=3>Sem resultados...</td></tr>');
          }
					else
          {
						for(var i in customers)
							tablebody.append('<tr><td>'+stripslashes(customers[i].username)+'</td><td>'+stripslashes(customers[i].fullname)+'</td><td><a href="view_operator.php?id='+customers[i].posoperatorid+'"><i class="icon-th-list"></i></a></tr>');
          }
          if(first)
          {
            numpages=parseInt(parsed.numpages);
            $(".customers-pagination").attr("data-numpages",numpages);
            pagination.setSize(numpages);
          }
		}
  });
}

var pagination = new SAPO.Ink.Pagination(
                  '.customers-pagination',
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
                        getCustomers(pag.getCurrent(), false);
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
      getCustomers(0, true);
    }, 500);
	});
});
