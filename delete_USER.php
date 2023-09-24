<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id_user=$_GET['deleteid'];
    $sql="delete from user where id_user= $id_user";
    $result=mysqli_query($con,$sql);
    $action_type="delete";
    $table="user";
    $date=date("y-m-d: h:i:s");
    $info_add="vous avez supprimé l'utilisateur $id_user";
    $sql_delete="INSERT INTO historique (action_type,table_concernee,date_action,info_add) values ('$action_type','$table','$date','$info_add')";
    if($result){
    echo"Suppression réussie";
        header('location:Utilisateur.php');
    }else{
        die(mysqli_error($con));
    }
}
?>