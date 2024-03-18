<?php 
session_start();
if (isset($_SESSION['USER_ID'])) {
   
}else{
   header("location:../index.php");
}
$msg="";
include('includes/config.php');

# debit modifier n'est pas vues par vues
$isread=1;
$id=$_GET['stageeid'];
date_default_timezone_set('Africa/Bujumbura');
$admreactiondate=date('Y-m-d G:i:s ', strtotime("now"));
mysqli_query($con,"update stages set IsRead='$isread' where IdStage='$id'");
# debit modifier n'est pas vues par vues
# Fin Accepter ou refuser un stage
if(isset($_POST['update']))
{ 
    $msg="";
$lid=$_GET['stageeid'];
$description=$_POST['description'];
$status=$_POST['status'];
date_default_timezone_set('Africa/Bujumbura');
$admreactiondate=date('Y-m-d G:i:s ', strtotime("now"));
mysqli_query($con,"update stages set AdminRemark='$description',Status='$status',AdminRemarkDate='$admreactiondate' where IdStage='$lid'");
$msg="Stage est modifié Avec Succes";
}
#Fin Accepter ou refuser un stage
 ?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion Des Stages</title>
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
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   
</head>

<body>
    <!-- Left Panel -->
    <?php include('includes/sidebar.php');?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('includes/header.php');?>
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
                                     
                                    <h4 class="box-title"><strong>Detail</strong>  Stage </h4>
                                  <?php if($msg){?>  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Felicitation!</strong> <?php echo $msg ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

     
                                   </div> <?php } ?>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table id="example" class="display responsive-table ">
                                          <tbody>
                                                       <?php 
   
  $lid=$_GET['stageeid'];
  $res=mysqli_query($con,"SELECT stages.IdStage  as lid, stagaires.FirstName, stagaires.LastName, stagaires.IdStagaire,stages.IdStagaire,stages.IdStage,stagaires.Gender,stagaires.Etablissement,stagaires.Encadreur,stagaires.Phonenumber,stagaires.EmailId,tbldepartments.DepartmentName,stages.PostingDate,stages.Status,stages.FromDate,stages.ToDate,stages.Description,stages.PostingDate,stages.AdminRemark,stages.AdminRemarkDate,tbldepartments.IdDep,stages.Service  from stages join stagaires on stages.IdStagaire=stagaires.IdStagaire join tbldepartments on stages.Service=tbldepartments.IdDep where stages.IdStage='$lid'");
  $cnt=1;
$query=mysqli_num_rows($res);
if($query> 0)

                            {
                         while ($row=mysqli_fetch_assoc($res)) {
  

         
                                       ?>   
                                                  
                                            
                                             
                                                <tr>
                                                  
                                                    <td style="font-size:16px;"> <b>Nom stagaire :</b></td>
                                                     <td> <a style="color: blue" href="Modifierstagaire.php?empid=<?php echo $row['IdStagaire'];?>"target="_blank"><?php echo $row['FirstName']." ". $row['LastName']; ?></a> </td>
                                                     <td style="font-size:16px;"><b>Université/ <br>Etablissement:</b></td>
                                                     <td> <?php echo $row['Etablissement'] ?> </td>
                                                     <td style="font-size:16px;"><b>Genre:</b></td>
                                                     <td> <?php echo $row['Gender'] ?> </td>
                                                    </tr>
                                                    <tr>
                                            <td style="font-size:16px;"><b>Email :</b></td>
                                           <td> <?php echo $row['EmailId'] ?> </td>
                                             <td style="font-size:16px;"><b> Contact :</b></td>
                                            <td> <?php echo $row['Phonenumber'] ?> </td>
                                            <td style="font-size:16px;"><b>Service:</b></td>
                                            <td> <?php echo $row['DepartmentName'] ?> </td> 
                                             <td>&nbsp;</td> 
                                                    </tr>
                                                    <tr>
                                                     
                                              <td style="font-size:16px;"><b>Encadreur:</b></td>
                                            <td><?php echo $row['Encadreur'];?></td>
                                              <td style="font-size:16px;"><b>Date Commencéé:</b></td>
                                            <td><?php echo $row['FromDate'];?> to <?php echo $row['ToDate'];?></td><td style="font-size:16px;"><b>Date Demandéé:</b></td>
                                           <td><?php echo $row['PostingDate'];?></td>
                                           </tr>
                                           <tr>
                                               <td style="font-size:16px;"><b>Description Stagaire :</b></td>
                                            <td colspan="5" ><?php echo $row['Description'] ;?></td>
                                            <td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                           </tr>   
                                            <tr>
                                                <td style="font-size:16px;"><b>Statut Stage :</b></td>
                                                <td><?php 
                                                    if($row['Status']==1){ ?>
                                                 <span style="color: green">Accepté</span>
                                                 <?php } 
                                                 if($row['Status']==2)  { ?>
                                                <span style="color: red">Refusé</span>
                                                 <?php } 
                                                 if($row['Status']==0)  { ?>
                                                 <span style="color: blue">en attente</span>
                                                        <?php } ?></td>
                                                        <td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                            </tr>
                                            <tr>
<td style="font-size:16px;"><b>Admin Reaction: </b></td>
<td colspan="5"><?php
if($row['AdminRemark']==""){
  echo "waiting for Approval";  
}
else{
echo $row['AdminRemark'];
}
?></td>
<td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
 </tr>

 <tr>
<td style="font-size:16px;"><b>Date Reaction admin: </b></td>
<td colspan=""><?php
if($row['AdminRemarkDate']==""){
  echo "NA";  
}
else{
echo $row['AdminRemarkDate'];
}
?></td>
        <td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                            </tr>
<?php 
if($row['Status']==0)
{

?>
<tr>
<!-- Modal -->
<div class="modal fade" id="accorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong> Admin</strong> reaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post">
  <div class="form-group">
    <label for="exampleFormControlSelect1"><strong> Action Stage</strong> </label>
    <select class="form-control" name="status" id="exampleFormControlSelect1">
     <option value="">Choisir Option</option>
    <option value="1">Accepter</option>
    <option value="2">Refuser</option>
      </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><strong>Commentaire</strong></label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
  </div>
  

      </div>
      <div class="modal-footer">
        <button name="update" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
</div>

</div>
 <td colspan="3">
  <a class="btn btn-info" data-toggle="modal" href="#accorder"  style="width:200px">Accorder</a>
</td>
      <?php  }?>      
      </form>               </tr>
                                         <?php $cnt++;} }?>
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
        <?php include('includes/footer.php');?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    
    </script>
</body>
</html>
