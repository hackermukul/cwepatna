<?php
 include "../config/config.php";
 include "../config/database.php";
 include "../classfile/admin.php";
 include "../classfile/data.php";
    $adm=new admin();
    $da=new data();
    if(isset($_POST['category']))
    {
        $courselist=$da->getcourse_bycategory($_POST['category']);
        if($courselist!=FALSE)
        {
            $courselist=$courselist['total_row'];
            echo "<option value=''>Select course</option>";
            foreach($courselist as $cour)
            {
               echo "<option value='".$cour['course_name']."'>".$cour['course_name']."</option>";
            }
        }
        else
            echo "<option value=''>No record found</option>";
    }
    if(isset($_POST['course']))
    {
        $fee=$da->getcourse_fee($_POST['course']);
        if($fee!=FALSE)
        {
           echo $fee;
        }
        else
            echo 0;
    }

    
?>