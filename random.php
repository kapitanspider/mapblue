<?php
include('dbconfig.php');
$string = file_get_contents("wojewodztwa.json");
$wojewodztwa = json_decode($string, true);
foreach($wojewodztwa["wojewodztwa"] as $woj)
{
    //var_dump($woj["powiaty"]);
    foreach($woj["powiaty"] as $powiat)
    {
        //var_dump($powiat);
        //$sql= 'INSERT INTO `powiaty` (`wojewodztwo`, `powiat`, `okreg`) VALUES ("'.$woj["wojewodztwo"].'", "'.$powiat["powiat"].'", "'.$powiat["okreg"].'");';
        //echo $sql;
        echo '<br>';
        //$conn->query($sql);
        /*foreach($powiat["gminy"] as $gmina)
        {
            $sql= 'INSERT INTO `gminy` (`wojewodztwo`, `powiat`, `okreg`, `gmina`) VALUES ("'.$woj["wojewodztwo"].'", "'.$powiat["powiat"].'", "'.$powiat["okreg"].'", "'.$gmina.'");';
            echo $sql;
            //$conn->query($sql);
            echo '<br><br>';
        }
        */
    }
}

?>