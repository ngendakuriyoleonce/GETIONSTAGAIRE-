<?php 
session_start();
include('includes/config.php');
if (isset($_SESSION['USER_ID'])) {
   
}else{
   header("location:../index.php");
}
$msg="";
# debit active stagaires
if (isset($_GET['acempid'])) {
  $id=$_GET['acempid'];
  $statut=1;
  mysqli_query($con,"update stagaires set Status='$statut'  WHERE IdStagaire='$id'");
  header("location:Stagaires.php");
}
# End active Stagaires

# debit inactive Stagaires
if (isset($_GET['inempid'])) {
  $id=$_GET['inempid'];
  $statut=0;
  mysqli_query($con,"update stagaires set Status='$statut'  WHERE IdStagaire='$id'");
  header("location:Stagaires.php");
}
# debit inactive Stagaires

# debit active admin Employe
if (isset($_GET['add'])) {
  $id=$_GET['add'];
  $statut=1;
  mysqli_query($con,"update stagaires set Role='$statut'  WHERE IdStagaire='$id'");
  header("location:Stagaires.php");
}
# debit active admin Employe


# debit inactive admin Employe
if (isset($_GET['remove'])) {
  $id=$_GET['remove'];
  $statut=0;
  mysqli_query($con,"update stagaires set Role='$statut'  WHERE IdStagaire='$id'");
  header("location:Stagaires.php");
}
# debit supprimer Stagaires
if(isset($_GET['deleteemp']))
{
$id=$_GET['deleteemp'];
mysqli_query($con,"delete from stagaires WHERE IdStagaire='$id'");
$msg="Stagaire est supprimé";
}
# fin supprimer Stagaires
 ?>
<!doctype html>
 <html class="no-js" lang=""> 
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
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <?php include('includes/sidebar.php');?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include('includes/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><strong>Gestion</strong> Stagaires</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    
                                    <li >
                                        <a href="add-stagaire.php" class="btn btn-success" style="width: 150px;" ><i class="fa fa-plus">&nbsp;<strong>NOUVEAU</strong></i></a>
                                        </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Gestion Stagaires</strong>
                                <?php if($msg){?>  <div class="alert alert-danger" role="alert">
  <strong>Felicitation!</strong> <?php echo $msg ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

     
                                   </div> <?php } ?>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                   
                                                   <th>Nom Complet</th>
                                                   <th>Univeristé/Etablissement</th>
                                                  
                                                   <th>Statut</th>
                                                   <th>Date Enregistrement</th>
                                                   <th>Droit</th>
                                                    <th >Action</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                       <?php 
                                                       

                                $res=mysqli_query($con,"SELECT stagaires.IdStagaire as lid,stagaires.IdStagaire,stagaires.FirstName,stagaires.Role,stagaires.LastName,stagaires.Etablissement,stagaires.Status,stagaires.RegDate FROM stagaires   order by lid desc");
                            $cnt=1;
                            $query=mysqli_num_rows($res);
                            if($query> 0)

                            {
                         while ($row=mysqli_fetch_assoc($res)) {
         
                                       ?>   
                                                  
                                            
                                            
                                                <tr>
                                                    <td class="serial"><?php echo $cnt ?></td>
                                                    <td> <?php echo $row['FirstName'] ?> &nbsp; <?php echo $row['LastName']?>  </td> 
                                                    <td> <?php echo $row['Etablissement'] ?> </td>
                                                    <td> 
                                                     <?php 
                                                     if ($row['Status']) {?>
                                                        <a href="Stagaires.php?inempid=<?php echo $row['lid'];?>"class="btn btn-info btn-sm" onclick="return confirm('Vous voulez vraiment blocker ce Stagaire?');">Active</a>
                                                     <?php } else { ?>
                                                 <a href="Stagaires.php?acempid=<?php echo $row['lid'];?>"class="btn btn-danger btn-sm" onclick="return confirm('Vous voulez vraiment Active ce Stagaire?');">Inactive</a>
                                                 <?php } ?>
                                                 </td>
                                                 <td> <?php echo $row['RegDate'] ?> </td>
                                                 <td> 
                                                     <?php 
                                                     if ($row['Role']) {?>
                                                        <a href="Stagaires.php?remove=<?php echo $row['lid'];?>"class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want remove admin?');">Admin</a>
                                                     <?php } else { ?>
                                                 <a href="Stagaires.php?add=<?php echo $row['lid'];?>"class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to give admin Right?');">Stagaire</a>
                                                 <?php } ?>
                                                 </td>
                                                <td>
                                                   

                                             <a href="Modifierstagaire.php?empid=<?php echo $row['lid'];?>"><i style="color: blue" class="ti ti-pencil"></i></a>
                                             
                                              <a href="Stagaires.php?deleteemp=<?php echo $row['lid'];?>"><i style="color: red" class="ti ti-trash"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                               <?php $cnt++;} }?>
                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <?php include('includes/footer.php');?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
