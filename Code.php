<?php 
include "connect.php";
include "header.php";
include "header_desktop.php";
include "header_mobile.php";


require_once ('connect.php');
		if (isset($_POST) & !empty($_POST)||isset($id_codeActivation)||isset($libelle)||isset($quantite_machine)||isset($date_reception)) {
			$libelle = ($_POST['libelle']);
			$quantite_machine = ($_POST['quantite_machine']);
			$date_reception=($_POST['date_reception']);
	
			$CreateSql = "INSERT INTO `code_activation` (id_codeActivation,libelle, quantite_machine,date_reception)  VALUES(null, '$libelle', '$quantite_machine','$date_reception') ";
			$res = mysqli_query($con, $CreateSql) or die(mysqli_error($con));
			$action_type="insertion";
$table="code_activation";
$date=date("y-m-d: h-i-s");
$sql_insert="INSERT INTO `historique`(action_type,table_concernee,date_action) VALUES('$action_type','$table','$date')";
mysqli_query($con,$sql_insert);
$sql_bord="INSERT INTO `tableau_de_bord`(id_codeActivation) VALUES('$libelle')";
mysqli_query($con,$sql_bord);
			
if ($res) {
				
			
			}else{
				$erreur = "erreur d'insertion a la base";
			}
		}
?>
<!DOCTYPE html>
<html lang="en">




<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="LOGO.JPG" alt="Cool Admin" />
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
					<label for="input1" class="col-sm-2 control-label"><i>Libellé</i></label>
					<div class="col-sm-10">
						<input type="text" name="libelle" placeholder="libelle" class="form-control" id="input1">
					</div>
				</div>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label text-"><i>Nombre de machines</i></label>
					<div class="col-sm-10">
						<input type="text" name="quantite_machine" placeholder="quantite_machine" class="form-control" id="input1">
					</div>
				</div> 

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label"><i>Date de reception</i></label>
					<div class="col-sm-10">
						<input type="text" name="date_reception" placeholder="date_reception" class="form-control" id="input1">
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
			<h2>Formulaire machine</h2>

			
		</div>

		<table class="table table-striped mt-3">
			<thead>
				<tr>
					<th>id_codeActivation</th>
					<th>Libellé</th>
					<th>Nombre de machines</th>
					<th>Date de reception</th>
					<th>Actions</th>
					
				</tr>
			</thead>

			<tbody>
				<?php
				 $sql="select *from code_activation";
				 $result=mysqli_query($con,$sql);
				 if($result){
				 while($row=mysqli_fetch_assoc($result)){
				   $id_codeActivation=$row['id_codeActivation'];
				   $libelle=$row['libelle'];
				   $quantite_machine=$row['quantite_machine'];
				   $date_reception=$row['date_reception'];
				   echo'<tr>
				   <th scope="row">'.$row['id_codeActivation'].'</th>
				   <td>'.$libelle.'</td>
				   <td>'.$quantite_machine.'</td>
				   <td>'.$date_reception.'</td>

				   <td>
				   <button class="btn btn-primary"><a href="update.php?updateid='.$id_codeActivation.'" class="text-light">Mettre à jour</a></button>
				   <button class="btn btn-danger"><a href="delete.php?deleteid='.$id_codeActivation.'" class="text-light">Supprimer</a></button>
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
                                    <p></p>
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
