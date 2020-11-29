<?php


?>
<div class="core_user_reg_block flex_row block_father">
    <div class="flex2"> </div>
    <div class="flex8 flex_row core_user_reg_block_main">
        <div class="flex4 red">

        <p class="head_welcom">Рады снова вас видеть!</p>
        <p class="text_welcom">Если у вас до сих пор нет аккаунта, тогд пройдите бесплатную регистрацию.</p>
        <a href = "/user/reg/"><div class="enter_box">Регистрация</div></a>
        </div>
        <div class="flex4 white">
        <form class="form_enter_bbox"  method="post">
        <p class="head_reg">Авторизация</p>
        <span>Логин* </span><span class="red"><?php echo \Core\User\CollectorError::$error_login; ?> </span><br>
        <input type="text" name="login" placeholder="Логин" size="18" class="text_forma"/><br><br>
        <span>Пароль* </span><span class="red"><?php echo \Core\User\CollectorError::$error_pass; ?>  </span><br>
        <input type="password" name="pass1" placeholder="Пароль" size="18"  class="text_forma"/><br><br>
        <button class="enter_box_red" value="t54332" name="get_rec">Авторизоваться</button>
        </form>
        </div>




    </div>
    <div class="flex2">
 
    </div>

</div>

