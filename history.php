<?php 
include "connect.php";
include "header.php";
include "header_desktop.php";
include "header_mobile.php";
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
                            <a class="js-arrow" href="chart.php">
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
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.php">Se connecter</a>
                                </li>
                                <li>
                                    <a href="register.php">Souscrire</a>
                                </li>
                                <li>
                                    <a href="forget-pass.php">Mot de passe oublié?</a>
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
			<h2>Tableau historique</h2>
		</div>

		<table class="table table-striped mt-3" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Type action</th>
					<th>Date d'action</th>
					<th>Nom de la table</th>
					<th>details</th>
					<th>Actions</th>
				</tr>
			</thead>
            <tbody>
				<?php
				   
					$sql="SELECT * FROM historique ";
					$res = mysqli_query($con, $sql);
					if($res){
					while($row=mysqli_fetch_assoc($res)){
					  echo'<tr>
					  <th scope="row">'.$row['id'].'</th>
					  <td>'.$row['action_type'].'</td>
					  <td>'.$row['date_action'].'</td>
					  <td>'.$row['table_concernee'].'</td>
					  <td>'.$row['info_add'].'</td>
					  <td>
					  <button class="btn btn-danger"><a href="delete_history.php?deleteid='.$row['id'].'" class="text-light">Supprimer</a></button>
					  </td>
					  </tr>'; 
				   }
					}
				
				
				 ?>
      
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



	