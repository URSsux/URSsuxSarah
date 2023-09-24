<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id_codeActivation=$_GET['deleteid'];
    $sql="DELETE from code_activation where id_codeActivation= $id_codeActivation";
    $result=mysqli_query($con,$sql);
    $action_type="delete";
    $table="code_activation";
    $date=date("y-m-d: h:i:s");
    $info_add="vous avez supprimé le code d'activation $id_codeActivation";
    $sql_delete="INSERT INTO historique (action_type,table_concernee,date_action,info_add) values ('$action_type','$table','$date','$info_add')";
    if($result){
    echo"Suppression réussie";
        header('location:Code.php');
    }else{
        die(mysqli_error($con));
    }
}
?>