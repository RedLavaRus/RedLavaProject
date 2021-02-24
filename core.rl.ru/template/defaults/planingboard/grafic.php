
    <div class="main">
<?php
$orm1 = new \Core\Orm\Orm;
$res1 = $orm1->select("idagent,	vih_pn,vih_vt,vih_sr,vih_ch,vih_pt,vih_cb,vih_vs,type_pn,type_vt,type_sr,type_ch,type_pt,type_cb,type_vs")
->from("broad_graf")->execute()->object();


foreach($res1->object as $rr){
    $usr = $rr['idagent'];

        $orm2 = new \Core\Orm\Orm;
        $res2 = $orm2->select("last_name,name")
        ->where("id_user = $usr")
        ->from("expansion_user")->limit("1")->execute()->object();

        $rr['name'] = $res2->object[0]["last_name"]." ".$res2->object[0]["name"];
        
        echo '<div class="agent">
        <div class="name">'.$rr['name'].'</div>
        <div class="avatar"><img src="/template/defaults/img/broad/ava.png" alt=""></div>
        <div class="calendar">
            <div class="day_size">
                <div class="time " style="color: #'.$rr['type_pn'].'; ">'.$rr['vih_pn'].'</div>
                <div class="data " style="color: #'.$rr['type_pn'].'; ">ПОНЕДЕЛЬНИК</div>
            </div>
            <div class="day_size">
                <div class="time " style="color: #'.$rr['type_vt'].'; ">'.$rr['vih_vt'].'</div>
                <div class="data " style="color: #'.$rr['type_vt'].'; ">ВТОРНИК</div>
            </div>
            <div class="day_size">
                <div class="time " style="color: #'.$rr['type_sr'].'; ">'.$rr['vih_sr'].'</div>
                <div class="data " style="color: #'.$rr['type_sr'].'; ">СРЕДА</div>
            </div>
            <div class="day_size">
                <div class="time " style="color: #'.$rr['type_ch'].'; ">'.$rr['vih_ch'].'</div>
                <div class="data " style="color: #'.$rr['type_ch'].'; ">ЧЕТВЕРГ</div>
            </div>
            <div class="day_size">
                <div class="time " style="color: #'.$rr['type_pt'].'; ">'.$rr['vih_pt'].'</div>
                <div class="data " style="color: #'.$rr['type_pt'].'; ">ПЯТНИЦА</div>
            </div>
            <div class="day_size ">
                <div class="time " style="color: #'.$rr['type_cb'].'; ">'.$rr['vih_cb'].'</div>
                <div class="data " style="color: #'.$rr['type_cb'].'; ">СУББОТА</div>
            </div>
            <div class="day_size ">
                <div class="time " style="color: #'.$rr['type_vs'].'; ">'.$rr['vih_vs'].'</div>
                <div class="data " style="color: #'.$rr['type_vs'].'; ">ВОСКРЕСЕНИЕ</div>
            </div>
        </div>
    </div>';
}
?>
        
    <div class="panel ">
        <div class="legend ">
            <div class="title ">Легенда</div>
            <div class="weekend parametre "> Выходной
                <div class="circle color_1 "></div>
            </div>
            <div class="bypass parametre ">Обход
                <div class="circle color_2 "></div>
            </div>
            <div class="proring parametre ">Прозвон
                <div class="circle color_3 "></div>
            </div>
            <div class="posting parametre ">Расклейка
                <div class="circle color_4 "></div>
            </div>
            <div class="task_one parametre ">Задача 1
                <div class="circle color_5 "></div>
            </div>
            <div class="task_two parametre ">Задача 2
                <div class="circle color_6 "></div>
            </div>
        </div>
        <div class="today ">
            <div class="title ">Сегодня</div>
            <div class="weekend parametre "> 2 агента
                <div class="circle color_1 "></div>
            </div>
            <div class="bypass parametre ">5 агентов
                <div class="circle color_2 "></div>
            </div>
            <div class="proring parametre ">7 агентов
                <div class="circle color_3 "></div>
            </div>
            <div class="posting parametre ">3 агента
                <div class="circle color_4 "></div>
            </div>
            <div class="task_one parametre ">5 агентов
                <div class="circle color_5 "></div>
            </div>
            <div class="task_two parametre ">4 агента
                <div class="circle color_6 "></div>
            </div>
        </div>
    </div>


</body>

</html>