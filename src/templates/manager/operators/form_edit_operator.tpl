{include file="manager/header.tpl" active="operators"}
<form enctype="multipart/form-data" action='{$BASE_URL}actions/manager/operators/action_edit_operator.php' method='post' class="ink-form block" onsubmit="return SAPO.Ink.FormValidator.validate(this);">
  <fieldset>
    <div class="control required">
      <label for="username">Username:</label>
      <input class="ink-fv-required" type='text' name='username' value="{stripslashes($operator['username'])}">
    </div>
    <div>
      <label for="password">Password:</label>
      <input type='password' name='password' placeholder="Nova Password">
    </div>
    <div class="control required">
      <label for="fllname">Fullname:</label>
      <input class="ink-fv-required" type='text' name='fullname' value="{stripslashes($operator['fullname'])}">
    </div>
    <div class="control required">
      <label for="email">Email:</label>
      <input class="ink-fv-required ink-fv-email" type='text' name='email' value="{stripslashes($operator['email'])}">
    </div>
     <div>
      <img src="{if ($operator.picture!='')}data:image/jpeg;base64, {$operator.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
      <br>
      <div>
          <label for="delete-image">Apagar foto</label>
          <input type="checkbox" name="delete-image" id="delete-image">
      </div>
        <br>
      <div> 
      <label for="image">Alterar foto:</label>
      <div class="input-file"><input type="file" name="image" id="image"></div>
      <p class="tip">Apenas formato *.jpg ou *.jpeg e tamanho maximo de 1 MByte</p>
      </div>
    </div>
    <input type="hidden" name="id" value="{$operator['pos_operatorid']}"></input>
  </fieldset>
  <div>
    <input type='submit' value='Editar' class="ink-button success">
  </div>
</form>
{include file="manager/footer.tpl"}
