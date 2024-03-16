<?php
	class data extends database
	{
	    public function getstudent_details()
	   {
	   		$sql="select * from student_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
	   public function getserialno()
	   {
	   		$sql="select * from student_details order by serail_no desc limit 1";
	   		$result=$this->selectdata($sql);
	   		$details=$result['single_row'];
	   		$serail_no=$details['id'];
	   		return $serail_no;
	   }

	   public function getstudentdata($id)
	   {
	   		$sql="select * from  student_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	   public function getstudentinfodata($id)
    {

         $sql="select * from student_details where reg_no='$id'";
         $studentinfo=$this->selectdata($sql);
         $studentinfo=$studentinfo['single_row'];
         return $studentinfo;
    }
	   public function getstudentinfo($roll)
	   {
	   		$sql="select * from  student_details where reg_no='$roll' or mobile_no='$roll'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	   /*public function getstudentinfo($typing)
	   {
	   		$sql="select * from  student_details where serail_no='$typing' or date_birth='$typing'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }*/
	   public function getcourse_category()
	   {
	   		$sql="select * from course_category";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }

	   public function getenquiry_details()
	   {
	   		$sql="select * from enquiry_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
	   public function getenquirydata($id)
	   {
	   		$sql="select * from  enquiry_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	   
        public function getcoursedata($id)
	   {
	   		$sql="select * from  course_category where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	   public function getnewcourse_details()
	   {
	   		$sql="select * from add_newcourse";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
       public function getcourse_bycategory($cat)
	   {
	   		$sql="select * from add_newcourse where cat_course='$cat'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	   public function getcourse_fee($course)
	   {
	   		$sql="select * from add_newcourse where course_name='$course'";
	   		$result=$this->selectdata($sql);
	   		if($result!=FALSE)
	   		{
	   			$row=$result['single_row'];
	   			return $row['total_fee'].','.$row['course_duration'];
	   		}
	   		else
	   		return FALSE;
	   }
	   
	     public function getnewcoursedata($id)
	   {
	   		$sql="select * from  add_newcourse where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	    public function getCourseDetails($cat,$course)
	   {
	   		$sql="select * from  add_newcourse where cat_course='$cat' and course_name='$course'";
	   		$result=$this->selectdata($sql);
	   		return $result['single_row'];
	   }
	    public function getcertificateList($reg_no)
     {
        $sql="SELECT * FROM certificate_details INNER JOIN student_details ON certificate_details.reg_no=student_details.reg_no";
        $studentjoindetails=$this->selectdata($sql);
        if($studentjoindetails!=FALSE)
        {
            return $studentjoindetails['total_row'];   
        }
        else
            return FALSE;
     }
	  
	   public function certificatedetails($reg_no)
	   {
	   		$sql="SELECT * FROM certificate_details INNER JOIN student_details ON certificate_details.reg_no=student_details.reg_no where certificate_details.reg_no='$reg_no'";
	   		$result=$this->selectdata($sql);
	   		if($result==FALSE)
	   			return FALSE;
	   		else
	   	    	return $result['single_row'];
	   }

	   public function getnewcertificate($id)
	   {
	   		$sql="select * from  certificate_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   	     return $result;
	   }
 
	   public function getcertificate_details()
	   {
	   		$sql="select * from certificate_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }

	    public function getnotice_details()
	   {
	   		$sql="select * from notice_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
	     public function getnoticeedata($id)
	   {
	   		$sql="select * from  notice_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	    public function getslider_details()
	   {
	   		$sql="select * from slider_details where status='Enable'";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
	   public function getsliderdata($id)
	   {
	   		$sql="select * from  slider_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }
	   
	   public function getmonths()
	   {
	   		return array("Janaury","February","March","April","May","June","July","August","September","October","November","December");
	   }
	    public function getaboutdata()
	   {
	   		$sql="select * from  about_details where id='3'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }

	    public function getabout_details()
	   {
	   		$sql="select * from about_details where id='3'";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
	    
	    public function getteacherdata($id)
	   {
	   		$sql="select * from  teacher_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }

	    public function getteacher_details()
	   {
	   		$sql="select * from teacher_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }

	   
	   public function getdashboardreport()
  {
      $sql="select * from student_details";
      $result=mysqli_query($this->link,$sql);
      $data['total_student']=mysqli_num_rows($result);
      $sql="select * from course_category";
      $result=mysqli_query($this->link,$sql);
      $data['total_course_category']=mysqli_num_rows($result);

       $sql="select * from certificate_details";
      $result=mysqli_query($this->link,$sql);
      $data['total_certificate_issue']=mysqli_num_rows($result);
      
       $sql="select * from slider_details";
      $result=mysqli_query($this->link,$sql);
      $data['total_slider']=mysqli_num_rows($result);
       $sql="select * from add_newcourse";
      $result=mysqli_query($this->link,$sql);
      $data['total_course']=mysqli_num_rows($result);
       
          return $data;
  }
	   
	}
	$da= new data();
?>