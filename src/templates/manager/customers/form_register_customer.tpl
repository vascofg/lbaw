{include file="manager/header.tpl" active="customers"}
<form action='{$BASE_URL}actions/manager/customers/action_register_customer.php' method='post' class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
    <div class="control required">
      <label for="username">Username:</label>
      <input class="ink-fv-required" type='text' name='username'>
    </div>
    <div class="control required">
      <label for="password">Password:</label>
      <input class="ink-fv-required" type='password' name='password'>
    </div>
    <div class="control required">
      <label for="fllname">Fullname:</label>
      <input class="ink-fv-required" type='text' name='fullname'>
    </div>
    <div class="control required">
      <label for="email">Email:</label>
      <input class="ink-fv-required ink-fv-email" type='text' name='email'>
    </div>
  </fieldset>
  <div>
    <input type='submit' value='Adicionar' class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}