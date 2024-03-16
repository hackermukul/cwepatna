<?php 

class website extends database
    {
    	public function getslider_details()
	   {
	   		$sql="select * from slider_details";
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

	    public function getnewcourse_details()
	   {
	   		$sql="select * from add_newcourse";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }

	   public function getabout_details()
	   {
	   		$sql="select * from about_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }

	   public function getteacher_details()
	   {
	   		$sql="select * from teacher_details";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }

	    public function getcourse_category()
	   {
	   		$sql="select * from course_category";
	   		$result=$this->selectdata($sql);
	   		//$result=mysqli_query($this->link,$sql);
	   		return $result;
	   }
	    public function getstudentdata($id)
	   {
	   		$sql="select * from  student_details where id='$id'";
	   		$result=$this->selectdata($sql);
	   		return $result;
	   }

	   

   }
?>