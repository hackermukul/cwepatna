<?php
session_start();
class login extends database
{
	public function signin()
	{
		$ctr=1;
		$id="";
		$loginuser="";
		$user="$_POST[temail]";
		$pass="$_POST[tpass]";
		$sql="select * from user_details where Email='$user' and Password='$pass' and Status='Active'";
		$str=$res=$this->selectdata($sql);
		if($res!=FALSE)
		{
		    $_SESSION['userid']=TRUE;
		    $_SESSION['alldata']=$res['mysqli_num_rows'];
		     $_SESSION['name']=$data['name'];
		    echo "<script> location.href='dashboard.php'; </script>";
		}
	    else
	        $str="Invalid login details";
    	return $str;
	}
}//end of class
	$obj=new login();
	$str="";
	if(isset($_REQUEST["blogin"]))
	{
       $str=$obj->signin();
	}
	
?>