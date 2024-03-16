<?php
class admin extends database
{
    public function save_studentdetails()
    {
        $slno=$_POST['serial_no'];
        $sql="select * from  student_details where serail_no='$slno' order by id desc limit 1";
        $result=$this->selectdata($sql);
        $student=$result['single_row'];
        $id=$student['id'];
        $id=$id+1;
        $reg="CWE/3025/".$_POST['serail_no'];
        if($result==FALSE)
        {
            $stuimg = $_FILES['upload_photo']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['upload_photo']["name"]);
            move_uploaded_file($_FILES['upload_photo']["tmp_name"], $target_file); 
            $data=array(
                "reg_no"=>$reg,
                "serail_no"=>$_POST['serail_no'],
                "course"=>$_POST['course'],
                "course_nm"=>$_POST['coursenm'],
                "s_name"=>$_POST['sname'],
                "f_name"=>$_POST['fname'],
                "m_name"=>$_POST['mname'],
                "date_birth"=>$_POST['dob'],
                "mobile_no"=>$_POST['mobile'],
                "email"=>$_POST['email'],
                "f_mobile_no"=>$_POST['fno'],
                "course_fee"=>$_POST['cfee'],
                "c_address"=>addslashes($_POST['caddress']),
                "p_address"=>addslashes($_POST['paddress']),
                "edu_quali"=>$_POST['edu'],
                "Duration"=>$_POST['Duration'],
                "doa"=>$_POST['doa'],
                "upload_photo"=>$stuimg,     
            );
           //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
            if($this->insertdata('student_details',$data)/*mysqli_query($this->link, $sql)*/)
            {
                        //echo "<script>window.location.href ='ad_card.php'</script>";
                $str="New Addmission Successfull Save,Registration No. is $reg ";
            }
           else
            {
                $str="Failed";
                echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
            }
        }
        else
             $str="Serail No already exist";
             $_SESSION['msg']=$str;  
            $this->redirect_back();
  
    }
    public function update_student()
    {    
         $stuimg = $_FILES['upload_photo']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['upload_photo']["name"]);
           move_uploaded_file($_FILES['upload_photo']["tmp_name"], $target_file);  
        $data=array(

                "course"=>$_POST['course'],
                "course_nm"=>$_POST['coursenm'],
                "s_name"=>$_POST['sname'],
                "f_name"=>$_POST['fname'],
                "m_name"=>$_POST['mname'],
                "date_birth"=>$_POST['dob'],
                "mobile_no"=>$_POST['mobile'],
                "email"=>$_POST['email'],
                "f_mobile_no"=>$_POST['fno'],
                "course_fee"=>$_POST['cfee'],
                "c_address"=>addslashes($_POST['caddress']),
                "p_address"=>addslashes($_POST['paddress']),
                "edu_quali"=>$_POST['edu'],
                "Duration"=>$_POST['Duration'],
                "doa"=>$_POST['doa'],
                "upload_photo"=>$stuimg,
              );

        $id=$_POST['id'];
        //upload icon
                                                   
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('student_details',$data,"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str=" Student Details Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
  
   }
    //delete heading
    public function dellete_student($id)
    {
         $str="";
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('student_details',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            //echo "<script>alert('Student Removed successfull.')</script>";
            $str=" Student Details Removed successfull.";
        }
       else
        {   $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
    }
    public function save_coursedetails()
    {     
        date_default_timezone_set('Asia/Kolkata');
        $now=date('Y-m-d H:i');
           $pimg = $_FILES['catimage']["name"];                                               
           $target_dir = "classfile/slider/";
           $target_file = $target_dir . basename($_FILES['catimage']["name"]);
           move_uploaded_file($_FILES['catimage']["tmp_name"], $target_file); 
        $data=array(
            "image"=>addslashes($pimg),
            "cat_course"=>addslashes($_POST['catcourse']),
            "short_des"=>addslashes($_POST['shortdes']),
            "status"=>addslashes($_POST['status']),        
        );
       //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
        if($this->insertdata('course_category',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str="course save successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
          $_SESSION['msg']=$str;  
        $this->redirect_back();
  
    }
        public function dellete_course($id)
    {
        $str="";
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('course_category',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            //echo "<script>alert('Course Removed successfull.')</script>";
              $str=" Course Removed successfull.";
        }
       else
        {
             $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
    }
     

     public function update_course()
    {


        date_default_timezone_set('Asia/Kolkata');
        $now=date('Y-m-d H:i');
        $pimg = $_FILES['catimage']["name"];                                               
        $target_dir = "classfile/slider/";
        $target_file = $target_dir . basename($_FILES['catimage']["name"]);
        move_uploaded_file($_FILES['catimage']["tmp_name"], $target_file); 
        $data=array(
            "image"=>addslashes($pimg),
            "cat_course"=>addslashes($_POST['catcourse']),
            "short_des"=>addslashes($_POST['shortdes']),
            "status"=>addslashes($_POST['status']),       
        );
        $id=$_POST['id'];
        //upload icon                                                
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('course_category',$data,"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
   }
    
     public function save_newcoursedetails()
    {     
            $cimg = $_FILES['cphoto']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['cphoto']["name"]);
           move_uploaded_file($_FILES['cphoto']["tmp_name"], $target_file);  
        $data=array(
            "cat_course"=>addslashes($_POST['ccat']),
             "course_name"=>addslashes($_POST['cname']),
             "total_fee"=>addslashes($_POST['cfee']),
             "course_duration"=>addslashes($_POST['Duration']),
             "short_des"=>addslashes($_POST['cshort']),
             "course_des"=>addslashes($_POST['c_describe']),
             "image"=>addslashes($cimg),
             "status"=>$_POST['status'],          
            );
       //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
        if($this->insertdata('add_newcourse',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str="New Course save successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
    }


 public function dellete_newcourse($id)
    {
        $str="";
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('add_newcourse',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            echo "<script>alert(' New Course Removed successfull.')</script>";
            $str="New Course Removed successfull";
        }
       else
        {
            $str="Failed.";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         $_SESSION['msg']=$str;  
        $this->redirect_back();
    }
    public function update_newcourse()
    {
       
            $cimg = $_FILES['cphoto']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['cphoto']["name"]);
           move_uploaded_file($_FILES['cphoto']["tmp_name"], $target_file); 
       
        $data=array(
             "cat_course"=>addslashes($_POST['ccat']),
             "course_name"=>addslashes($_POST['cname']),
             "total_fee"=>addslashes($_POST['cfee']),
             "course_duration"=>addslashes($_POST['Duration']),
             "short_des"=>addslashes($_POST['cshort']),
             "course_des"=>addslashes($_POST['c_describe']),
             "image"=>addslashes($cimg),
             "status"=>$_POST['status'],    
        );
        $id=$_POST['id'];
        //upload icon                                             
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('add_newcourse',$data,"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
       $_SESSION['msg']=$str;  
        $this->redirect_back();
          
   }

    public function save_newcertficate()
    {
        $data=array(
            "sl_no"=>$_POST['sid'],
            "certificate_type"=>$_POST['certificate_type'],
            "reg_no"=>$_POST['regno'],
            "place"=>"Patna",
            "c_mounth"=>$_POST['mounth'],
            "c_year"=>$_POST['year'],
            "certificate_issue"=>$_POST['doa'],
            "written_mark"=>$_POST['written'],
            "practice_mark"=>$_POST['pract'],
            "assign_mark"=>$_POST['Assign'],
            "gross_speed"=>$_POST['gross_speed'],
            "net_speed"=>$_POST['net_speed'],
            "typing_grade"=>$_POST['typing_grade'],
            "grade"=>$_POST['grd'],
            "viva"=>$_POST['viv'], 
            "status"=>$_POST['stu'],
        );
       //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
        if($this->insertdata('certificate_details',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str=" Certificate Issue successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
          $_SESSION['msg']=$str;  
        $this->redirect_back();
    
        }
    
     public function dellete_certificate($id)

   {
        $str="";
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('certificate_details',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            //echo "<script>alert(' New Certificate Removed successfull.')</script>";
            $str="New Certificate Removed successfull";
        }
       else
        {
            $str="Failed.";
             echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
            
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
    }

       public function update_certificate()
         {
         $data=array(
            
            "certificate_type"=>$_POST['certificate_type'],
            "place"=>"Patna",
            "c_mounth"=>$_POST['mounth'],
            "c_year"=>$_POST['year'],
            "certificate_issue"=>$_POST['doa'],
            "written_mark"=>$_POST['written'],
            "practice_mark"=>$_POST['pract'],
            "assign_mark"=>$_POST['Assign'],
            "gross_speed"=>$_POST['gross_speed'],
            "net_speed"=>$_POST['net_speed'],
            "typing_grade"=>$_POST['typing_grade'],
            "grade"=>$_POST['grd'],
            "viva"=>$_POST['viv'], 
            "status"=>$_POST['stu'], 
        );

        $id=$_POST['reg_no'];
        //upload icon
                                                   
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('certificate_details',$data,"where reg_no='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update Certificate successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
        
        }

     public function save_noticedetails()
    {
            $photo = $_FILES['tfile']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['tfile']["name"]);
           move_uploaded_file($_FILES['tfile']["tmp_name"], $target_file); 
        $data=array(
            "type"=>addslashes($_POST['ntype']),
            "title"=>addslashes($_POST['type']),
            "descripsion"=>addslashes($_POST['sdes']),
            "image"=>addslashes($photo),
            "status"=>addslashes($_POST['status']),  
         );
        if($this->insertdata('notice_details',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str=" Save Notice successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
           $_SESSION['msg']=$str;  
        $this->redirect_back();
  
    }
     public function dellete_notice($id)
    {
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('notice_details',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            echo "<script>alert(' Notice Removed successfull.')</script>";
        }
       else
        {
            //echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
  
    }
     public function update_notice()
    {
            $photo = $_FILES['tfile']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['tfile']["name"]);
           move_uploaded_file($_FILES['tfile']["tmp_name"], $target_file); 
       
        $data=array(
            "type"=>addslashes($_POST['ntype']),
            "title"=>addslashes($_POST['type']),
            "descripsion"=>addslashes($_POST['sdes']),
            "image"=>addslashes($photo),
            "status"=>addslashes($_POST['status']),      
        );
        $id=$_POST['id'];
        //upload icon                                                  
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('notice_details',$data,"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         $_SESSION['msg']=$str;  
        $this->redirect_back();
  
   }
        public function save_sliderdetails()
    {

        date_default_timezone_set('Asia/Kolkata');
        $now=date('Y-m-d H:i');
            $bslider = $_FILES['sbimage']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['sbimage']["name"]);
            move_uploaded_file($_FILES['sbimage']["tmp_name"], $target_file); 
         $data=array(
            "type"=>($_POST['stype']),
            "sbi"=>$bslider,
            "status"=>$_POST['status'],
            "created_at"=>$now,
        
 );
       //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
        if($this->insertdata('slider_details',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str=" Save Slider successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
           $_SESSION['msg']=$str;  
        $this->redirect_back();
  
    }

    public function dellete_slider($id)
    {
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('slider_details',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            echo "<script>alert(' Slider Removed successfull.')</script>";
        }
       else
        {     $str="Failed";
            //echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         $_SESSION['msg']=$str;  
        $this->redirect_back();
    }
    
     public function update_slider()

       {
            $bslider = $_FILES['sbimage']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['sbimage']["name"]);
            move_uploaded_file($_FILES['sbimage']["tmp_name"], $target_file); 
            $data=array(
            "type"=>addslashes($_POST['stype']),
            "sbi"=>$bslider,
            "status"=>$_POST['status'],
            "created_at"=>date('Y-m-d'),
        );

        $id=$_POST['id'];
        //upload icon
                                                   
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('slider_details',$data,"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         echo "<script>window.location.href ='slider_details.php?msg=".$str."'</script>";
   }

    public function save_aboutdetails()
    {     
            $aimg = $_FILES['tfile']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['tfile']["name"]);
            move_uploaded_file($_FILES['tfile']["tmp_name"], $target_file);  

        $data=array(
            "title"=>addslashes($_POST['title']),
             "Description"=>addslashes($_POST['sdes']),
             "mision"=>addslashes($_POST['MIS']),
             "vision"=>addslashes($_POST['vis']),
             "our_journey"=>addslashes($_POST['Journey']),
             "our_leadership"=>addslashes($_POST['Leadership']),
             "image"=>$aimg,
             "status"=>$_POST['status'],
             );
       //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
        if($this->insertdata('about_details',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str=" Save About successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
          $_SESSION['msg']=$str;  
        $this->redirect_back();
    }

     public function dellete_about($id)
    {
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('about_details',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            echo "<script>alert(' About Removed successfull.')</script>";
        }
       else
        {     
            $str="Failed";
            //echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         $_SESSION['msg']=$str;  
        $this->redirect_back();
    }

    public function update_about()
    {
            $aimg = $_FILES['tfile']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['tfile']["name"]);
            move_uploaded_file($_FILES['tfile']["tmp_name"], $target_file);  
        $data=array(
            "title"=>addslashes($_POST['title']),
            "Description"=>addslashes($_POST['sdes']),
            "mision"=>addslashes($_POST['MIS']),
            "vision"=>addslashes($_POST['vis']),
            "our_journey"=>addslashes($_POST['Journey']),
            "our_leadership"=>addslashes($_POST['Leadership']),
            "image"=>$aimg,
            "status"=>$_POST['status'],
            );
        $id=3;

        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('about_details',$data,"where id='3'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
   }

    public function save_teacheretails()
    {     
            $teac = $_FILES['Faculty']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['Faculty']["name"]);
            move_uploaded_file($_FILES['Faculty']["tmp_name"], $target_file);  
        $data=array(
            "teacher_nam"=>addslashes($_POST['nam']),
             "teacher_post"=>addslashes($_POST['post']),
             "descripsion"=>addslashes($_POST['de']),
             "image"=>$teac,
             "status"=>$_POST['status'],
             );
       //$sql="insert into category_details(category,status,create_at) values('$head','$file',now())";
        if($this->insertdata('teacher_details',$data)/*mysqli_query($this->link, $sql)*/)
        {
                    //echo "<script>window.location.href ='ad_card.php'</script>";
            $str=" Save Teacher successfully ";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
        $_SESSION['msg']=$str;  
        $this->redirect_back();
    }
  
     public function dellete_teacher($id)
    {
        //$sql="delete from  category_details where catid='$catid'";
        if($this->deletedata('teacher_details',"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            echo "<script>alert(' About Removed successfull.')</script>";
        }
       else
        {
            $str="Failed";
            //echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         $_SESSION['msg']=$str;  
        $this->redirect_back();
    }
    public function update_teacher()
    {
            $teac = $_FILES['Faculty']["name"];                                               
            $target_dir = "classfile/slider/";
            $target_file = $target_dir . basename($_FILES['Faculty']["name"]);
            move_uploaded_file($_FILES['Faculty']["tmp_name"], $target_file);  
        $data=array(
            "teacher_nam"=>addslashes($_POST['nam']),
            "teacher_post"=>addslashes($_POST['post']),
            "descripsion"=>addslashes($_POST['de']),
            "image"=>$teac,
            "status"=>$_POST['status'],    
        );
        $id=$_POST['id'];
        //upload ico                                             
        $str="";
         //$sql="update category_details set category='$head',status='$file' where catid='$catid'";
        if($this->updatedata('teacher_details',$data,"where id='$id'")/*mysqli_query($this->link, $sql)*/)
        {
            $str="Update successfully";
        }
       else
        {
            $str="Failed";
            echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
        }
         $_SESSION['msg']=$str;  
        $this->redirect_back();
   }
 }
$adm= new admin();   
?>
