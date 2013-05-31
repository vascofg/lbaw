var numpages=parseInt($(".operators-pagination").attr("data-numpages"));
var search = "";

function getOperators(page, first){
  $.ajax({ url: '../../../ajax/operators/ajax_get_operators.php',
		 data: {search: search,
		 			pagenr: page},
		 type: 'post',
		 success: function(output) {
					var tablebody = $("table.operators > tbody");
          var parsed = $.parseJSON(output);
					var operators = parsed.operators;
					tablebody.empty();
					if(operators.length==0)
          {
            $(".operators-pagination").attr("data-numpages",numpages);
						tablebody.append('<tr><td colspan=3>Sem resultados...</td></tr>');
          }
					else
          {
						for(var i in operators)
							tablebody.append('<tr><td>'+operators[i].username+'</td><td>'+operators[i].fullname+'</td><td><a href="view_operator.php?id='+operators[i].posoperatorid+'"><i class="icon-th-list"></i></a></tr>');
          }
          if(first)
          {
            numpages=parseInt(parsed.numpages);
            $(".operators-pagination").attr("data-numpages",numpages);
            pagination.setSize(numpages);
          }
		}
  });
}

var pagination = new SAPO.Ink.Pagination(
                  '.operators-pagination',
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
                        getOperators(pag.getCurrent(), false);
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
      getOperators(0, true);
    }, 500);
	});
});
