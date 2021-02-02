<?php
$based = \Core\Values\Val::$helper["Thinks"]->object;


?>
           

<div >

<table class="tr_acm">
<tr ><td class="head_acm">#Номер</td><td class="head_acm">ФИО</td><td class="head_acm">Дата следующего<br>звонка</td><td class="head_acm">Показать<br>клиента</td><td class="head_acm">Удалить<br>клиента</td><td class="head_acm">Статус</td></tr>
<?php
$pre_date = time() - 7200;
$post_date = time() + 7200;
foreach($based as  $bd){
    $st = 'status_green">Пора';
    if($bd["date_last"] >= $post_date ) $st = 'status_yellow">Рано';
    if($bd["date_last"] <= $pre_date ) $st = 'status_red">Поздно';
//var_dump("<pre>",$bd,"</pre>");
echo '<tr class="tr_acm">';
echo '    <td>'.$bd["id"].'</td>';
echo '    <td>'.$bd["fio"].'</td>';
echo '    <td>'.date("d.m.Y H:i", $bd["date_last"]).'</td>';
echo '    <td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td>';
echo '    <td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td>';
echo '    <td class="'.$st.'</td>';
echo '</tr>';
}
?>


<?php
/*
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_red">Просрочен</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue2"><img src="/template/defaults/img/crmphone/eye.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_green">Сейчас</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_yellow">Рано</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_red">Просрочен</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue2"><img src="/template/defaults/img/crmphone/eye.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_green">Сейчас</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_yellow">Рано</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_red">Просрочен</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue2"><img src="/template/defaults/img/crmphone/eye.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_green">Сейчас</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_yellow">Рано</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_red">Просрочен</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue2"><img src="/template/defaults/img/crmphone/eye.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_green">Сейчас</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_yellow">Рано</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_red">Просрочен</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue2"><img src="/template/defaults/img/crmphone/eye.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_green">Сейчас</td></tr>
<tr class="tr_acm"><td>001</td><td>Иванов Иван Иванович</td><td>10.01.2021</td><td class="blue1"><img src="/template/defaults/img/crmphone/blink.png"></td><td class="close"><img src="/template/defaults/img/crmphone/cancel.png"></td><td class="status_yellow">Рано</td></tr>
*/
?>

</table>

</div>
</div>
