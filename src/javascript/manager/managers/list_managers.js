var numpages=parseInt($(".managers-pagination").attr("data-numpages"));
var search = "";

function getManagers(page, first){
  $.ajax({ url: '../../../ajax/managers/ajax_get_managers.php',
		 data: {search: search,
		 			pagenr: page},
		 type: 'post',
		 success: function(output) {
					var tablebody = $("table.managers > tbody");
          var parsed = $.parseJSON(output);
					var managers = parsed.managers;
					tablebody.empty();
					if(managers.length==0)
          {
            $(".managers-pagination").attr("data-numpages",numpages);
						tablebody.append('<tr><td colspan=3>Sem resultados...</td></tr>');
          }
					else
          {
						for(var i in managers)
							tablebody.append('<tr><td>'+managers[i].username+'</td><td>'+managers[i].fullname+'</td><td><a href="view_manager.php?id='+managers[i].system_managerid+'"><i class="icon-th-list"></i></a></tr>');
          }
          if(first)
          {
            numpages=parseInt(parsed.numpages);
            $(".managers-pagination").attr("data-numpages",numpages);
            pagination.setSize(numpages);
          }
		}
  });
}

var pagination = new SAPO.Ink.Pagination(
                  '.managers-pagination',
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
                        getManagers(pag.getCurrent(), false);
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
      getManagers(0, true);
    }, 500);
	});
});
