<!DOCTYPE HTML>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Название страницы</title>
    <link rel="stylesheet" type="text/css" href="\template\defaults\css\styilelc.css" />

</head>

<body>
    <main>
        <div class="work_zone">
            <nav>
                <div class="item_nav">Агент</div>
                <div class="item_nav">
                <?php
                $dd = new \Modules\ExpansionUser\Config\Handler;
                echo $dd -> showFIO($_SESSION["id"], "min");
                ?></div>
            </nav>