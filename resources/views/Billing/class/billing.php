<?php
	class Billing extends DBH{

		public function getTR($id){
			echo "asdasdasd";
			// $rs = $this->rows("SELECT * FROM request WHERE RS is not null") + 1;

			// if($rs > 0 && $rs <=9)  $rs = date("Y-00"). + $rs; 
			// else if($rs > 9 && $rs <=99)  $rs = date("Y-0"). + $rs;
			// else  $rs = date("Y-"). + $rs;
		}

		public function generateRS($code){
				//Get last RS//
				$rs = $this->rows("SELECT * FROM request WHERE RS is not null") + 1;
				
				//Generate RS//
				if($rs > 0 && $rs <=9)  $rs = date("Y-00"). + $rs; 
				else if($rs > 9 && $rs <=99)  $rs = date("Y-0"). + $rs;
				else  $rs = date("Y-"). + $rs;
				$this->execute("UPDATE request SET RS='$rs' WHERE Request_ID=$code");
		}
			
	}
?>