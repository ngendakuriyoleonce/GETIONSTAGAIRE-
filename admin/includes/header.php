<?php include('config.php');
 
#debit compter le nombre de notification
$isread=0;
$res=mysqli_query($con,"SELECT IdStage from stages where IsRead=$isread");
$unread=mysqli_num_rows($res);
#Fin compter le nombre de notification
?>

<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php"><img src="../images/kaled.jpg" alt="Logo" width="70px"></a>
                    <a class="navbar-brand hidden" href="dashboard.php">Roi Khaled</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
 
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php echo $unread; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red"> Notification</p>
            <?php 
            $isread=0;
$res=mysqli_query($con,"SELECT stages.IdStage as lid,stagaires.FirstName,stagaires.LastName,stagaires.IdStagaire,stagaires.Etablissement,stages.PostingDate from stages join stagaires on stages.IdStagaire=stagaires.IdStagaire where stages.IsRead=$isread");
$result=mysqli_num_rows($res);
if($result> 0)

                            {
                         while ($row=mysqli_fetch_assoc($res)) {
 ?>
                              <li>
                                    <a class="dropdown-item media" href="stages-details.php?stageeid=<?php echo $row['lid'];?>">
                                    <i class="fa fa-check" style="color: green"></i>
                                    <p><b><span style="color: blue"><?php echo $row["FirstName"]." ".$row["LastName"] ?></span> Etudie à <span style="color:green"><?php echo $row["Etablissement"] ?></span> </b> <br>Demande un Stage à <span style="color: red"><b><?php echo $row["PostingDate"] ?></b></span></p>
                                </a>
                              </li>
                                
                              
                                <?php } }?>
                            </div>
                        </div>

                        
                    </div>
                       <div class="user-area dropdown float-right">
                        <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: blue">
                          <strong><?php echo $_SESSION['NOM_USER']." ".$_SESSION['PRENOM_USER']  ?></strong>  
                        </a>

                        <div class="user-menu dropdown-menu">
                          
                          

                            <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        