<?php
class database extends config
{
	// Insert Data
    public function insertdata($table_name,$form_data)
    {
    	  $fields = array_keys($form_data);
    	// build the query
    	 $this->sql = "INSERT INTO ".$table_name."(`".implode('`,`', $fields)."`)VALUES('".implode("','", $form_data)."')";
    	 if(mysqli_query($this->link, $this->sql))
         {
         }
         else
         {
             echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
         }
    	return mysqli_insert_id($this->link);
    }
    public function deletedata($table_name, $where_clause='')
    {
    	$whereSQL = '';
        if(!empty($where_clause))
    	{
    		// check to see if the 'where' keyword exists
    		if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
    	    {
    			// not found, add keyword
    			$whereSQL = " WHERE ".$where_clause;
    		} else
    		{
    			$whereSQL = " ".trim($where_clause);
    		}
    	}
    	// build the query
    	$this->sql = "DELETE FROM ".$table_name.$whereSQL;
    	// run and return the query result resource
    	$res=mysqli_query($this->link,$this->sql);
    	 if($res)
         {
         }
         else
         {
             echo "ERROR: Could not able to execute $this->sql. " . mysqli_error($this->link);
         }
        return $res;
    }
    //
    //Update Data
    public function updatedata($table_name, $form_data, $where_clause='')
    {
    	$whereSQL = '';
    	if(!empty($where_clause))
    	{
    		// check to see if the 'where' keyword exists
    		if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
    		{
    			// not found, add key word
    			$whereSQL = " WHERE ".$where_clause;
    		} else
    		{
    			$whereSQL = " ".trim($where_clause);
    		}
    	}
    	// start the actual SQL statement
    	 $sql = "UPDATE ".$table_name." SET ";
    	// loop and build the column /
    	$sets = array();
    	foreach($form_data as $column => $value)
    	{
    		 $sets[] = "`".$column."` = '".$value."'";
    	}
    	$sql .= implode(', ', $sets);
    	// append the where statement
      $sql .= $whereSQL;
      
      //echo $sql;
      // run and return the query result
      $res=mysqli_query($this->link, $sql);
          if($res)
          {
          }
          else
          {
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($this->link);
          }
      
      return $res;
    }
    public function selectdata($query)
    {
        $data=array();
        $res=mysqli_query($this->link, $query);
        if(mysqli_num_rows($res)>0)
        {
            $data['count']=mysqli_num_rows($res);
            $data['single_row']=mysqli_fetch_assoc($res);
            $data['total_row']=$res;
            return $data;
        }
        else 
            return FALSE;
    }
}
$db=new database();
?>