<?php 
include_once 'dbcon.php';
class ViewClass extends DatabaseConnection
{
	
	public function __construct(){
		$this->connectDataBase();
		
		
		}
public function shorter($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}
public function catview(){
	$sqlquery = "SELECT * FROM category_table";
	$result = $this->queryfunk_help($sqlquery);
	return $result;
	}
	public function catviewlimit($limit){
		$sqlquery = "SELECT * FROM category_table limit $limit";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function catviewbyId($id){
			$sqlquery = "SELECT * FROM category_table WHERE category_id = $id";
			$result = $this->queryfunk_help($sqlquery);
			return $result;
			}
			public function studentlist(){
		$sqlquery = "SELECT * FROM student_table";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
public function teacherlist(){
		$sqlquery = "SELECT * FROM teacher_table";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}


		public function teacherview($teacher_id){
		$sqlquery = "SELECT * FROM teacher_table WHERE teacher_id='$teacher_id'";
		$result = $this->queryfunk_help($sqlquery);
		$value = mysqli_fetch_array($result);
		$res = "<div class='ca-pic set-bg' data-setbg='".$value['teacher_image']."'></div><p>".$value['teacher_name']."";
		 
		return $res;
		}
		public function teacherviews($teacher_id,$teacher_name){
				$sqlquery = "SELECT * FROM teacher_table WHERE teacher_id='$teacher_id' AND teacher_name='$teacher_name'";
				$result = $this->queryfunk_help($sqlquery);
			 
				 
				return $result;
				}

		public function teacheraccountbalance($teacher_id){
			$sqlquery = "SELECT * FROM  enrole_student_list LEFT JOIN  course_table ON course_table.course_id = enrole_student_list.course_id  WHERE course_table.teacher_id = $teacher_id";
			$result = $this->queryfunk_help($sqlquery);
		return $result;
		
		}


	public function coursefeature(){
		$sqlquery = "SELECT * FROM course_table ORDER BY rat_hit DESC LIMIT 4";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function courseviewfornoti(){
		$sqlquery = "SELECT * FROM comment_notification_table LEFT JOIN course_table ON comment_notification_table.course_id = course_table.course_id WHERE comment_notification_table.notification=1";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}

	public function quizviewbyid($course_id){
		$sqlquery = "SELECT * FROM quiz_table WHERE course_id=$course_id";
		$result = $this->queryfunk($sqlquery);
		return $result;
		}
	 public function quizviewbyidforstudent($start,$end,$course_id){
			$sqlquery = "SELECT * FROM quiz_table WHERE course_id=$course_id limit $start,$end";
			$result = $this->queryfunk_help($sqlquery);
			return $result;
			}
	 
		public function totamarks($course_id,$student_id){
			$sqlquery = "SELECT * FROM quiz_result_table WHERE course_id=$course_id AND student_id = $student_id";
			$result = $this->queryfunk($sqlquery);
			$result = mysqli_num_rows($result);
			return $result;
			}

	 
		public function studentmarks($course_id,$student_id){
			$sqlquery = "SELECT * FROM quiz_result_table WHERE course_id=$course_id AND student_id = $student_id AND student_ans = given_ans";
			$result = $this->queryfunk($sqlquery);
			$result = mysqli_num_rows($result);
			return $result;
			}
			
	 
		

		public function multipleview($qid){
		$sqlquery = "SELECT * FROM quiz_ans_table WHERE quiz_id=$qid";
		$result = $this->queryfunk($sqlquery);
		return $result;
		}
public function givenansview($qid,$student_id){
		$sqlquery = "SELECT * FROM quiz_result_table WHERE quiz_id=$qid and student_id = $student_id";
		$result = $this->queryfunk($sqlquery);
		return $result;
		}

		
	public function allcourses(){
		$sqlquery = "SELECT * FROM course_table";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function coursesviewbyid($id){
		$sqlquery = "SELECT * FROM course_table WHERE course_id = $id";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function enrollcart($id){
			$sqlquery = "SELECT * FROM enrole_student_list WHERE student_id = '$id'";
			$result = $this->queryfunk($sqlquery);
			return $result->num_rows;
			 
			}

	public function notification(){
				$sqlquery = "SELECT * FROM comment_notification_table WHERE notification = 1 ";
				$result = $this->queryfunk($sqlquery);
				return $result->num_rows;
				 
				}



	public function allcoursesbyauthId($id){
		$sqlquery = "SELECT * FROM course_table WHERE teacher_id = '$id'";
		$result = $this->queryfunk($sqlquery);
		return $result;
		}
	public function coursefeaturebycatid($cat){
			$sqlquery = "SELECT * FROM course_table WHERE category_id = '$cat'";
			$result = $this->queryfunk($sqlquery);
			return $result;
			}
	public function relatedcourse($cat){
				$sqlquery = "SELECT * FROM course_table WHERE category_id = '$cat' ";
				$result = $this->queryfunk_help($sqlquery);
				return $result;
				}

		public function videogetall($id){
			$sqlquery = "SELECT * FROM video_table WHERE course_id = '$id'";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	/*	public function titleview($id){
			$sqlquery = "SELECT * FROM  course_table WHERE course_id = '$id'";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}*/
		public function enrolestudentcount($id){
					$sqlquery = "SELECT * FROM enrole_student_list WHERE course_id = '$id'";
				$result = $this->queryfunk_help($sqlquery);
				if ($result==NULL) {
					return 0;
				}else{
				$result = mysqli_num_rows($result);
				return $result;
				}
				
				}
		public function coursecount($id){
					$sqlquery = "SELECT * FROM course_table WHERE category_id = '$id'";
				$result = $this->queryfunk_help($sqlquery);
				if ($result==NULL) {
					return 0;
				}else{
				$result = mysqli_num_rows($result);
				return $result;
				}
				
				}
		public function logincheck($table_name,$email,$pass,$mail,$ps,$link){

				$mail = mysqli_real_escape_string($this->db,$mail);
				$ps = mysqli_real_escape_string($this->db,$ps);
					$sqlquery = "SELECT * FROM $table_name WHERE $email = '$mail' AND $pass ='$ps'";
				$result = $this->queryfunk($sqlquery);
			
					if (mysqli_num_rows($result)>0) {
				$value = mysqli_fetch_array($result);

						$_SESSION['true'] = true;
						$_SESSION['name']=$value['student_name'];
						$_SESSION['student_id']=$value['student_id'];
				 
						echo "<script> window.location = '$link';</script>";					}
				
				
				
				
				}
				public function adminlogin($username,$ps){

				$username = mysqli_real_escape_string($this->db,$username);
				$ps = mysqli_real_escape_string($this->db,$ps);
					$sqlquery = "SELECT * FROM admin_table WHERE admin_username = '$username' AND password ='$ps'";
				$result = $this->queryfunk($sqlquery);
			
					if (mysqli_num_rows($result)>0) {
				$value = mysqli_fetch_array($result);
						$_SESSION['true'] = true;
						$_SESSION['name']=$value['admin_username'];
						$_SESSION['admin_id']=$value['admin_id'];
				 
						echo "<script> window.location = 'index.php';</script>";					}
				
				
				
				
				}





public function logincheckteacher($table_name,$email,$pass,$mail,$ps,$link){
			
				$mail = mysqli_real_escape_string($this->db,$mail);
				$ps = mysqli_real_escape_string($this->db,$ps);
					$sqlquery = "SELECT * FROM $table_name WHERE $email = '$mail' AND $pass ='$ps'";
				$result = $this->queryfunk($sqlquery);
			
					if (mysqli_num_rows($result)>0) {
				$value = mysqli_fetch_array($result);
						$_SESSION['true'] = true;
						$_SESSION['teacher_auth'] = 'teacher_auth';
					 
						$_SESSION['name']=$value['teacher_name'];
						$_SESSION['student_id']=$value['teacher_id'];

					
							
						
							echo "<script> window.location = '$link';</script>";

					 				
					}
				
				
				
				
				}


		public function coursecatjoin($id){
			$sqlquery = "SELECT * FROM course_table LEFT JOIN category_table ON course_table.category_id = category_table.category_id WHERE course_id = $id";
			$result = $this->queryfunk_help($sqlquery);
			return $result;
		}
		public function viewcommentbyid($id){
					$sqlquery = "SELECT * FROM comment_table LEFT JOIN student_table ON comment_table.student_id = student_table.student_id WHERE course_id = $id";
					$result = $this->queryfunk_help($sqlquery);
					return $result;
				}
		public function viewreplayid($id){
							$sqlquery = "SELECT * FROM replay_table LEFT JOIN teacher_table ON replay_table.teacher_id = teacher_table.teacher_id WHERE comment_id = $id";
							$result = $this->queryfunk_help($sqlquery);
							return $result;
						}

		public function allcoursesenroll($id){
					$sqlquery = "SELECT * FROM course_table LEFT JOIN enrole_student_list ON course_table.course_id = enrole_student_list.course_id WHERE student_id = $id ";
					$result = $this->queryfunk($sqlquery);
					return $result;
				}

		public function enrolldcourseapprove(){
							$sqlquery = "SELECT * FROM enrole_student_list LEFT JOIN course_table ON course_table.course_id = enrole_student_list.course_id LEFT JOIN student_table ON student_table.student_id = enrole_student_list.student_id WHERE enrole_student_list.pay_status=0";
							$result = $this->queryfunk($sqlquery);
							return $result;
						}
						

		public function teachersell(){
							$sqlquery = "SELECT * FROM enrole_student_list LEFT JOIN course_table ON course_table.course_id = enrole_student_list.course_id LEFT JOIN teacher_table ON teacher_table.teacher_id = course_table.teacher_id order by t_pay asc";
							$result = $this->queryfunk($sqlquery);
							return $result;
						}



						public function searchkey($key){
							$sqlquery = "SELECT * FROM course_table WHERE course_title LIKE '%$key%' OR course_details LIKE '%$key%'";
							$result = $this->queryfunk($sqlquery);
							if (mysqli_num_rows($result)<=0) {
								echo "<span style='margin:0 auto; padding:30px; width:400px; text-align:center;background-color:black;color:#fff;'>NO RESULT FOUND</span>";
								return $result;
							}else{

							return $result;
							}

						}
						



	
}
 ?>