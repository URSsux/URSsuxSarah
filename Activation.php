 <?php 
include "connect.php";
include "header.php";
include "header_desktop.php";
include "header_mobile.php";


require_once ('connect.php');
		if (isset($_POST) & !empty($_POST)||isset($id_activation)||isset($id_machine)||isset($id_codeActivation)) {
			
			$id_codeActivation = ($_POST['id_codeActivation']);
			$id_machine = ($_POST['id_machine']);
			$date_activation=($_POST['date_activation']);
			$nombre_jour=($_POST['jour']);
			$CreateSql = "INSERT INTO `activation` (id_activation,id_codeActivation,id_machine,date_activation,nombre_jour_restant)  VALUES(NULL,'$id_codeActivation', '$id_machine','$date_activation','$nombre_jour') ";
			$res = mysqli_query($con, $CreateSql) or die(mysqli_error($con));
			$action_type="insertion";
	$table="activation";
	$date=date("y-m-d: h-i-s");
	$sql_insert="INSERT INTO `historique`(action_type,table_concernee,date_action) VALUES('$action_type','$table','$date')";
	$res=mysqli_query($con,$sql_insert);
			if($res){
			mysqli_query($con,$sql_insert) or die (mysqli_error($con));
				
			}else{
				$erreur = "erreur d'insertion a la base";
		}
	}
    $result=$con->query("select *from machine order by id_machine asc");
    $a=$con->query("select* from code_activation order by id_codeActivation asc");
?>
<!DOCTYPE html>
<html lang="en">

<style>
	.logo{
		width:1878px;
		height:68px;
	}
</style>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="LOGO.JPG" alt="Cool Admin" width: "1878px" height:"698px" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Tableau de bord</a>
                            
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="history.php">
                                <i class="fas fa-chart-bar"></i>Historique</a>
                            
                        </li>
                       
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Tableaux</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="Machine.php">Machines</a>
                                </li>
                                <li>
                                    <a href="Utilisateur.php">Utilisateurs</a>
                                </li>
                                <li>
                                    <a href="Code.php">Code d'activation</a>
                                </li>
                                <li>
                                    <a href="Activation.php">Activation</a>
                                </li>
                            </ul>
                        </li>
                        
                       
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="container">
		<div class="row pt-4">
			<?php if (isset($message)) { ?>
				<div class="alert alert-success" role="alert">
					<?php echo $message; ?>
				</div> <?php } ?>

				<?php if (isset($erreur)) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $erreur; ?>
				</div> <?php } ?>

			<form action="" method="POST" class="form-horizontal col-md-6 pt-4">
				<h2 class="fw-bold text-secondary">Formulaire machine</h2>

				<div class="form-group">
					<label> ID code Activation</label>
					<div class="col-sm-10">
						<select name="id_codeActivation" id="id_codeActivation" class="form-control">
						<?php 
						foreach($a as $row){
							echo '<option value="'.$row["id_codeActivation"].'">'.$row['id_codeActivation'].'</option>';
						}
						?>
					</select>
				</div>
				
				<div class="form-group">
					<label> ID machine</label>
					<div class="col-sm-10">
						<select name="id_machine" id="id_machine" class="form-control">
						<?php 
						foreach($result as $row){
							echo '<option value="'.$row["id_machine"].'">'.$row['code_IMMO'].'</option>';
						}
						?>
					</select>
				</div>
					
				</div> 
				<div class="form-group">
					<label >Date d'activation</label>
					<div class="col-sm-10">
						<input type="text" name="date_activation" placeholder="date" class="form-control" id="input1">
					</div>
				</div>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label">Nombre de jours restant</label>
					<div class="col-sm-10">
						<input type="text" name="jour" placeholder="nombre de jours initials" class="form-control" id="input1">
					</div>
				</div>
				

				

				<div class="pt-4">
					<input type="submit" value="submit" class="btn btn-secondary m-3">
					
				</div>
			</form>
		</div>
	</div>

    
    <div class="container">
		<div class="row pt-4">
			<h2>Tableau Activation</h2>
		</div>

		<table class="table table-striped mt-3">
			<thead>
				<tr class="" >
					<th><i>ID activation</i></th>
					<th><i>code activation</i></th>
					<th><i>ID machine</i></th>
					<th><i>Date d'activation</i></th>
					<th><i>Nombre de jours restant</i></th>
					<th><i>Date d'expiration</i></th>
					<th><i>Actions</i></th>
				</tr>
			</thead>

			<tbody>
				<?php
				 $sql="select *from activation";
				 $result=mysqli_query($con,$sql);
				 if($result){
				 while($row=mysqli_fetch_assoc($result)){
					$d=date("y-m-d");
				   $id_activation=$row['id_activation'];	
				   $id_codeActivation=$row['id_codeActivation'];
				   $id_machine=$row['id_machine'];
				   $date_activation=$row['date_activation'];
				   $date = new DateTime($date_activation); // Créer un objet DateTime pour la date actuelle
				   $nombre=$row['nombre_jour_restant']; // Nombre de jours à ajouter
				   $date->modify("+$nombre day"); 
				   $date_fin=$date->format('Y-m-d');
				   $nombre_jour=(strtotime($date_fin)-strtotime($d))/60/60/24;
				  
				   if($nombre_jour>=10 && $nombre_jour<=20){
					echo '<script language="Javascript">
					alert("La licence de la machine '.$id_machine.' est en voie d"expiration")
					</script>';
				   }if($nombre_jour<=0){
					
					echo '<script language="Javascript">
					alert("La licence de la machine '.$id_machine.' est expirée")
					</script>';
				   }
				   echo'<tr>
				   <th scope="row">'.$id_activation.'</th>
				   <td >'.$id_codeActivation.'</td>
				   <td >'.$id_machine.'</td>
				   <td>'.$date_activation.'</td>
				   <td >'.$nombre_jour.'</td>
				   <td >'.$date_fin.'</td>	
				   <td >
				   <button class="btn btn-secondary"><a href="update_ACTIV.php?updateid='.$id_activation.'" class="text-light">Mettre à jour</a></button>
				   <button class="btn btn-danger"><a href="delete_ACTIV.php?deleteid='.$id_activation.'" class="text-light">Supprimer</a></button>
				   </td>
				   </tr>'; 
				 }
				 } ?>
      
					</td>
				</tr>

			</tbody>
		</table>


	</div>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p></a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
