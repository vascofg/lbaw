{include file="customer/header.tpl" active="stats"}
<div id="vis"></div>
{include file="customer/footer.tpl"}
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
