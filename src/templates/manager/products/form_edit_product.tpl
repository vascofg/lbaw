{include file="manager/header.tpl" active="products"}
<form enctype="multipart/form-data" method="post" action="{$BASE_URL}actions/manager/products/action_edit_product.php" class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
    <div class="control required">
      <label for="name">Nome:</label>
      <input class="ink-fv-required" type='text' name='name' id='name' value='{$product["name"]}'>
    </div>
    <div class="control required">
      <label for="price">Preço:</label>
      <input class="ink-fv-required ink-fv-number" type='text' name='price' id='price' value='{$product["price"]}'>
    </div>
    <div class="control required">
      <label for="quantity">Quantidade:</label>
      <input class="ink-fv-required ink-fv-number" type='text' name='quantity' id='quantity' value='{$product["quantity"]}'>
    </div>
    <div class="control required">
      <label for="brand">Marca:</label>
      <select name='brandid' id='brand'>
        {foreach $brands as $brand}
          <option value='{$brand.brandid}' {if $brand.brandid == $product['brandid']}selected{/if}>{$brand.name}</option>
        {/foreach}
        <option value='other'>Outra</option>
      </select>
      <input type='text' name='newbrand'>
    </div>
    <div>
      <label for="description">Descrição:</label>
      <textarea name='description' id='description'>{$product['description']}</textarea>
    </div>
    <div>
      <label for="image">Imagem:</label>
      <img src="{if ($product.picture!='')}data:image/jpeg;base64, {$product.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">   
      <div class="input-file"><input type="file" name="image" id="image"></div>
      <p class="tip">Apenas formato *.jpg ou *.jpeg e tamanho maximo de 1 MByte</p>
    </div>
    <input type="hidden" name="id" value="{$product['productid']}"></input>
  </fieldset>
  <div>
    <input type="submit" value="Editar" class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}
