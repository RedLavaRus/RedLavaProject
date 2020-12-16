<?php
foreach(\Modules\CRMPhone\Config\Handler::$clientinfo->object as $ct){
    
    $sl = $ct;
}
//var_dump($ct);
//$string = serialize( $array );

$array_history = unserialize( $sl["history"] );


?>
           

<div >

<form action="/lc/showclient/"  method="post"  class="table">
    <div class="table_up">
        <div class="form">Макро регион
            <div class="text_form"><?php echo $sl["region"];?></div>
        </div>
        <div class="form">Город
            <div class="text_form"><?php echo $sl["sity"];?></div>
        </div>
        <div class="form">Адрес
            <div class="text_form"><?php echo $sl["adres"];?></div>
        </div>
        <div class="form">ФИО
            <div class="text_form"><?php echo $sl["fio"];?></div>
        </div>
        <div class="form">Телефон
            <div class="text_form"><?php echo $sl["phone1"];?></div>
        </div>
        <div class="form">Дополннительный телефон
            <div class="text_form">
            <?php echo $sl["phone2"];?>
            <?php echo $sl["phone3"];?>
            <?php echo $sl["phone4"];?>
            
            </div>
        </div>
    </div>
    <?php
    
    
    $array[0]["id_agent"] = "Гакман Владлена";
    $array[0]["date"] = "01.10.20";
    $array[0]["status"] = "думает";
    $array[0]["comment"] = "Абоненту интересно, советуется с женой, звонить 05.10.20";
    $ttr = serialize($array);
    //var_dump($ttr);echo "<br><br><br>";
    $array_hist = unserialize($sl["history"]);
?>
    <div class="table_up">
    <?php
foreach($array_hist as  $his){
    

    echo '<div class="form_left ">'.$his["id_agent"].'
    <div class="data ">'.$his["date"].'</div>
    <div class="status marg">'.$his["status"].' </div>
    <div class="comment marg">'.$his["comment"].'</div>
    </div>';
}

?>
        
    </div>
    <div class="table_down">
        <div class="table_down_left">
            <div class="box">
                <label> <p class="input"><input name="dzen" type="radio" value="no_reply" checked> Не ответил</p></label>
                <p class="input"><input name="dzen" type="radio" value="Unavailable"> Недоступен</p>
                <p class="input"><input name="dzen" type="radio" value="ttk" >Абонент ТТК</p>
                <p class="input"><input name="dzen" type="radio" value="No_DHW"> Нет ТХВ</p>
            </div>
            <div class="box">
                <p class="input"><input name="dzen" type="radio" value="envelope"> Конверт</p>
                <p class="input"><input name="dzen" type="radio" value="refusal" > Отказ</p>
                <p class="input"><input name="dzen" type="radio" value="rude_refusal"> Грубый отказ</p>
                <p class="input"><input name="dzen" type="radio" value="thinks"> Думает</p>
                <p class="input"><input name="dzen" type="radio" value="application" >Заявка</p>
            </div>
        </div>
        <div class="table_down_right">
            Дата следующего действия
            <input class="form_rigt_input" type="text" size="40" name="date_lts">
            <input  type="hidden"  size="40" name="id" value="<?php echo $sl["id"];?>">
            <p>Комментарий
                <Br>
                <textarea class="form_rigt_area" name="comment" cols="40" rows="3"></textarea></p>
            <div class="form_right_button">
                <div class="button_red">Выход</div>
                <button value="ок" class="button_green"></button>
                
            </div>
        </div>
    </div>
        </form>

</div>
</div>
