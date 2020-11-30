<?php


$lm = \Modules\Lc\Config\Handler::$lmenu;


?>


<menu>
    <?php
    foreach($lm as $l){

        echo '
        <div class="'.$l["class"].'"><a href="'.$l["url"].'">'.$l["name"].'</a></div>
            <hr size=2px width=250px align="center">
            ';
    }
    ?>
            
        </menu>

    </main>
</body>

</html>