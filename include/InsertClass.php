<?php 
include_once 'dbcon.php';
class InsertClass extends DatabaseConnection
{
	
	public function __construct(){
		$this->connectDataBase();
		
		
		}

		public function createcat($input,$files){
			$category_name = mysqli_real_escape_string($this->db,$input['category_name']);
			$file_name = $files['image']['name'];
      	$file_size =$files['image']['size'];
      	$file_tmp =$files['image']['tmp_name'];
      	$file_type=$files['image']['type'];
      	$div            = explode('.', $file_name);
	  	$file_ext       = strtolower(end($div));
       
    
      	$uploaded_image = "img/".$file_name;
	    $move_image = "../img/".$file_name;

      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$move_image);

         $query = "INSERT INTO category_table(category_name,category_image)VALUES('$category_name','$uploaded_image')"; 
			$result = $this->queryfunk($query);

		 return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
      }else{
         print_r($errors);
      }





		}
		public function updatecat($input,$files,$catid){
			$category_name = mysqli_real_escape_string($this->db,$input['category_name']);
		$file_name = $files['image']['name'];
      	$file_size =$files['image']['size'];
      	$file_tmp =$files['image']['tmp_name'];
      	$file_type=$files['image']['type'];
      	$div            = explode('.', $file_name);
	  	$file_ext       = strtolower(end($div));
       
    
      	$uploaded_image = "img/".$file_name;
	    $move_image = "../img/".$file_name;

      
      $extensions= array("jpeg","jpg","png");
      if (empty($category_name)) {
      	
      }elseif(empty($file_name)){
    
      	    $query = "UPDATE category_table SET category_name='$category_name' WHERE category_id = $catid";
			$result = $this->queryfunk($query);

		 return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
      }else{


      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$move_image);
         $query = "SELECT * FROM category_table WHERE category_id = '$catid'";
		    $getdata = self::queryfunk($query);
		     	while ($selectedimg = $getdata->fetch_assoc()) { 
		            $delimg = '../'.$selectedimg['category_image'];
		            unlink($delimg);
		        }

           $query = "UPDATE category_table SET category_name='$category_name',category_image='$uploaded_image' WHERE category_id =$catid ";
			$result = $this->queryfunk($query);

		 return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
      }else{
         print_r($errors);
      }
       }
	}


	public function studentregistration($input){
		$student_name = mysqli_real_escape_string($this->db,$input['student_name']);
		$student_email = mysqli_real_escape_string($this->db,$input['student_email']);
		$student_phone = mysqli_real_escape_string($this->db,$input['student_phone']);
		$student_password = mysqli_real_escape_string($this->db,$input['student_password']);
		$gender = mysqli_real_escape_string($this->db,$input['gender']);

		if (empty($student_name) || empty($student_email) || empty($student_phone) || empty($student_password)) {
			return $message = "<div class='alert alert-warning' role='alert'>Field must not be empty!</div>";
		} else{
			$query = "INSERT INTO student_table(student_name,student_email,student_phone,student_password,gender)VALUES('$student_name','$student_email','$student_phone','$student_password','$gender')"; 
			$result = $this->queryfunk($query);
			if ($result) {
				/*return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";*/
				return $message = "<script> window.location = 'login.php';</script>";
			}
		
		}

	}
	public function teacherregistration($input){
			$teacher_name = mysqli_real_escape_string($this->db,$input['teacher_name']);
			$teacher_email = mysqli_real_escape_string($this->db,$input['teacher_email']);
			$teacher_phone = mysqli_real_escape_string($this->db,$input['teacher_phone']);
			$teacher_password = mysqli_real_escape_string($this->db,$input['teacher_password']);
			$account_no = mysqli_real_escape_string($this->db,$input['account_no']);

			if (empty($teacher_name) || empty($teacher_email) || empty($teacher_phone) || empty($teacher_password)) {
				return $message = "<div class='alert alert-warning' role='alert'>Field must not be empty!</div>";
			} else{
				$query = "INSERT INTO teacher_table(teacher_name,teacher_email,teacher_phone,teacher_password,account_no)VALUES('$teacher_name','$teacher_email','$teacher_phone','$teacher_password','$account_no')"; 
				$result = $this->queryfunk($query);
				if ($result) {
					return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
					echo "<script> window.location = 'login.php';</script>";
				}
			
			}

		}


	public function enrollfunk($data){
		$student_id = mysqli_real_escape_string($this->db,$data['student_id']);
		$course_id = mysqli_real_escape_string($this->db,$data['course_id']);
		$price = mysqli_real_escape_string($this->db,$data['price']);
		$sqlquery = "SELECT * FROM enrole_student_list WHERE student_id = '$student_id' AND course_id ='$course_id'";
				$getre = $this->queryfunk($sqlquery);
				//$value = mysqli_fetch_array($result);
				

				if ($getre->num_rows>0) {
				 
					return $message = "<div class='alert alert-danger' role='alert'>Already Registered </div>";

				}else{

					$query = "INSERT INTO enrole_student_list(student_id,course_id,price)VALUES('$student_id','$course_id','$price')"; 
			$result = $this->queryfunk($query);
			if ($result) {
				return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
				return "<script> window.location = 'enrollcart.php';</script>";
			}

				}


	}

	public function createcourse_t($data,$files,$teacher_id){
		$course_title = mysqli_real_escape_string($this->db,$data['course_title']);
		$course_details = mysqli_real_escape_string($this->db,$data['course_details']);
		$price = mysqli_real_escape_string($this->db,$data['price']);
		$category_id  = mysqli_real_escape_string($this->db,$data['category_id']);

		$file_name = $files['image']['name'];
      	$file_size =$files['image']['size'];
      	$file_tmp =$files['image']['tmp_name'];
      	$file_type=$files['image']['type'];
      	$div            = explode('.', $file_name);
	  	$file_ext       = strtolower(end($div));
       
    
      	$uploaded_image = "img/".$file_name;
	    $move_image = "img/".$file_name;

      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$move_image);

         $query = "INSERT INTO course_table(course_title,course_details,category_id,teacher_id,price,course_image)VALUES('$course_title','$course_details','$category_id','$teacher_id','$price','$uploaded_image')"; 
			$result = $this->queryfunk($query);





         return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
      }else{
         print_r($errors);
      }

	}


public function updateteacherprofile($data,$files,$teacher_id){
		$teacher_name = mysqli_real_escape_string($this->db,$data['teacher_name']);
		$teacher_email = mysqli_real_escape_string($this->db,$data['teacher_email']);
		$teacher_phone = mysqli_real_escape_string($this->db,$data['teacher_phone']);
		$teacher_password  = mysqli_real_escape_string($this->db,$data['teacher_password']);
		$account_no  = mysqli_real_escape_string($this->db,$data['account_no']);

		$file_name = $files['image']['name'];
      	$file_size =$files['image']['size'];
      	$file_tmp =$files['image']['tmp_name'];
      	$file_type=$files['image']['type'];
      	$div            = explode('.', $file_name);
	  	$file_ext       = strtolower(end($div));
       
    
      	$uploaded_image = "img/".$file_name;
	    $move_image = "img/".$file_name;

      
      $extensions= array("jpeg","jpg","png");
      
 
 
      
      if(empty($errors)==true){
         
         if (empty($file_name)) {
         	$query= "UPDATE teacher_table SET teacher_name = '$teacher_name', teacher_email = '$teacher_email', teacher_phone = '$teacher_phone', teacher_password = '$teacher_password', account_no = '$account_no' WHERE teacher_id = '$teacher_id'";
         }else{
         	move_uploaded_file($file_tmp,$move_image);
         	$query= "UPDATE teacher_table SET teacher_name = '$teacher_name', teacher_email = '$teacher_email', teacher_phone = '$teacher_phone', teacher_password = '$teacher_password', account_no = '$account_no', teacher_image = '$uploaded_image' WHERE teacher_id = '$teacher_id'";

         }

     
			$result = $this->queryfunk($query);





         return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
      }else{
         print_r($errors);
      }

	}







	public function addvideo_t($data,$files,$id){
			$video_title = mysqli_real_escape_string($this->db,$data['video_title']);
			

			$file_name = $files['video_file']['name'];
	      	$file_size =$files['video_file']['size'];
	      	$file_tmp =$files['video_file']['tmp_name'];
	      	$file_type=$files['video_file']['type'];
	      	$div            = explode('.', $file_name);
		  	$file_ext       = strtolower(end($div));
	       
	    
	      	$uploaded_image = "video/".$file_name;
		    $move_image = "video/".$file_name;

	      
	      $extensions= array("mp4","avi","3gp","flv","mov","mpeg");
	      
	      if(in_array($file_ext,$extensions)=== false){
	         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	      
	      /*if($file_size > 2097152){
	         $errors[]='File size must be excately 2 MB';
	      }*/
	      
	      if(empty($errors)==true){
	         move_uploaded_file($file_tmp,$move_image);

	         $query = "INSERT INTO video_table(video_title,course_id,video_file)VALUES('$video_title','$id','$uploaded_image')"; 
				$result = $this->queryfunk($query);

				return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
	      }else{
	         print_r($errors);
	      }

		}

		public function rattinginput($data,$student_id,$course_id){
		
			 
			$newhit = mysqli_real_escape_string($this->db, $data['rating']);
			$testque = "SELECT * FROM ratecheck_table WHERE course_id=$course_id AND student_id=$student_id";
			$checkrate = $this->queryfunk($testque);
			 
			
					if (mysqli_num_rows($checkrate)>0) {
echo "ALREADY RATED";
					}else{

				





			 
			$query = "SELECT * FROM course_table WHERE course_id=$course_id";
			$result = $this->queryfunk_help($query);
			$getd = $result->fetch_assoc();
			$prehit = $getd['rat_total'];
			$avgrat = $getd['rat_hit'];


			$presenthit = number_format($prehit)+($newhit);
			$avgratcheck = number_format($avgrat)+1;







			if (empty($presenthit)) {
				$msg = "Field must not be empty";
				return $msg;
			}else{
			$sql = "INSERT INTO ratecheck_table(student_id,course_id)VALUES('$student_id','$course_id')";
			$sqls= "UPDATE course_table SET rat_total = '$presenthit', rat_hit = '$avgratcheck' WHERE course_id = '$course_id'";
			$insert_row = $this->queryfunk($sql);
		 
			$insertss = $this->queryfunk($sqls);
			if ($insert_row) {
					
					$message = "<span style='color:green;'>post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

				}
		}


		public function sendcomment($data,$id,$course_id){
		$comment = mysqli_real_escape_string($this->db,$data['comment']);
		if (empty($comment)) {
			
		}else{
					$query = "INSERT INTO comment_table(student_id,course_id,comment)VALUES('$id','$course_id','$comment')"; 
						$sqls= "insert into comment_notification_table(course_id,notification)VALUES('$course_id',1)";
			$insert_row = $this->queryfunk($sqls);
		 





			$result = $this->queryfunk($query);
			if ($result) {
				return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
				//return "<script> window.location = 'enrollcart.php';</script>";
			}
		}
	 	}



	public function sendreplay($data,$id,$course_id){
			$replay = mysqli_real_escape_string($this->db,$data['replay']);
			$comment_id = mysqli_real_escape_string($this->db,$data['comment_id']);
			if (empty($replay)) {
				
			}else{
						$query = "INSERT INTO replay_table(replay,teacher_id,comment_id)VALUES('$replay','$id','$comment_id')"; 
						$sqls= "UPDATE comment_notification_table SET notification = 0 WHERE course_id = '$course_id'";
			$insert_row = $this->queryfunk($sqls);
				$result = $this->queryfunk($query);
				if ($result) {
					return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
					//return "<script> window.location = 'enrollcart.php';</script>";
				}
			}
		}

	public function confirmenrole($enrole_id){
			 $sql= "select * from enrole_student_list  WHERE enrole_id = '$enrole_id'";
				$showdata = $this->queryfunk($sql);
				$value = mysqli_fetch_array($showdata);
				  $price = $value['price']*0.1;
				  $send = $value['price']-$price;
		/*	 echo $prices = is_numeric($price)*0.1;
			echo $send =is_numeric($price)-$prices;*/
					$sqls= "UPDATE enrole_student_list SET pay_status = 1,teacher_pay = '$send' WHERE enrole_id = '$enrole_id'";
				$uprow = $this->queryfunk($sqls);
				 
					if ($uprow) {
						return $message = "<div class='alert alert-success' role='alert'>Approved</div>";
						//return "<script> window.location = 'enrollcart.php';</script>";
					}
				}
			
	public function paymentconfirm($enrole_id){
				 
				 
						$sqls= "UPDATE enrole_student_list SET t_pay = 1 WHERE enrole_id = '$enrole_id'";
					$uprow = $this->queryfunk($sqls);
					 
						if ($uprow) {
							return $message = "<div class='alert alert-success' role='alert'>Approved</div>";
							//return "<script> window.location = 'enrollcart.php';</script>";
						}
					}
				


		public function addquestion($data,$course_id){
			$quiz_question = mysqli_real_escape_string($this->db,$data['quiz_question']);
		
			if (empty($quiz_question)) {
				
			}else{
						$query = "INSERT INTO quiz_table(quiz_question,course_id)VALUES('$quiz_question','$course_id')"; 
					 
				$result = $this->queryfunk($query);
				if ($result) {
					return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
					echo "<script> window.location = 'createquiz.php?playlistid=$course_id';</script>";
				}
			}
		}
	public function addquizdata($data){
				$quiz_id = mysqli_real_escape_string($this->db,$data['quiz_id']);
				$course_id = mysqli_real_escape_string($this->db,$data['course_id']);
				$student_id = mysqli_real_escape_string($this->db,$data['student_id']);
				$student_ans = mysqli_real_escape_string($this->db,$data['student_ans']);
				$given_ans = mysqli_real_escape_string($this->db,$data['given_ans']);
			
				if (empty($quiz_id)) {
					
				}else{

					$sqlQ = "SELECT * FROM quiz_result_table WHERE student_id = $student_id AND quiz_id = $quiz_id";
					$checkdata = $this->queryfunk($sqlQ);
			$rowcount = mysqli_num_rows($checkdata);
			if ($rowcount>0) {
				
			}else{
				
			
							$query = "INSERT INTO quiz_result_table(quiz_id,course_id,student_id,student_ans,given_ans)VALUES('$quiz_id','$course_id','$student_id','$student_ans','$given_ans')"; 
						 
					$result = $this->queryfunk($query);
					if ($result) {
						 
					}}
				}
			}

		public function addquiz($data,$quiz_id){
			//$answer = mysqli_real_escape_string($this->db,isset($data['answer']));
			//$multiple = mysqli_real_escape_string($this->db,$data['multiple']);
			$sqlq = "SELECT * FROM quiz_table where quiz_id = $quiz_id";
		$final = $this->queryfunk_help($sqlq);
		$getvalue = mysqli_fetch_array($final);
	
			if ($getvalue['quiz_flag']==1) {
				 echo "already Added";
			}else{ 
			$multiple = array();
			$multiple[1]= $data['multiple1'];
			$multiple[2]= $data['multiple2'];
			$multiple[3]= $data['multiple3'];
			$multiple[4]= $data['multiple4'];
			$answer = $data['answer'];
			foreach ($multiple as $key => $multiplename) {
				if ($multiplename !='') {
					if ($answer == $key) {
					 
							$sqls= "UPDATE quiz_table SET quiz_flag = 1 WHERE quiz_id = '$quiz_id'";
					 
				$results = $this->queryfunk($sqls);
						 
				$query = "INSERT INTO quiz_ans_table(answer,multiple,quiz_id)VALUES('1','$multiplename','$quiz_id')"; 
					}else{
							$sqls= "UPDATE quiz_table SET quiz_flag = 1 WHERE quiz_id = '$quiz_id'";
					 
				$results = $this->queryfunk($sqls);
						$query = "INSERT INTO quiz_ans_table(answer,multiple,quiz_id)VALUES('0','$multiplename','$quiz_id')"; 
					}
				
		
		 
					 
				$result = $this->queryfunk($query);
				if ($result) {
				/*	return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
					echo "<script> window.location = 'createquiz.php?playlistid=$course_id';</script>";*/
					continue;
				}else{
					echo 'error';
				}}
			 	}}
		}

public function upquiz($data,$quiz_id){
			//$answer = mysqli_real_escape_string($this->db,isset($data['answer']));
			//$multiple = mysqli_real_escape_string($this->db,$data['multiple']);
			$multiple = array();
			$multiple[1]= $data['multiple1'];
			$multiple[2]= $data['multiple2'];
			$multiple[3]= $data['multiple3'];
			$multiple[4]= $data['multiple4'];
			$answer = $data['answer'];
			foreach ($multiple as $key => $multiplename) {
				if ($multiplename !='') {
					if ($answer == $key) {
					 
							 
						 
				$query = "UPDATE quiz_ans_table
				 SET 
				 answer = 1,
				 multiple='$multiplename' 
				 WHERE 
				 quiz_id = '$quiz_id'";
			 
			 
					}elseif ($answer != $key) {
						 
							$query = "UPDATE 
							quiz_ans_table SET answer = 0,multiple= '$multiplename' WHERE quiz_id = '$quiz_id'";
						 
					}
				
		
		 
					 $result = $this->queryfunk($query);
				
				if ($result) {
		 
					continue;
				}else{
					echo 'error';
				}}
			 	}
		}










}