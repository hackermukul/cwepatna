
<?php
require_once('validation.php');
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Admin | Certificate :: </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
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
    $str="";
    $id="";
    $msg="";
    $studentlist=$da->getstudent_details();
    //$studentinfo=$da->getstudentinfodata($_GET['id']);
    $newcerificatelist=$da->getcertificate_details();
     if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }
     if(isset($_REQUEST['bsave']))
    {
     $str= $adm->save_newcertficate();
    }
    if(isset($_GET['reg_no']))
    {
      $reg=$_GET['reg_no'];
      $newcerificate=$da->certificatedetails($reg);
      $studentinfo=$da->getstudentinfodata($reg);
    } 
    /*if(isset($_REQUEST['bdelete']))
    {
      $id=$_POST['id'];
      $adm->dellete_certificate($id);
    }*/
    //$slno=$da->getserialno()+1;
    //$slno="CWE".substr(date('Y'),2,5).$slno;
?>
<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <?php include "include/nav.php" ?>
    </aside>
	</div>
		<?php include "include/header.php" ?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">
					<h2 class="title1">Issue Certificate :</h2>
					<div class="row">
						<div class="col-md-6 widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Fill Certificate detail :</h4>
							</div>
					  <div class="form-body">
			   <h4 style="color:red;text-align:center;"><?php echo $msg;?><a href="certificate_details.php"></a></h4>
	        <form action="#" method="post" enctype= "multipart/form-data">
            
              <div class="form-group">
                <label class="text-label">SL NO.</label>
                  <input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">
                  <input type="text" class="form-control" name="sid" placeholder="Enter a sl no.." value="<?php echo $studentinfo['serail_no']; ?>" readonly>
               </div>
               <div class="form-group">
                <label class="text-label">Reg No</label>
                  <input type="text" class="form-control"  name="regno" value="<?php echo $studentinfo['reg_no']; ?>" readonly>
                </div>   
              <div class="form-group">
                <label class="text-label">Place</label>
                  <input type="text" class="form-control"  name="Place" placeholder="Patna.." disabled="">
                </div>
             <div class="form-group row">
                <label for="in_year" class="col-sm-4 col-form-label text-left">Completion Date</label>
                   <div class="col-sm-4">
                   <select name="mounth" value="<?php echo isset($newcerificate)?$newcerificate['c_mounth']:'';?>" class="select2 form-control mb-3   custom-select">
                         <option>Select Month</option>
                             <?php
                                  foreach($da->getmonths() as $val)
                                  {
                                    ?>
                        <option value='<?php echo $val; ?>'><?php echo $val; ?></option>
                            <?php
                                }
                                  ?>                                                               
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <select name="year" class="select2 form-control mb-3   custom-select">
                        <option>Select Year</option>
                          <?php
                            for($i=2018;$i<=2022;$i++)
                              {
                                ?>
                       <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                         <?php
                              }
                                ?>                                                    
                      </select>
                   </div>
              </div>  
              <div class="form-group">
                <label class="text-label">DOI</label>
                <div class="input-group input-append date" id="datePicker">
                  <input type="text" class="form-control" id="val-username1"  placeholder="Enter A DOI..." name="doa" value="<?php echo isset($newcerificate)?$newcerificate['certificate_issue']:'';?>">
                   <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                 </div>
              </div>
              <div class="from row">
                <label class="text-label">Certificate Type</label>
                <select class="form-control" name="certificate_type" id="certificate_type" onchange="showhide()">
                   <option value="other_certificate">Other Certificate Issue</option> 
                   <option value="typing_certificate">Typing Certificate Issue</option> 
                </select>
              </div>
              <div class="form-group hid1">
                <label class="text-label">Gross Speed</label>
                <input type="number" class="form-control" name="gross_speed"  onchange="grade_typing()" value="<?php echo isset($newcerificate)?$newcerificate['gross_speed']:'';?>"   id="gross_speed">
              </div>
              <div class="form-group hid1">
                <label class="text-label">Net Speed</label>
                <input type="number" class="form-control" name="net_speed"  onchange="grade_typing()" value="<?php echo isset($newcerificate)?$newcerificate['net_speed']:'';?>"   id="net_speed">
              </div>
               <div class="form-group hid1">
                <label class="text-label">Typing Grade</label>  
                <input type="text" class="form-control" readonly="" name="typing_grade" value="<?php echo isset($newcerificate)?$newcerificate['typing_grade']:'';?>"  id="tye_grade">
              </div>
               <div class="form-group hid2">
                <label class="text-label">Written Mark</label>
                <input type="number" class="form-control" placeholder="Enter a Written Mark.." name="written" value="<?php echo isset($newcerificate)?$newcerificate['written_mark']:'';?>" onchange="grade_normal()"  id="written">
              </div> 
              <div class="form-group hid2">
                <label class="text-label">Pract Mark </label>
                <input type="number" class="form-control" placeholder="Enter a Pract Mark.." name="pract" value="<?php echo isset($newcerificate)?$newcerificate['practice_mark']:'';?>" onchange="grade_normal()"  id="practical">
              </div>
              <div class="form-group hid2">
                <label class="text-label">Viva</label>
                  <input type="number" class="form-control" placeholder="Enter A Viva" name="viv" value="<?php echo isset($newcerificate)?$newcerificate['viva']:'';?>" onchange="grade_normal()"  id="viva">
               </diV>          
               <div class="form-group hid2">
                <label class="text-label">Assign Mark</label> 
                  <input type="number" class="form-control" placeholder="Enter a Assign Mark..." name="Assign" value="<?php echo isset($newcerificate)?$newcerificate['assign_mark']:'';?>" onchange="grade_normal()"  id="assignment">
                </div>
              <div class="form-group hid2">
                <label class="text-label">Grade</label>
                <input type="text" class="form-control" placeholder="Enter A Grade" name="grd" value="<?php echo isset($newcerificate)?$newcerificate['grade']:'';?>" readonly id="grade">
              </div>      
             <div class="from row">
               <label class="text-label">Status</label>
               <select class="form-control" name="stu">
                <option value="Enable" <?php echo isset($newcerificate['status'])?$newcerificate['status']=='Enable'?'selected':'':'';?>>Enable</option>
                <option value="Disable" <?php echo isset($newcerificate['Disable'])?$newcerificate['Disable']=='Enable'?'selected':'':'';?>>Disable</option>
              </select>
            </div>
              <br>
              <div class="position-center" style="text-align: center;">   
          <button type="submit" class="btn btn-success"  name="bsave"><i class="fa fa-plus-square"></i>Issue</button>                  
              </div>
            </form>
                                 
							</div>
						</div>
						<div class="col-md-6  validation-grids-right">
							<div class=" form-grids row f">
            <div class="widget-shadow " data-example-id="basic-forms"> 
              <div class="form-title">
                <h4>Student Details :</h4>
              </div>
              <div class="form-body">
                <form class="form-horizontal"> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Reg. No.</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['reg_no']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Name.</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['s_name']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Father's Name</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['f_name']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Mother's Name</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['m_name']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Mobile</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['mobile_no']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['email']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">DOB</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['date_birth']; ?>" readonly > 
                   </div> 
                 </div> 
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">DOA</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['doa']; ?>" readonly > 
                   </div> 
                 </div>
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Category</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['course']; ?>" readonly > 
                   </div> 
                 </div>
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Name</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['course_nm']; ?>" readonly > 
                   </div> 
                 </div>
                  <div class="form-group"> 
                    <label for="inputEmail3" class="col-sm-2 control-label">Duration</label> 
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $studentinfo['Duration']; ?>" readonly > 
                   </div> 
                 </div> 
                 
                </form> 
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

<script>

   $('.hid2').show();

    $('.hid1').hide();

    function showhide()
    {

        var st=$('#certificate_type').val()
        if(st=="other_certificate")
        {
           $('.hid2').show(); 
           $('.hid1').hide();
        }
        else if(st=="typing_certificate")
        {
           $('.hid2').hide(); 
           $('.hid1').show();
        }
        else
        {
            $('.hid2').show();

             $('.hid1').hide();
      }

    }

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
    <script>
      
     function grade_normal() {
            var written = parseInt(document.getElementById("written").value);
            var practical = parseInt(document.getElementById("practical").value);
            var viva = parseInt(document.getElementById("viva").value);
            var assignment = parseInt(document.getElementById("assignment").value);
            var total = written + practical + viva + assignment;
            var percentage = parseInt(total/4);
            var grade = "F (Fail)";
            if (percentage >= 30 && percentage < 45){
                grade = "C (Good)";
            }
            if (percentage >= 45 && percentage < 60){
                grade = "B (Very Good)";
            }
            if (percentage >= 60 && percentage < 80){
                grade = "A (Excellent)";
            }
            if (percentage >= 80){
                grade = "A+ (Outstanding)";
            }
            document.getElementById("grade").value = grade;
        }

        function grade_typing() {
            var typing_eng = parseInt(document.getElementById("gross_speed").value);
            var typing_hindi = parseInt(document.getElementById("net_speed").value);
            var total = typing_eng + typing_hindi;
            var percentage = parseInt(total/2);
            var tye_grade = "D";
            if (percentage >= 20 && percentage < 30){
                tye_grade = "C";
            }
            if (percentage >= 30 && percentage < 40){
                tye_grade = "B";
            }
            if (percentage >= 40){
                tye_grade = "A";
            }
            document.getElementById("tye_grade").value = tye_grade;
        }
      </script>

      <script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<script type="text/javascript" src="js/niceeditor.js"></script> 
        <script type="text/javascript">
        //<![CDATA[
                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
          //]]>
          </script>
  
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
	<!--validator js-->
	<script src="js/validator.min.js"></script>

	<!--//validator js-->
	
</body>


</html>