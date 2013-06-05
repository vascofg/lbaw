{include file="manager/header.tpl" active="operators"}
<div class="operator">
	<div class="picture-column">
		<img src="{if ($operator.picture!='')}data:image/jpeg;base64, {$operator.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
	</div>
	<div>
    {stripslashes($operator.username)}<br>
    {stripslashes($operator.fullname)}<br>
    {stripslashes($operator.email)}<br>
    <br>
    <a href="{$BASE_URL}pages/manager/operators/edit_operator.php?id={$operator.pos_operatorid}">Editar</a> 
    <br>
    <a href="{$BASE_URL}actions/manager/operators/action_delete_operator.php?id={$operator.pos_operatorid}">Remover</a>  
  </div>
</div>
<div id="vis"></div>
{include file="manager/footer.tpl"}
<script src="http://trifacta.github.com/vega/d3.v3.min.js"></script>
<script src="http://trifacta.github.com/vega/vega.js"></script>
<script src="http://trifacta.github.com/vega/d3.geo.projection.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
	{literal}
	// parse a spec and create a visualization view
	function parse(spec) {
		vg.parse.spec(spec, function(chart) { chart({el:"#vis"}).update(); });
	}
	parse($.parseJSON('{/literal}{$graph}{literal}'));
</script>
{/literal}
