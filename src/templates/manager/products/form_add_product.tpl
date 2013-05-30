{include file="manager/header.tpl" active="products"}
<form method="post" action="{$BASE_URL}actions/manager/products/action_add_product.php" class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
    <legend>Novo produto</legend>
    <div class="control required">
      <label for="name">Nome:</label>
      <input class="ink-fv-required" type='text' name='name' id='name'>
    </div>
    <div class="control required">
      <label for="price">Preço:</label>
      <input class="ink-fv-required ink-fv-number" type='text' name='price' id='price'>
    </div>
    <div class="control required">
      <label for="quantity">Quantidade:</label>
      <input class="ink-fv-required ink-fv-number" type='text' name='quantity' id='quantity'>
    </div>
    <div class="control required">
      <label for="brand">Marca:</label>
      <select name='brandid' id='brand'>
        {foreach $brands as $brand}
          <option value='{$brand.brandid}'>{$brand.name}</option>
        {/foreach}
        <option value='other'>Outra</option>
      </select>
      <input type='text' name='newbrand'>
    </div>
  </fieldset>
  <div>
    <input type="submit" value="Adicionar" class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}
