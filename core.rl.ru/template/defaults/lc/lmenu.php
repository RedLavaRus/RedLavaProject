<?php


$lm = \Modules\Lc\Config\Handler::$lmenu;


?>


<menu>
    <?php
    foreach($lm as $l){

        echo '
        <div class="'.$l["class"].'"><a href="'.$l["url"].'"><img src="\template\defaults\img\lmenu\\'.$l["id"].'.png"><br>'.$l["name"].'</a></div>
            ';
    }
    ?>
            
        </menu>

    </main>
</body>

</html>