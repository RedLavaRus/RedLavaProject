
<?php

$url_tech = \Core\Values\Val::$helper["url"]["url"][1];

if($url_tech == "zayavki"){$style["1"] = "applications_active";}else{$style["1"] = "applications";}
if($url_tech == "connect"){$style["2"] = "connections_active";}else{$style["2"] = "connections";}
if($url_tech == "grafic"){$style["3"] = "chart_active";}else{$style["3"] = "chart";}
if($url_tech == "znanie"){$style["4"] = "training_active";}else{$style["4"] = "training";}
if($url_tech == "vizov"){$style["5"] = "challenge_active";}else{$style["5"] = "challenge";}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/template/defaults/css/stylebroad.css">
</head>

<body>
    <div class="menu">
        <div class="menu2">
            <a href="/broad/zayavki/"><div class="<?php echo $style["1"];?>">Заявки</div></a>
            <a href="/broad/connect/"><div class="<?php echo $style["2"];?>">Подключение</div></a>
            <a href="/broad/grafic/"><div class="<?php echo $style["3"];?>">График</div></a>
            <a href="/broad/znanie/"><div class="<?php echo $style["4"];?>">Обучение</div></a>
            <a href="/broad/vizov/"><div class="<?php echo $style["5"];?>">Вызов</div></a>
        </div>
    </div>

