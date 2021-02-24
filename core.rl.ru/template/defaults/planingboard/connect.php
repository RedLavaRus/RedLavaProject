
    <?php

$orm1 = new \Core\Orm\Orm;
$res1 = $orm1->select("id,zd_shpd,zd_tv,con_shpd,con_tv")
->from("broad_static")->execute()->object();
//var_dump("<pre>",$res1->object);
$arr_color[] =null;
$dex = 0;
    

?>
    
    <div class="main">
    <?php
    foreach($res1->object as $rr){
        $usr = $rr['id'];
        $orm2 = new \Core\Orm\Orm;
        $res2 = $orm2->select("last_name,name")
        ->where("id_user = $usr")
        ->from("expansion_user")->limit("1")->execute()->object();

        $rr['name'] = $res2->object[0]["last_name"]." ".$res2->object[0]["name"];

 $color ="#". dechex(rand(0,255)).dechex(rand(0,255)) .dechex(rand(0,255)) ;   
 $arr_color["$dex"]["color"] = $color;
    echo '
<div class="agent"  style="border-color:'.$color.' ;">
<div class="name">'.$rr['name'].'</div>
<div class="avatar"><img src="/template/defaults/img/broad/ava.png" alt=""></div>
<div class="work">
    <div class="work_hpd">
        <div class="text">ШПД</div>
        <div class="progress" style="width: '.$rr['con_shpd'].'%;">
            <div class="number ">'.$rr['con_shpd'].'</div>
        </div>
    </div>
    <div class="work_tv">
        <div class="text">ТВ</div>
        <div class="progress" style="width: '.$rr['con_tv'].'%;">
            <div class="number ">'.$rr['con_tv'].'</div>
        </div>
    </div>
</div>
</div>';

$arr_color["$dex"]["tv"] =$rr['con_tv'];
$arr_color["$dex"]["shpd"] =$rr['con_shpd'];
$arr_color["$dex"]["name"] =$rr['name'];
$dex++;
    }
    $tv = null;
    $shpd = null;
    $coll = null;
    $name = null;
    foreach($arr_color as $rts){
    $coll = $coll. " '".$rts["color"]."', ";
    $tv = $tv." ".$rts["tv"].", ";
    $shpd = $shpd." ".$rts["shpd"].", ";
    $name = $name." '".$rts["name"]."', ";
    }
?>
        
    <div class="panel">
        <div class="chart_hpd container">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
        <div class="chart_tv container">
                    <canvas id="myChart1" width="400" height="400"></canvas>
                </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
     <script >
        var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [<?php echo $name;?>],
        datasets: [{
            data: [<?php echo $shpd;?>],
            backgroundColor: [<?php echo $coll;?>],
            borderWidth: 0.5 ,
            borderColor: '#ddd'
        }]
    },
    options: {
        title: {
            display: true,
            text: 'ШПД Разбивка на агента',
            position: 'top',
            fontSize: 16,
            padding: 20
        },
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                boxWidth: 20,
                padding: 15
            }
        },
        tooltips: {
            enabled: true
        },
        plugins: {
            datalabels: {
                color: '#111',
                textAlign: 'center',
                font: {
                    lineHeight: 1.6
                },
                formatter: function(value, ctx) {
                    return ctx.chart.data.labels[ctx.dataIndex] + '\n' + value + '%';
                }
            }
        }
    }
});




var ctx = document.getElementById('myChart1').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [<?php echo $name;?>],
        datasets: [{
            data: [<?php echo $tv;?>],
            backgroundColor: [<?php echo $coll;?>],
            borderWidth: 0.5 ,
            borderColor: '#ddd'
        }]
    },
    options: {
        title: {
            display: true,
            text: 'ТВ Разбивка на агента',
            position: 'top',
            fontSize: 16,
            padding: 20
        },
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                boxWidth: 20,
                padding: 15
            }
        },
        tooltips: {
            enabled: true
        },
        plugins: {
            datalabels: {
                color: '#111',
                textAlign: 'center',
                font: {
                    lineHeight: 1.6
                },
                formatter: function(value, ctx) {
                    return ctx.chart.data.labels[ctx.dataIndex] + '\n' + value + '%';
                }
            }
        }
    }
});
     </script>
</body>

</html>