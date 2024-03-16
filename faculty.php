<?php
  require_once('validation.php');
?>


<!DOCTYPE HTML>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Admin|  FACULTY  :: </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 <link rel="stylesheet" type="text/css" href="css/editor.css">

 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
 <!--//js-->
 
<!--webfonts-->
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body  class="cbp-spmenu-push">

    <?php
 include "config/config.php";
 include "config/database.php";
 include "classfile/admin.php";
 include "classfile/data.php";
        
    $adm=new admin();
    $da=new data();
    $msg="";
    $id="";
    $teacherlist=$da->getteacher_details();
    if(isset($_REQUEST['bsave']))
    {
     $str= $adm->save_teacheretails();
    }
    if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }
    
    if(isset($_REQUEST['bupdate']))
    {
     $str= $adm->update_teacher();
    }
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $teacherdetails=$da->getteacherdata($id);
        $teacherdetails=$teacherdetails['single_row'];
    }
    if(isset($_REQUEST['bdelete']))
    {
      $id=$_POST['id'];
      $adm->dellete_teacher($id);
    }
    
?>
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <?php include "include/nav.php" ?>
      
        </aside>
	</div>
		<!--left-fixed -navigation-->
		
<!---728x90--->

		<!-- header-starts -->
			<?php include "include/header.php" ?>
		
		<!-- //header-ends -->
<!---728x90--->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">
					<h2 class="title1">Teacher Details :</h2>
					<div class="row">
						<div class="col-md-6 validation-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Teacher :</h4>
							</div>
							<div class="form-body">
			<h4 style="color:red;text-align:center;"><?php echo $msg;?><a href="faculty.php"></a></h4>

								<form action="" method="POST" enctype= "multipart/form-data">
									<div class="form-group">
										<label><font color="red">(*)</font>Faculty Name:-</label>
										<input type="hidden" name="id" value="<?php echo $id; ?>"> 
                     <input type="text" name="nam" class="form-control" value="<?php echo isset($teacherdetails)?$teacherdetails['teacher_nam']:'';?>">
                                   
									</div>
                  <div class="form-group">
                    <label><font color="red">(*)</font>Faculty Position:-</label>
                     <input type="text" name="post" class="form-control" value="<?php echo isset($teacherdetails)?$teacherdetails['teacher_post']:'';?>">
                                   
                  </div>
                  <div class="form-group">
                    <label><font color="red">(*)</font>Descripsion:-</label>
                     <textarea type="text" name="de" class="form-control"><?php echo isset($teacherdetails)?$teacherdetails['descripsion']:'';?></textarea>
                                   
                  </div> 

									<div class="form-group">
										<label><font color="red">(*)</font> Faculty Image</label>
										 <input type="file" class="form-control" id="val-username1" name="Faculty"   value="<?php echo isset($teacherdetails)?$teacherdetails['image']:'';?>">
									</div>
									<div class="form-group">
										<label><font color="red">(*)</font>Status:-</label>
									<select id="inputState" class="form-control" name="status"  value="<?php echo isset($sliderdetails)?$sliderdetails['status']:'';?>">
				                    <option>Enable</option>
				                    <option>Disable</option>
				                  </select>
                                    </div>
									
					 <div class="position-center">
                        <?php   
                            if($id=="")
                            {
                        ?>
                          <button type="submit" class="btn btn-info" name="bsave">Submit</button>
                          <button type="submit" class="btn btn-warning visible" onclick="location.href='faculty.php?id=<?php echo $row['id']; ?>'">&nbsp;Cancel</button>
                         <?php
                            }
                            else
                            {
                        ?>
                         <button type="submit" class="btn btn-info" name="bupdate">Update</button>
                         <button type="submit" class="btn btn-warning visible" onclick="location.href='faculty.php'">&nbsp;Cancel</button>
                        <?php
                            }
                        ?>
                         </div>
                        
           	 </form>
							</div>
						</div>
						<div class="col-md-6 validation-grids validation-grids-right">
							<div class="widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Faculty List :</h4>
								</div>
					         <div class="panel-body widget-shadow">
				      <div class="table-responsive" style="font-size: 12px;">
						 <table class="table">
              <thead>
                <tr>
                  <th><strong>ID</strong></th>
                  <th><strong>Teacher </strong></th>
                  <th><strong>POST</strong></th>
                  <th><strong>Des</strong></th>
                 <th><strong>Image</strong></th>


                  
                
                  <th><strong>STATUS</strong></th>
                  <th><strong>CREATED DT</strong></th>
                  <th><strong>ACTION</strong></th>
                </tr>
              </thead>
              <tbody>
                  
                   <?php
                        $i=1;
                                            //while($row=mysqli_fetch_assoc($categorylist))
                             if($teacherlist!=FALSE)
                                   {
                                   foreach($teacherlist['total_row'] as $row)
                                        {
                                          $id=$row['id'];
                              
                                        ?>
     

                <tr>
                  <td><?php echo $i;?> </td>
                  <td><?php echo $row['teacher_nam']; ?></td>
                  <td><?php echo $row['teacher_post']; ?></td>
                  <td><?php echo $row['descripsion']; ?></td>
                  

                  <td><img  width="50" height="50" src="classfile/slider/<?php echo $row['image']; ?>"></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
                  <td>
                    <div class="d-flex">
                      <button class="btn btn-danger shadow btn-xs sharp mr-1" type="button" onclick="openmodal('<?php echo $id; ?>')"><i class="fa fa-trash"></i></button>
                  
                      <a  class="btn btn-warning shadow btn-xs sharp mr-1"  href="faculty.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                    </div>
                  </td>
                </tr>

               <?php
                                            $i++;
                                                }
                                       }
                                       else
                                       {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                    <?php
                                       }
                                 ?>

                  </tbody>
            </table>
          </div>
            </div>			    
             </div>
						</div>
		
					</div>
				</div>
			</div>
		</div>
<!---728x90--->
		<!--footer-->
		 <?php include "include/footer.php" ?>

		<!--//footer-->
	</div>

	<div class="modal fade" id="confirmation" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" method="POST">
                <p style="text-align: center;">Are you sure you want to delete this record</p>
                    <input type="hidden" name="id" id="tid">
                    <center><button type="submit" class="btn btn-danger" name="bdelete">Yes</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
                                 
<script>
    function openmodal(id)
    {
      $("#tid").val(id)
      $('#confirmation').modal()
    }
</script>


	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	<script type="text/javascript" src="js/niceeditor.js"></script> 
        <script type="text/javascript">
        //<![CDATA[
                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
          //]]>
          </script>
  

	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
	<!--validator js-->
	<script src="js/validator.min.js"></script>

	<!--//validator js-->
	
</body>


</html>