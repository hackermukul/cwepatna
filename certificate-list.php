
<?php
require_once('validation.php');
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Admin | Certificate :: </title>
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
<link rel="stylesheet" type="text/css" href="font.css">
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
    $newcerificatelist=$da->getcertificate_details();
     if(isset($_SESSION['msg']))
      {
      $msg=$_SESSION['msg'];
      unset($_SESSION['msg']);
      }
    if(isset($_REQUEST['bdelete']))
    {
      $id=$_POST['id'];
      $adm->dellete_certificate($id);
    }
    //$certificateinfo=$dat->certificatedetails($rol);     
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
          <h2 class="title1">Issue Certificate Details :</h2>
          <div class="row">
            <div class="col-md-12  validation-grids-right">
              <div class="widget-shadow" data-example-id="basic-forms"> 
                <div class="form-title">
                  <h4>Issue Certificate List :</h4>
                </div>
                   <div class="panel-body widget-shadow">
        <div class="table-responsive" style="font-size: 12px;">
            <table id="example" class="table">
              <thead>
                <tr>   
                  <th><strong>ID</strong></th>
                  <th><strong>CertificateType</strong></th>
                  <th><strong>SLNO</strong></th>
                  <th><strong>Reg No</strong></th>
                  <th><strong>Name</strong></th>
                   <th><strong>Father</strong></th>
                   <th><strong>Course</strong></th>
                  <th><strong>DOI</strong></th>
                  <th><strong>GRADE</strong></th>
                  <!--<th><strong>W MARK</strong></th>
                  <th><strong>P MARK</strong></th>
                  <th><strong>A MARK</strong></th>
                  <th><strong>GRADE</strong></th>
                  <th><strong>VIVA</strong></th>-->
                  <th><strong>STATUS</strong></th>      
                  <th><strong>ACTION</strong></th>
                </tr>
              </thead>
              <tbody> 
                   <?php
                        $i=1;
                              //while($row=mysqli_fetch_assoc($categorylist))
                             if($newcerificatelist!=FALSE)
                                   {
                                   foreach($newcerificatelist['total_row'] as $row)
                                        {
                                          $id=$row['id'];
                                          $reg=$row['reg_no'];
                                          $student=$da->getstudentinfodata($row['reg_no']);
                                          
                                        ?>

                <tr  style="width: 124.775px;">
                  <td><?php echo $i;?> </td>
                   <td><?php echo $row['certificate_type']; ?></td>
                  <td>CWE<?php echo $row['sl_no']; ?></td>
                   <td><?php echo $row['reg_no']; ?></td>
                  <td><?php echo $student['s_name']; ?></td>
                   <td><?php echo $student['f_name']; ?></td>
                   <td><?php echo $student['course_nm']; ?></td>
                   <td><?php echo $row['certificate_issue']; ?></td>
                   <td><?php echo $row['grade']; ?></td>    
                  <!--<td><?php echo $row['written_mark']; ?></td>
                  <td><?php echo $row['practice_mark']; ?></td>
                  <td><?php echo $row['assign_mark']; ?></td>
                  <td><?php echo $row['grade']; ?></td>
                  <td><?php echo $row['viva']; ?></td>-->
                  <td><?php echo $row['status']; ?></td>
                 
                  <!--<td><?php echo $row['created_at']; ?></td>-->
                  <td>
                    <div class="d-flex">
                      <button class="btn btn-sm  btn-danger shadow btn-xs sharp mr-1" type="button" onclick="openmodal('<?php echo $id; ?>')"><i class="fa fa-trash"></i></button>
                      <a  class="btn btn-sm  btn-warning shadow btn-xs sharp mr-1" onclick="location.href='edit-certificate.php?reg_no=<?php echo $reg; ?>'"><i class="fa fa-pencil"></i></a>
                      <a  class="btn btn-sm btn-outline-success btn-xs sharp mr-1" style="background-color: #4CAF50;" onclick="printcertificate('<?php echo $reg; ?>')" title="Print Certificate"><i class="fa fa-print" style="color: white;"></i></a>
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
  <div class="modal fade" id="Certificate" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="../certificate-verify.php" method="POST">
                <p style="text-align: center;">Are you sure Print This Certificate?</p>
                    <input type="hidden" name="reg" id="reg">
                    <center><button type="submit" class="btn btn-danger" name="bdelete">Yes</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button></center>
                </form>
            </div>
        </div>
    </div>
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
    function printcertificate(id)
    {
      $("#reg").val(reg)
      $('#Certificate').modal()
    }
</script>


<script src='https://code.jquery.com/jquery-3.5.1.js' type='text/javascript'></script>

<script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js' type='text/javascript'></script>

<script src='https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js' type='text/javascript'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js' type='text/javascript'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js' type='text/javascript'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js' type='text/javascript'></script>

<script src='https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js' type='text/javascript'></script>


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

  <script src="admin/js/scripts.js"></script>

  <!--//scrolling js-->

  

  <!-- Bootstrap Core JavaScript -->

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
            var typing_eng = parseInt(document.getElementById("written").value);
            var typing_hindi = parseInt(document.getElementById("practical").value);
            var total = typing_eng + typing_hindi;
            var percentage = parseInt(total/2);
            var grade = "D";
            if (percentage >= 20 && percentage < 30){
                grade = "C";
            }
            if (percentage >= 30 && percentage < 40){
                grade = "B";
            }
            if (percentage >= 40){
                grade = "A";
            }
            document.getElementById("grade").value = grade;
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
  
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.js"> </script>
  
  <!--validator js-->
  <script src="js/validator.min.js"></script>

  <!--//validator js-->
  
</body>


</html>