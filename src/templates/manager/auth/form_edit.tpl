{include file="manager/header.tpl" active="managers"}
<form enctype="multipart/form-data" action='{$BASE_URL}actions/manager/auth/action_edit.php' method='post' class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
	<div class="control required">
		<label for="username">Username:</label>
		<input class="ink-fv-required" type='text' name='username' value="{stripslashes($manager['username'])}">
	</div>
	<div>
		<label for="password">Password:</label>
		<input type='password' name='password' placeholder="Nova Password">
	</div>
	<div class="control required">
		<label for="fullname">Fullname:</label>
		<input class="ink-fv-required" type='text' name='fullname' value="{stripslashes($manager['fullname'])}">
	</div>
	<div class="control required">
		<label for="email">Email:</label>
		<input class="ink-fv-required ink-fv-email" type='text' name='email' value="{stripslashes($manager['email'])}">
	</div>
	<div>
		<img src="{if ($manager.picture!='')}data:image/jpeg;base64, {$manager.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
		<br>
      <label for="image">Alterar foto:</label>
      <div class="input-file"><input type="file" name="image" id="image"></div>
      <p class="tip">Apenas formato *.jpg ou *.jpeg e tamanho maximo de 1 MByte</p>
    </div>
    <input type="hidden" name="id" value="{$manager['system_managerid']}"></input>
  </fieldset>
  <div>
    <input type="submit" value="Editar" class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}
