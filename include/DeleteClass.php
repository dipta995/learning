<?php 
include_once 'dbcon.php';
class DeleteClass extends DatabaseConnection
{
	
	public function __construct(){
		$this->connectDataBase();	
		
		}

 

	public function deletequiz($course_id,$quiz_id){
		$sql = "DELETE FROM quiz_ans_table WHERE quiz_id = $quiz_id";
		$sqls = "DELETE FROM quiz_table WHERE quiz_id = $quiz_id";
		$result = $this->queryfunk($sql);
		$results = $this->queryfunk($sqls);
			if ($result==true && $results==true) {
			 
				echo $message = "<script> window.location = 'createquiz.php?playlistid=$course_id';</script>";
			}

	}
	public function removecat($catid){
			  $query = "SELECT * FROM category_table WHERE category_id = '$catid'";
		    $getdata = self::queryfunk($query);
		     	while ($selectedimg = $getdata->fetch_assoc()) { 
		            $delimg = '../'.$selectedimg['category_image'];
		            unlink($delimg);
		        }
		$sql = "DELETE FROM category_table WHERE category_id = $catid";
	 
		$result = $this->queryfunk($sql);
 
			if ($result==true) {
				echo $message = "<script> window.location = 'cat.php';</script>";
			}

	}




}

