<?php 

class DatabaseConnection{
	public $db;
	public $error;
	
	public function connectDataBase(){
		$this->db = new mysqli('localhost', 'root', '', 'online_edu');
		if ($this->db == false) {
			$this->error = "Connection fail".$this->db->connect_error;
		}
	}

		public function queryfunk($query){
		$insert = $this->db->query($query) or die($this->db->error.__LINE__);
		if($insert){
			return $insert;
		} else {
			return false;
		}
	}
	
	public function queryfunk_help($query){
		$result = $this->db->query($query) or die($this->db->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}


	public function textshort($text, $limit = 300){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')); // string possition into space 
        $text = $text."...";
        return $text;

    }



}
 ?>