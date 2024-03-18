<?php 
session_start();
if (isset($_SESSION['USER_ID'])) {
   
}else{
   header("location:index.php");
}
$msg="";
include('include/config.php');
if (isset($_POST['UPDATE'])) {
  $lid=$_SESSION['USER_ID'];
  $Nom=$_POST['Nom'];
  $Prénom=$_POST['Prénom'];
  $email=$_POST['Email'];
  $Contact=$_POST['Contact'];
  $Adresse=$_POST['Adresse'];

  mysqli_query($con,"update stagaires set FirstName='$Nom',LastName='$Prénom',EmailId='$email',Phonenumber='$Contact',Address='$Adresse' where IdStagaire='$lid'");

}

?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des Stages</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   
</head>

<body>
    <!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Change </strong>Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php $lid=$_SESSION['USER_ID'];
   $res=mysqli_query($con,"SELECT * from  stagaires where IdStagaire='$lid'");
     $ro=mysqli_fetch_assoc($res);
    ?>

      <div class="modal-body">
       <form method="post">
         <p>
        <label for="cc-exp" class="control-label mb-1">Nom</label>
           <input class="form-control" type="text" value="<?php echo $ro['FirstName']; ?>" name="Nom" required="" autocomplete="off"  >
       </p>
<p>
    <label for="cc-exp" class="control-label mb-1">Prénom</label>
    <input class="form-control" type="text" name="Prénom" required="" value="<?php echo $ro['LastName']; ?>" autocomplete="off" ></p>
    <p>
    <label for="cc-exp" class="control-label mb-1">Email</label>
    <input class="form-control" type="email" name="Email" required="" value="<?php echo $ro['EmailId'] ?>" autocomplete="off" ></p>
<p>
    <label for="cc-exp" class="control-label mb-1" >Contact</label>
    <input class="form-control" type="tel" name="Contact" required="" value="<?php echo $ro['Phonenumber'] ?> "  autocomplete="off" ></p>
    <p>

    <label for="cc-exp" class="control-label mb-1">Adresse</label>
    <input class="form-control" type="text"  required="" autocomplete="off" name="Adresse" value="<?php echo $ro['Address'];?>" autocomplete="off"></p>
<div class="modal-footer">
        <button    class="btn btn-primary" name="UPDATE" >UPDATE</button>
      </div>
       </form>
      </div>
      
    </div>
  </div>
</div>
    <!-- Left Panel -->
    <?php include('include/sidebar.php');?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('include/header.php');?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
               
              
                <div class="clearfix"></div>

                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                     
                                    <h4 class="box-title"><strong>Mon</strong> Profil </h4>
                                  
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table id="example" class="display responsive-table ">
                                          <tbody>
                                                       <?php 

 
  $lid=$_SESSION['USER_ID'];
   $res=mysqli_query($con,"SELECT * from  stagaires where IdStagaire='$lid'");
  while ($row=mysqli_fetch_assoc($res)) {
  

         
                                       ?>   
                                                  
                                            
                                             
                                                <tr>
                                                    
                                                     <td style="font-size:16px;"> <b>Nom Stagaire:</b></td>
                                                     <td > <?php echo $row['FirstName']; ?> </td>
                                                     <td style="font-size:16px;"> <b>Prénom Stagaire:</b></td>
                                                     <td > <?php echo $row['LastName']; ?> </td>
                                                       <td></td>
                                                       <td></td>                                                                                                    
                                                    </tr>
                                                    <tr>
                                            
                                            
                                            <td style="font-size:16px;"><b>Email:</b></td>
                                           <td> <?php echo $row['EmailId'] ?> </td>
                                             <td style="font-size:16px;"><b> Contact :</b></td>
                                            <td> <?php echo $row['Phonenumber'] ?> </td>
                                            <td style="font-size:16px;"><b>Adresse:</b></td>
                                            <td><?php echo $row['Address'];?></td>
                                            
                                                    </tr>
                                                    <tr>
                                             
                                            <td colspan="3"><a class="btn btn-info" data-toggle="modal" href="#update"  style="width:200px">Change</a></td>  
                                           
                                            </tr>
                                            
                                            <?php  }?>
                                            </tbody>
                                        </table>
                                         

                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                      
                    </div>
                </div>
                <!-- /.orders -->
                
               
              
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?php include('include/footer.php');?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    
    </script>
</body>
</html>
