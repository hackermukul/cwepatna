 <?php
  require_once('validation.php');
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Cwepatna| New Student Details :: </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cwepatna, Patna," />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--//Metis Menu -->
 <script> 
        function showrow(id)
        {
            if(id<5)
             $("#row"+id).show();
            else
                alert('Only 5 row is allowed')
        }
       
        var loadFile1 = function(event) {
        var img1 = document.getElementById('upload_photo');
        img1.src = URL.createObjectURL(event.target.files[0]);
        };     
  </script>
  <script type="text/javascript">
    $(function(){
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true
    });
});
  </script>
</head> 
<body  class="cbp-spmenu-push">
 <?php
   include "config/config.php";
   include "config/database.php";
   include "classfile/admin.php";
   include "classfile/data.php";
   include "classfile/common.php";
        
    $adm=new admin();
    $da=new data();
    $id="";
    $msg="";
    $newcourselist=$da->getnewcourse_details();
    $categorylist=$da->getcourse_category();
    $newcourselist=$newcourselist==FALSE?FALSE:$newcourselist['total_row'];
    $categorylist=$categorylist==FALSE?FALSE:$categorylist['total_row'];
     if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }

    if(isset($_REQUEST['bsave']))
    {
     $str= $adm->save_studentdetails();
    }
    if(isset($_REQUEST['bupdate']))
    {
     $str= $adm->update_student();
    }

     if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $studentdetails=$da->getstudentdata($id);
        $studentdetails=$studentdetails['single_row'];
    }
    $sl_no=$da->getserialno()+1;
    
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
					
					<div class="row">
						<div class="col-md-11  widget-shadow" > 
							<div class="form-title">
								<h4>New Student Addmission:</h4>
							</div>
							<div class="form-body">
			<h4 style="color:red;text-align:center;"><?php echo $msg;?><a href="new-student.php"></a></h4>
	 <form action="" method="POST"  enctype= "multipart/form-data">
            <div class="form-row">
             <!--<div class="form-group col-md-12">
                <label for="stunm"><font color="red">(*)</font>Sl No:-</label> 
                <input type="text" class="form-control" name="serail_no" value="<?php echo $sl_no; ?>" required>
              </div>
            </div>-->
              <div class="form-row">
              <div class="form-group col-md-6">
                <label for="course"><font color="red">(*)</font>Course Category:-</label>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <select class="form-control" name="course" id="category" onchange="getcourse();">
                  <option value="">Select Category</option>
                  <?php
                        if($categorylist!=FALSE)
                        {
                            foreach($categorylist as $list)
                            {
                      ?>
                      <option value="<?php echo $list['cat_course']; ?>"><?php echo $list['cat_course']; ?></option>
                      <?php
                            }
                        }
                      ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                 <label for="stunm"><font color="red">(*)</font>Course Name:-</label> 
                 <select class="form-control" name="coursenm" id="coursenm" onchange="getfee()" value="<?php echo isset($studentdetails)?$studentdetails['course_nm']:'';?>">    
                 </select>
              </div>
              </div>
              <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="pwd">Course Fee:-</label>
                 <input type="text" class="form-control" id="cfee" placeholder="Enter course Fee" name="cfee"  value="<?php echo isset($studentdetails)?$studentdetails['course_fee']:'';?>">
                </div>
                <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Course Duration:-</label>  
                 <input type="text" class="form-control" id="cduration" placeholder="Enter Course Duration" name="Duration" value="<?php echo isset($studentdetails)?$studentdetails['Duration']:'';?>">
                </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                 <label for="stunm"><font color="red">(*)</font>Student Name:-</label>  
                <input type="text" class="form-control" id="pwd" placeholder="Enter Student Name" name="sname"  value="<?php echo isset($studentdetails)?$studentdetails['s_name']:'';?>">
               </div>
               <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Student Qualification:-</label> 
                 <input type="text" class="form-control" id="pwd" placeholder="Enter Education Qualification" name="edu" value="<?php echo isset($studentdetails)?$studentdetails['edu_quali']:'';?>">
              </div>
             </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Father's Nmae/Guardian's Name:-</label>  
                 <input type="text" class="form-control" id="pwd" placeholder="Enter Father's Nmae/Guardian's Name" name="fname" value="<?php echo isset($studentdetails)?$studentdetails['f_name']:'';?>">
              </div>  
              <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Mother's Name:-</label>
                <input type="text" class="form-control"  placeholder="Enter  Mother Name" name="mname" value="<?php echo isset($studentdetails)?$studentdetails['m_name']:'';?>">
              </div>
            </div>
              <div class="form-group">
              <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Date Of Birth:-</label>       
                 <input type="text" class="form-control"  placeholder="DD/MM/YYYY" id="datepicker" name="dob" value="<?php echo isset($studentdetails)?$studentdetails['date_birth']:'';?>">
              </div>
              <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Mobile Number:-</label>
                 <input type="text" class="form-control" id="mobile" placeholder="Please Enter Valid Mobile Number " pattern="[1-9]{1}[0-9]{9}" onkeyup="check('mobile','mobmsg')" name="mobile" value="<?php echo isset($studentdetails)?$studentdetails['mobile_no']:'';?>">
                 <p id="mobmsg" style="color:red;"></p>
              </div>
            </div>
            <div class="form row">
              <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>E-Mail ID:-</label>  
                 <input type="email" class="form-control" id="pwd" placeholder="Enter E-Mail" name="email" value="<?php echo isset($studentdetails)?$studentdetails['email']:'';?>">
              </div>
              <div class="form-group col-md-6">
                 <label for="pwd1"><font color="red">(*)</font>Father's/Guardian's Mobile Number:-</label> 
                 <input type="text" class="form-control" id="mobile"  pattern="[1-9]{1}[0-9]{9}" onkeyup="check('mobile','mobmsg')" placeholder="Enter Father's/Guardian's Mobile Number" name="fno" value="<?php echo isset($studentdetails)?$studentdetails['f_mobile_no']:'';?>">
                 <p id="mobmsg" style="color:red;"></p>
              </div>
            </div> 
            <div class="form-row">
              <div class="form-group col-md-12">
                 <label for="pwd"><font color="red">(*)</font>Permanent Address:-</label>   
                <textarea class="form-control" name="caddress" ><?php echo isset($studentdetails)?$studentdetails['c_address']:'';?></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                 <label for="pwd"><font color="red">(*)</font>Correspondence Address:-</label> 
                <textarea class="form-control" name="paddress"><?php echo isset($studentdetails)?$studentdetails['p_address']:'';?></textarea>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                 <label for="pwd"><font color="red">(*)</font>Upload A Photo:-</label> 
                 <input type="file" class="form-control" onchange="loadFile1(event)"  placeholder="Upload Student Photo" name="upload_photo" value="<?php echo isset($studentdetails)?$studentdetails['upload_photo']:'';?>">
              </div>
              <div class="form-group col-md-6">
                 <label><font color="red">(*)</font>Date Of Admission:-</label>
                 <input type="date" class="form-control"  placeholder="Enter Date Of Admission" name="doa"  value="<?php echo isset($studentdetails)?$studentdetails['doa']:'';?>">
              </div>
            </div>
                  <div class="position-center" style="text-align: center;">
                        <?php   
                            if($id=="")
                            {
                        ?>
                          <button type="submit" class="btn btn-success visible"  name="bsave"><i class="fa fa-save">&nbsp;Save</i></button>
                          <button type="submit" class="btn btn-warning visible" onclick="location.href='new-student.php?id=<?php echo $row['id']; ?>'">&nbsp;Cancel</button>
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
	$("#file").hide();
     $("pagenm").hide()
    function openmodal(id)
    {
      $("#tid").val(id)
      $('#confirmation').modal()
    }
    function showhide()
    {
    	alert('ggg')
     	if($("#linktype").val()=="file")
     	{
     		$("#file").show();
     		$("pagenm").hide();
     	}
     	else
     	{
     		$("#file").hide();
     		$("pagenm").show();
     	}
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

     <script>
      function getcourse()
      {
          var cat=$("#category").val();
          if(cat){
                $.ajax({
                    type:'POST',
                    url:'classfile/ajax.php',
                    data: { category: cat },
                   success:function(html){
                       console.log(html)
                        $("#coursenm").html(html);
                        
                    }
                }); 
            }else{
                
            }
      }
    </script>
     <script>

      function getfee()
      {
        var cnm=$("#coursenm").val();
        if(cnm){
                $.ajax({
                    type:'POST',
                    url:'classfile/ajax.php',
                    data: { course: cnm },
                   success:function(html){
                       console.log(html)
                       var feelist = html.split(',');
                        $("#cfee").val(feelist[0]);
                        $("#cduration").val(feelist[1]);
                    }
                }); 
            }else{
                
            }
      }
    </script>
    <script type="text/javascript">
        function check(id,msg)
        {
            var mobile = document.getElementById(id);
            var message = document.getElementById(msg);
            var goodColor = "#0C6";
            var badColor = "#FF9B37";
            if(mobile.value.length!=10){
                mobile.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "required 10 digits, match requested format!"
                document.getElementById("bsave").disabled = true;
            }
            else
            {
                if(isNaN(mobile.value))
                {
                    mobile.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "required 10 digits, match requested format!"
                    document.getElementById("bsave").disabled = true;
                }
                else
                {
                    mobile.style.backgroundColor = '';
                    message.style.color = '';
                    message.innerHTML = ""
                    document.getElementById("bsave").disabled = false;
                }
            }
        }
 </script>
 <script type="text/javascript">
   $(function(){
    $("#datepicker1").datepicker1({
        dateFormat: "yy-mm-dd"
    });
});
 </script>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.js"> </script>
	<script src="js/validator.min.js"></script>
</body>
</html>