{include file="operator/header.tpl"}
<form action='{$BASE_URL}actions/operator/auth/action_login.php' method='post' class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
	<fieldset>
    <div class="control">
      <label for="username">Username:</label>
      <input class="ink-fv-required" type='text' name='username'>
    </div>
    <div class="control">
      <label for="password">Password:</label>
      <input class="ink-fv-required" type='password' name='password'>
    </div>
  </fieldset>
  <div>
    <input type='submit' value='Login' class="ink-button success">
  </div>
</form>
{include file="operator/footer.tpl"}
