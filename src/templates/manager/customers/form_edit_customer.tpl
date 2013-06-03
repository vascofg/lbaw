{include file="manager/header.tpl" active="customers"}
<form enctype="multipart/form-data" action='{$BASE_URL}actions/manager/customers/action_edit_customer.php' method='post' class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
    <div class="control required">
      <label for="username">Username:</label>
      <input class="ink-fv-required" type='text' name='username' value="{stripslashes($customer['username'])}">
    </div>
    <div>
      <label for="password">Password:</label>
      <input type='password' name='password' placeholder='Nova Password'>
    </div>
    <div class="control required">
      <label for="fllname">Fullname:</label>
      <input class="ink-fv-required" type='text' name='fullname' value="{stripslashes($customer['fullname'])}">
    </div>
    <div class="control required">
      <label for="email">Email:</label>
      <input class="ink-fv-required ink-fv-email" type='text' name='email' value="{stripslashes($customer['email'])}">
    </div>
     <div> 
      <img src="{if ($customer.picture!='')}data:image/jpeg;base64, {$customer.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
    <br>
      <label for="image">Alterar foto:</label>
      <div class="input-file"><input type="file" name="image" id="image"></div>
      <p class="tip">Apenas formato *.jpg ou *.jpeg e tamanho maximo de 1 MByte</p>
    </div> 
     <input type="hidden" name="id" value="{$customer['frequent_customerid']}"></input>
  </fieldset>
  <div>
    <input type='submit' value='Editar' class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}
