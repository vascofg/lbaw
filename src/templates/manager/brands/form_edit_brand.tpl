{include file="manager/header.tpl" active="brand"}
<form  method="post" action="{$BASE_URL}actions/manager/brands/action_edit_brand.php" class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
    <div class="control required">
      <label for="name">Nome:</label>
      <input class="ink-fv-required" type='text' name='name' id='name' value="{stripslashes($brand['name'])}">
    </div>
    <input type="hidden" name="id" value="{$brand['brandid']}"></input>
  </fieldset>
  <div>
    <input type="submit" value="Editar" class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}
