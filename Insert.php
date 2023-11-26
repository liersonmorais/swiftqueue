<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

   public function connection(){
      return parent::connection();
   }

$con = new connection();

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $status = $_POST['status'];

    $startdate = $_POST['startdate'];

    $enddate = $_POST['enddate'];

    $time = $_POST['time'];

	
	$result = $con->sql('INSERT INTO "tbCourses"("Name","Status","StartDate","EndDate","Time") VALUES (\'$name \',\'$status \',\'$startdate \',\'$enddate \',\'$time \')');


    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error";

    } 


  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Insert Courses Here</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Courses:</legend>

    Name:<br>

    <input type="text" name="firstname">

    <br>

    Start Date:<br>

    <input type="date" name="startdate">

    <br>

    End Date:<br>

    <input type="date" name="enddate">

    <br>

    Time:<br>

    <input type="radio" name="time" value="am">AM

    <input type="radio" name="time" value="pm">PM

    <br>

    Status:<br>

    <input type="radio" name="status" value="1">Active

    <input type="radio" name="status" value="0">Inactive

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>