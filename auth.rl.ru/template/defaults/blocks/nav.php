<div class="header">
    <div class="header_box"><br>
    <div class="nav_panel">
                <div class="logotipe flex_row flex_mar flex2">
                    <img src="<?php echo $config::$logo_name_url;?>" alt="logo redlava" class="logo" />
                </div>
                <div class="nav_group_items flex_row flex_mar flex6 ">
                <?php
                    $arra_ellement_nav = explode("|", $config::$nav_element);

                    foreach($arra_ellement_nav as $element){
                        echo '<div class="nav_panel_element">'.$element.'</div>';
                    }
                ?>
                    
                    

                </div>
                <div class="phone flex_row flex2"><?php echo $config::$phone;?></div>
                <div class="login_auth_in flex_row flex_mar flex2">
                    <div class="button_login">
                        
                    <?php if(isset($_SESSION["id"]) and $_SESSION["id"] >= 1) {
                        echo "<a href='/'>Личный кабинет</a>";
                    } else{

                     echo "<a href='/user/auth/'>Вход</a>";}?>
                
                    </div>
                </div>
            </div>