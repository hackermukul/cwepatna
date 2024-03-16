<?php
require_once('validation.php');
?>
<!DOCTYPE HTML>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Admin | Course Details:: </title>
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
 <link rel="stylesheet" href="datatables.net-bs4/dataTables.bootstrap4.css">

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
<link rel="stylesheet" type="text/css" href="css/editor.css">
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
    $courselist=$da->getcourse_category();
    $newcourselist=$da->getnewcourse_details();
    if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }
    if(isset($_REQUEST['bsave']))
    {
     $str= $adm->save_newcoursedetails();
    }
    if(isset($_REQUEST['bupdate']))
    {
     $str= $adm->update_newcourse();
    }
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $newcoursedetails=$da->getnewcoursedata($id);
        $newcoursedetails=$newcoursedetails['single_row'];
    }
    if(isset($_REQUEST['bdelete']))
    {
      $id=$_POST['id'];
      $adm->dellete_newcourse($id);
    }
    
?>
<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <?php include "include/nav.php" ?>
      
        </aside>
	</div>
		<!-- header-starts -->
			<?php include "include/header.php" ?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">
					<h2 class="title1">Course Details :</h2>
					<div class="row">
						<div class="col-md-6  widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add New Course:</h4>
							</div>
							
							<div class="form-body">
			<h4 style="color:red;text-align:center;"><?php echo $msg;?><a href="course_details.php"></a></h4>

								 <form action="" method="POST"  enctype="multipart/form-data">
									<div class="form-group">
										<label><font color="red">(*)</font>Select  Course Category :-</label>
                                         <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                                <select class="form-control" name="ccat">

                                      <?php
                                    foreach($courselist['total_row'] as $list)
                                     {
                                      ?>
                                   <option value="<?php echo $list['cat_course']; ?>" <?php echo isset($newcoursedetails)?$newcoursedetails['cat_course']==$list['cat_course']?'selected':'':'';?>><?php echo $list['cat_course']; ?></option>
                                   <?php
                                      }
                                   ?>
                                </select>
									</div>

									<div class="form-group">
									  <label><font color="red">(*)</font>Course Name:-  </label>
                  
						                <input type="text" class="form-control" placeholder="Enter Course Name" name="cname"  value="<?php echo isset($newcoursedetails)?$newcoursedetails['course_name']:'';?>">
						             </div>
								
								  <div class="form-group">
									 <label><font color="red">(*)</font>Total Fee:- </label> 
                                     <input type="text" class="form-control" placeholder="Enter Total fee" name="cfee" value="<?php echo isset($newcoursedetails)?$newcoursedetails['total_fee']:'';?>">
								  </div>
								  <div class="form-group">
									 <label><font color="red">(*)</font>Course Duration:- </label> 
                                     <input type="text" class="form-control" placeholder="Enter Course Duration" name="Duration" value="<?php echo isset($newcoursedetails)?$newcoursedetails['course_duration']:'';?>">
								  </div>
								  <div class="form-group">
									  <label><font color="red">(*)</font> Impotant Course Topice:- </label>
                                      <textarea class="form-control"  placeholder=" Enter Impotant Course Topice" name="cshort"  ><?php echo isset($newcoursedetails)?$newcoursedetails['short_des']:'';?></textarea>
								  </div>
								   <div class="form-group">
									  <label><font color="red">(*)</font>Short  Course Descripsion:- </label>
                                      <textarea class="form-control"  placeholder="Short Descripsion" name="c_describe"  ><?php echo isset($newcoursedetails)?$newcoursedetails['course_des']:'';?></textarea>
								  </div>

								  <div class="form-group">
									  <label><font color="red">(*)</font>Image Upload:- </label>
                                      <input type="file" class="form-control" placeholder="Enter Total fee" name="cphoto" value="<?php echo isset($newcoursedetails)?$newcoursedetails['image']:'';?>">
								  </div>
                                   
									<div class="form-group">
										<label><font color="red">(*)</font>Status:-</label>
										<select id="inputState" class="form-control" name="status"  value="<?php echo isset($coursedetails)?$coursedetails['status']:'';?>">
                                        <option>Enable</option>
						                    <option>Disable</option>
						                </select>
						               
                                    </div>
									
								 <div class="position-center">
			                        <?php   
			                            if($id=="")
			                            {
			                        ?>
			                         <button type="submit" class="btn btn-success visible"  name="bsave"><i class="fa fa-save">&nbsp;Save</i></button>
			                          <button type="submit" class="btn btn-warning visible" onclick="location.href='course_details.php ?id=<?php echo $row['id']; ?>'">&nbsp;Cancel</button>
			                            <?php
			                            }
			                            else
			                            {
			                        ?>
			                         <button type="submit" class="btn btn-info" name="bupdate">Update</button>
			                        <?php
			                            }
			                        ?>
                                 </div>
                           </form>
                      
							</div>
						</div>
						<div class="col-md-6  validation-grids-right">
							<div class="widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Course Details List :</h4>
								</div>
					         <div class="panel-body widget-shadow">
				<div class="table-responsive" style="font-size: 10px;">
						<table class="table" id="order-listing">
							<thead>
								<tr>
								   <th><strong style="font-size: 10px;">ID</strong></th>
				                  <th><strong style="font-size: 10px;">COURSE</strong></th>
				                  <th><strong style="font-size: 10px;">COURSE NAME</strong></th>
				                  <th><strong style="font-size: 10px;"> FEES</strong></th>
				                   <th><strong style="font-size: 10px;">DURATION</strong></th>
				                  <!--<th><strong style="font-size: 10px;">SHORT D</strong></th>
				                   <th><strong style="font-size: 10px;">IMAGE</strong></th>-->
				                 
				                  <th><strong style="font-size: 10px;">CREATED DT</strong></th>
				                  <th><strong style="font-size: 10px;">ACTION</strong></th>
							   </tr>
							</thead>
							<tbody>
								 <?php
                                $i=1;
                                            //while($row=mysqli_fetch_assoc($categorylist))
                             if($newcourselist!=FALSE)
                                   {
                                   foreach($newcourselist['total_row'] as $row)
                                        {
                                          $id=$row['id'];
                              
                                        ?>
								  <tr>
					                  <td><?php echo $i;?> </td>
					                  <td><?php echo $row['cat_course']; ?></td>
					                  <td><?php echo $row['course_name']; ?></td>
					                  <td><?php echo $row['total_fee']; ?></td>
					                  <td><?php echo $row['course_duration']; ?></td>
					                  <!--<td><?php echo $row['short_des']; ?></td>
					                  <td><img  width="50" height="50" src="classfile/slider/<?php echo $row['image']; ?>"></td>-->
					                  <!-- <td><?php echo $row['status']; ?></td>-->
					                  <td><?php echo $row['created_at']; ?></td>
					                  <td>
		                    <div class="d-flex">
		                      <button class="btn btn-danger shadow btn-xs sharp mr-1" type="button" onclick="openmodal('<?php echo $id; ?>')"><i class="fa fa-trash"></i></button>
		                  
		                      <a  class="btn  btn-success shadow btn-xs sharp mr-1"  href="course_details.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>
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

<script type="text/javascript" src="js/niceeditor.js"></script> 
        <script type="text/javascript">
        //<![CDATA[
                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
          //]]>
          </script>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
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

	<script src="datatables.net/jquery.dataTables.js"></script>
  <script src="datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>
	
</body>


</html>