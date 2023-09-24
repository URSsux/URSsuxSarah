<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id_activation=$_GET['deleteid'];
    $sql="delete from activation where id_activation= $id_activation";
    $result=mysqli_query($con,$sql);
    if($result){
        $action_type="delete";
        $table="activation";
        $date=date("y-m-d: h-i-s");
        $info_add="vous avez supprimé l'activation $id_activation";
        $sql_insert="INSERT INTO historique (action_type,table_concernee,date_action,info_add) values ('$action_type','$table','$date','$info_add') ";
        mysqli_query($con,$sql_insert);
        if(mysqli_query($con,$sql_insert)){
            echo "ok insert";
        }else{
            echo "not inserted";
        }
        echo"Suppression réussie";
        header('location:Activation.php');
    }else{
        die(mysqli_error($con));
    }
}
?>