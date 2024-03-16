<?php
require_once('validation.php');
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Course Category | Computer Warriors Education Pvt. Ltd.</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="datatables.net-bs4/dataTables.bootstrap4.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/editor.css">
</head> 
<body  class="cbp-spmenu-push">
<?php
include "config/config.php";
include "config/database.php";
include "classfile/admin.php";
include "classfile/data.php";
        
    $adm=new admin();
    $da=new data();
    $id="";
    $msg="";
    $courselist=$da->getcourse_category();
    if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }
    if(isset($_REQUEST['bsave']))
    {
     $str= $adm->save_coursedetails();
    }
    if(isset($_REQUEST['bupdate']))
    {
     $str= $adm->update_course();
    }
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $coursedetails=$da->getcoursedata($id);
        $coursedetails=$coursedetails['single_row'];
    }
    if(isset($_REQUEST['bdelete']))
    {
      $id=$_POST['id'];
      $adm->dellete_course($id);
    }
    
?>
<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <?php include "include/nav.php" ?>
      
        </aside>
	</div>
		
	<?php include "include/header.php" ?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">
					<h2 class="title1">Course Category:</h2>
					<div class="row">
						<div class="col-md-3 validation-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Course Category Details :</h4>
							</div>
							
							<div class="form-body">
			              <h4 style="color:red;text-align:center;"><?php echo $msg;?></h4>
  
								<form action="" method="POST" enctype= "multipart/form-data">
									<div class="form-group">
										<label><font color="red">(*)</font> Image:-</label>
                                         <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                                         <input type="file" class="form-control" placeholder="Enter Course Category" name="catimage" value="<?php echo isset($coursedetails)?$coursedetails['image']:'';?>">
									</div>
									<div class="form-group">
										<label><font color="red">(*)</font> Course Category:-</label>
                                          
                                         <input type="text" class="form-control" placeholder="Enter Course Category" name="catcourse" value="<?php echo isset($coursedetails)?$coursedetails['cat_course']:'';?>">
									</div>
									<div class="form-group">
										<label><font color="red">(*)</font> Short Descripsion:-</label>
                                          
                                         <textarea  class="form-control" placeholder="Enter Category Descripsion" name="shortdes"><?php echo isset($coursedetails)?$coursedetails['short_des']:'';?></textarea>
									</div>
                                   
									<div class="form-group">
										<label><font color="red">(*)</font>Status:-</label>
										<select id="inputState" class="form-control" name="status">
                                         <option value="Enable" <?php echo isset($coursedetails['status'])?$coursedetails['status']=='Enable'?'selected':'':'';?>>Enable</option>
                                         <option value="Disable" <?php echo isset($coursedetails['Disable'])?$coursedetails['Disable']=='Enable'?'selected':'':'';?>>Disable</option>
						                </select>
						               
                                    </div>
									
								 <div class="position-center">
			                        <?php   
			                            if($id=="")
			                            {
			                        ?>
			                          <button type="submit" class="btn btn-success visible"  name="bsave"><i class="fa fa-save">&nbsp;Save</i></button>
			                          <button type="submit" class="btn btn-warning visible" onclick="location.href='course_category ?id=<?php echo $row['id']; ?>'">&nbsp;Cancel</button>

			                         <?php
			                            }
			                            else
			                            {
			                        ?>
			                         <button type="submit" class="btn btn-primary visible" name="bupdate">Update</button>

			                        <?php
			                            }
			                        ?>
			                         </div>
			                    </form>
							</div>
						</div>
						<div class="col-md-9 validation-grids validation-grids-right">
							<div class="widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4> Course Category List :</h4>
								</div>
					         <div class="panel-body widget-shadow">
				         <div class="table-responsive" style="font-size: 12px;">
						<table class="table table-hover" id="order-listing">
							<thead>
								<tr>
								  <th><strong>ID</strong></th>
								  <th><strong>Image</strong></th>
				                  <th><strong>COURSE</strong></th>
				                  <th><strong>STATUS</strong></th>
				                  <th><strong>Entry Date</strong></th>
				                  
				                  <th><strong>ACTION</strong></th>
						     	</tr>
							</thead>
							<tbody>
								 <?php
                                $i=1;
                                            //while($row=mysqli_fetch_assoc($categorylist))
                             if($courselist!=FALSE)
                                   {
                                   foreach($courselist['total_row'] as $row)
                                        {
                                          $id=$row['id'];
                              
                                        ?>
     
								 <tr>
					                  <td><?php echo $i;?> </td>
					                  <td><img  width="50" height="50" src="classfile/slider/<?php echo $row['image']; ?>"></td>
					                  <td><?php echo $row['cat_course']; ?></td>
					                  <td><?php echo $row['status']; ?></td>
					                  <td><?php echo $row['created_at']; ?></td>
					                 
                  <td>
                    <div class="d-flex">
                      <button class="btn  btn-sm btn-danger shadow btn-xs sharp mr-1" type="button" onclick="openmodal('<?php echo $id; ?>')"><i class="fa fa-trash"></i></button>
                  
                      <a  class="btn  btn-sm btn-success  shadow btn-xs sharp mr-1" href="course_category.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
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