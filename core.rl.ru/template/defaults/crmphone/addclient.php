
           

<div >

<?php
$type_bd = "warp";
$xml = simplexml_load_file(MYPOS."/res/crmphone/base.xml");
//var_dump("<pre>",$xml);
$x=0;
foreach($xml->Worksheet->Table->Row as $row){
    $x++;
    if($x != 1){
        $sity[$x] = (string)$row->Cell[0]->Data[0];//Город
        $dogovor[$x] = (string)$row->Cell[1]->Data[0];//дОГОВОР
        $fio[$x] = (string)$row->Cell[2]->Data[0];//ФиО
        $phone[$x][] = (string)$row->Cell[3]->Data[0];//телефон
        $phone[$x][] =(string) $row->Cell[4]->Data[0];//телефон
        $adress[$x] = (string)$row->Cell[5]->Data[0];//"г. Краснодар, Валерия Гассия ул., дом. 4/4, кв. 23"
               
    }
}
$phone_nice=null;
$z=2;
foreach($phone as $ar_phone1)
{
    foreach($ar_phone1 as $ar_phone2)
    {
       $str_phone = substr($ar_phone2, 0, 11);
       
        if($str_phone >= 11111111111) {

            if(!isset($phone_nice[$z][0])) {
                $phone_nice[$z][] = $str_phone;
            }
            elseif($phone_nice[$z][0] != $str_phone){
                $phone_nice[$z][] = $str_phone;
            }           
        }
    }
    $z++;
    
}
//var_dump("<pre>",$phone_nice);

$temp_num =2;
foreach($phone as $tempser){
    //foreach($phone_nice[$temp_num] as $lust_phs)
    $phone1_ac = null;
    $orm=  new \Core\Orm\Orm;
    $id = $orm->select("id")
    ->where("
    phone1 = ".$phone_nice[$temp_num][0]
    
     )->from("crm_phone_base")->execute()->object();

        if(isset($id->object[0]["id"]) and $id->object[0]["id"] >= 1) 
        {
            
        }else{
            $time=time();
            $phone_d1 = $phone_nice[$temp_num][0];
            if(isset($phone_nice[$temp_num][1])){$phone_d2 = $phone_nice[$temp_num][1];}else{$phone_d2 = "пусто";}
            if(isset($phone_nice[$temp_num][2])){$phone_d3 = $phone_nice[$temp_num][2];}else{$phone_d3 = "пусто";}
            if(isset($phone_nice[$temp_num][3])){$phone_d4 = $phone_nice[$temp_num][3];}else{$phone_d4 = "пусто";}

            $sity[$temp_num] = str_replace(",",".",$sity[$temp_num]);
            $adress[$temp_num] = str_replace(",",".",$adress[$temp_num]);
            $fio[$temp_num] = str_replace(",",".",$fio[$temp_num]);

            $sity[$temp_num] = str_replace("'","\"",$sity[$temp_num]);
            $adress[$temp_num] = str_replace("','","\"",$adress[$temp_num]);
            $fio[$temp_num] = str_replace("','","\"",$fio[$temp_num]);



            $orm=  new \Core\Orm\Orm;
            $test = $orm->insert("
                region = КАВКАЗ,
                sity = ".$sity[$temp_num].",
                adres = ".$adress[$temp_num].",
                fio = ".$fio[$temp_num].",
                phone1 = ".$phone_d1.",
                phone2 = ".$phone_d2.",
                phone3 = ".$phone_d3.",
                phone4 = ".$phone_d4.",
                type = ".$type_bd.",
                date_add = ".$time.",
                contract_number = ".$dogovor[$temp_num]."
            ")            
            ->from("crm_phone_base")->execute();
            //var_dump("<pre>",$test,"</pre><br><br><br><br>");
        }

$temp_num ++;
};
/*
//var_dump("<pre>",$xml->Worksheet->Table->Row);
$x=0;
foreach($xml->Worksheet->Table->Row as $row){
    $x++;
    if($x != 1){
        $sity[$x] = (string)$row->Cell[0]->Data[0];//Город
        $docovor[$x] = (string)$row->Cell[1]->Data[0];//дОГОВОР
        $fio[$x] = (string)$row->Cell[2]->Data[0];//ФиО
        $phone[$x][] = (string)$row->Cell[3]->Data[0];//телефон
        $phone[$x][] =(string) $row->Cell[4]->Data[0];//телефон
        $adress[$x] = (string)$row->Cell[5]->Data[0];//"г. Краснодар, Валерия Гассия ул., дом. 4/4, кв. 23"
               
    }
}
//var_dump("<pre>",$adress);

$rrr=0;
$d=2;
while(isset($sity[$d]) and $sity[$d] != null){
    if(isset($sity[$d]))  $sity_a = $sity[$d];
    if(isset($docovor[$d])) $docovor_a = $docovor[$d];
    if(isset($fio[$d])) $fio_a = $fio[$d];
    if(isset($adress[$d])) $adress_a = $adress[$d];

    $er = true;
$reeeeeee = $d--;
    //echo "<pre>";
    unset($phone1_ac);
    foreach($phone[$reeeeeee] as $ph)
    {
        //var_dump($ph);

        if(isset($ph))
        { 
            $ph = str_replace(",",".",$ph);

            //var_dump($ph,"<br>");
            $orm=  new \Core\Orm\Orm;
            $id = $orm->select("id")
        ->where("
        phone1 = $ph
        "
          )->from("crm_phone_base")->execute()->object();
          //var_dump("<pre>",$id);
          
          if(isset($id->object[0]["id"]) and $id->object[0]["id"] >= 1) 
            {
                $er = false;
                $phone1_ac[]= "пусто";
             }else{
                $phone1_ac[]=$ph;
            }
        }
        
    $d++;
    }
if($er){
    //var_dump($phone1_ac); echo "<br>";
    if(isset($phone1_ac[0])) $phone_a1=$phone1_ac[0];
    if(isset($phone1_ac[1])) $phone_a2=$phone1_ac[1];
    if(isset($phone1_ac[2])) $phone_a3 =$phone1_ac[2];
    if(isset($phone1_ac[3])) $phone_a4 =$phone1_ac[3];

if($phone_a4 == $phone_a3){$phone_a4 = "пусто";}
if($phone_a3 == $phone_a2){$phone_a3 = "пусто";}
if($phone_a2 == $phone_a1){$phone_a2 = "пусто";}
if($phone_a1 == ""){$phone_a1 = $phone_a2; $phone_a2 = "пусто";}

    if(isset($sity_a))      {   $sity_d = $sity_a ;}else{ $sity_d = "пусто";}
    if(isset($docovor_a))   {   $docovor_d =  $docovor_a." ";}else{ $docovor_d = "пусто";}
    if(isset($fio_a))       {   $fio_d =  $fio_a ;}else{ $fio_d = "пусто";}
    if(isset($adress_a))    {   $adress_d =  $adress_a  ;}else{ $adress_d = "пусто";}
    if(isset($phone_a1))    {   $phone_d1 = $phone_a1;}else{ $phone_d1 = "пусто";}
    if(isset($phone_a2))    {   $phone_d2 = $phone_a2;}else{ $phone_d2 = "пусто";}
    if(isset($phone_a3))    {   $phone_d3 = $phone_a3;}else{ $phone_d3 = "пусто";}
    if(isset($phone_a4))    {   $phone_d4 = $phone_a4;}else{ $phone_d4 = "пусто";}

    //echo $phone_d1." ".$phone_d2." ".$phone_d3." ".$phone_d4;
    $adress_d =str_replace(",",".",$adress_d);
    $time=time();
    $region = "Кавказ";
    
    $orm=  new \Core\Orm\Orm;
    $orm->insert("
        region = $region,
        sity = $sity_d,
        adres = $adress_d,
        fio = $fio_d,
        phone1 = $phone_d1,
        phone2 = $phone_d2,
        phone3 = $phone_d3,
        phone4 = $phone_d4,
        type = warm,
        date_add = $time,
        contract_number = $docovor_d
    ")            
    ->from("crm_phone_base")->execute();


    $rrr++;
}
}
*/

?>

</div>
</div>
