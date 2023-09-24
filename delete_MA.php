<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id_machine=$_GET['deleteid'];
    $sql="delete from machine where id_machine= $id_machine";
    $result=mysqli_query($con,$sql);
    $action_type="delete";
    $table="machine";
    $date=date("y-m-d: h:i:s");
    $info_add="vous avez supprimé la machine $id_machine";
    $sql_delete="INSERT INTO historique (action_type,table_concernee,date_action,info_add) values ('$action_type','$table','$date','$info_add')";
    if($result){
    echo"Suppression réussie";
        header('location:Machine.php');
    }else{
        die(mysqli_error($con));
    }
}
?>