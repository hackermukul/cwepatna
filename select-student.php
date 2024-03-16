<?php
require_once('validation.php');
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Admin | Select Student :: </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' >
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> 
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet"> 
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
    $newcerificatelist=$da->getcertificate_details();
    if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }
    //if(isset($_REQUEST['bdelete']))
    //{
      //$id=$_POST['id'];
      //$adm->dellete_certificate($id);
   // }
   // $slno=$da->getserialno()+1;
    //$slno="CWE/".substr(date('Y'),2,3).$slno;
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
          <h2 class="title1">Select Student to issue certificate:</h2>
          <div class="row"> 
            <div class="col-md-12">
              <div class="widget-shadow" data-example-id="basic-forms"> 
                <div class="form-title">
                  <h4>Select Student to issue certificate :</h4>
                </div>
                   <div class="panel-body widget-shadow">
                 <div class="table-responsive" style="font-size: 12px;">
            <table id="example" class="table">
              <thead>
                <tr>
                 <th>ID</th>
                  <th>REG</th>
                   <th>SLNO</th>
                  <th>Student Name</th>
                  <th>Father's</th>
                  <th>CourseName</th>
                  <th>DOA</th>
                  <th>FEES</th>
                  <th>FatherContact</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                        $i=1;
                        if($studentlist!=FALSE)
                            {
                            foreach($studentlist['total_row'] as $row)
                              {
                               $id=$row['id'];
                               $userinfo=$da->certificatedetails($row['reg_no']);
                               $st=$userinfo['certificate_status'];
                               $reg=$row['reg_no'];
                              
                       ?>
                 <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['reg_no']; ?></td>
                   <td>CWE<?php echo $row['serail_no']; ?></td>
                  <td><?php echo $row['s_name']; ?></td>
                  <td><?php echo $row['f_name']; ?></td>
                   <td><?php echo $row['course_nm']; ?></td>
                  <td><?php echo $row['doa']; ?></td>
                  <td><?php echo $row['course_fee']; ?></td>
                  <td><?php echo $row['f_mobile_no']; ?></td>          
                  <td>
                    <div class="d-flex">
                      <button type="button" class="btn btn-primary btn-flat btn-pri btn-lg"  onclick="location.href='certificate_details.php?reg_no=<?php echo $reg; ?>'" <?php echo $st=="Issue"?'disabled':'';?> title="Issues certificate"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Issue</button>
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
<script src='https://code.jquery.com/jquery-3.5.1.js' type='text/javascript'></script>
<script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js' type='text/javascript'></script>
<script src='https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js' type='text/javascript'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js' type='text/javascript'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js' type='text/javascript'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js' type='text/javascript'></script>
<script src='https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js' type='text/javascript'></script>
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
  <script src='js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
      $('.sidebar-menu').SidebarNav()
  </script>
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
  <script src="js/jquery.nicescroll.js"></script>
  <script src="admin/js/scripts.js"></script>
  <script src="js/bootstrap.js"> </script>
  <!--validator js-->
  <script>
        $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',

                'excelHtml5',

                'csvHtml5',

                'pdfHtml5'

            ]

        } );

    } );

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
</body>
</html>