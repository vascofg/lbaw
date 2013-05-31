var numpages=parseInt($(".brands-pagination").attr("data-numpages"));
var search = "";

function getBrands(page, first){
  $.ajax({ url: '../../../ajax/brands/ajax_get_brands.php',
		 data: {search: search,
		 			pagenr: page},
		 type: 'post',
		 success: function(output) {
					var tablebody = $("table.brands > tbody");
          var parsed = $.parseJSON(output);
					var brands = parsed.brands;
					tablebody.empty();
					if(brands.length==0)
          {
            $(".brands-pagination").attr("data-numpages",numpages);
						tablebody.append('<tr><td colspan=3>Sem resultados...</td></tr>');
          }
					else
          {
						for(var i in brands)
							tablebody.append('<tr><td width="80%">'+brands[i].name+'</td><td width="10%">'+brands[i].usage+'</td><td width="10%">'+(brands[i].usage==0?('<a href="../../../actions/manager/brands/action_delete_brand.php?id='+brands[i].brandid+'">'):'')+'<i class="icon-remove"></i>'+(brands[i].usage==0?'</a>':'')+'</td></tr>');
          }
          if(first)
          {
            numpages=parseInt(parsed.numpages);
            $(".brands-pagination").attr("data-numpages",numpages);
            pagination.setSize(numpages);
          }
		}
  });
}

var pagination = new SAPO.Ink.Pagination(
                  '.brands-pagination',
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
                        getBrands(pag.getCurrent(), false);
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
      getBrands(0, true);
    }, 500);
	});
});
