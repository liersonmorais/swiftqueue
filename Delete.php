<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

   public function connection(){
      return parent::connection();
   }

$con = new connection();

	 if (isset($_GET['Id'])) {

		$user_id = $_GET['Id'];

		$result = $con->sql('DELETE FROM "tbCourses" WHERE "Id" = \'$user_id\';');
		
		if($result == true){
			header("Location: courses.php");
		}	

	} 


?>

