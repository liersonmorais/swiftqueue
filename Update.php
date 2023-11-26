<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

   public function connection(){
      return parent::connection();
   }

$con = new connection();

 if (isset($_POST['update'])) {

		$name = $row['Name'];

		$status = $row['Status'];

		$startdate = $row['StartDate'];

		$enddate  = $row['EndDate'];

		$time = $row['Time'];

		$id = $row['Id'];

        $result = $con->sql('UPDATE "tbCourses" SET "Name" = \'$name\',"Status"=\'$status\',"StartDate"=\'$startdate\',"EndDate"=\'$enddate\',"Time"=\'$time\' WHERE "Id" = \'$id\''); 

		if ($result == TRUE) {

		  echo "New record updated successfully.";

		}else{

		  echo "Error";

		} 
    } 

if (isset($_GET['Id'])) {

    $user_id = $_GET['Id']; 

    $ret = $con->select('SELECT * FROM "tbCourses" WHERE "Id"=\'$user_id\'');


    if (count($ret) > 0) {        

        foreach($ret as $row) {

            $name = $row['Name'];

            $status = $row['Status'];

            $startdate = $row['StartDate'];

            $enddate  = $row['EndDate'];

            $time = $row['Time'];

            $id = $row['Id'];

        } 

    ?>

        <h2>Course Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Course:</legend>

            Name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>

            Start date:<br>

            <input type="date" name="startdate" value="<?php echo $startdate; ?>">

            <br>

            End Date:<br>

            <input type="date" name="enddate" value="<?php echo $enddate; ?>">

            <br>

            Time:<br>

            <input type="radio" name="time" value="am" <?php if($time == 'am'){ echo "checked";} ?> >AM

            <input type="radio" name="time" value="pm" <?php if($time == 'pm'){ echo "checked";} ?>>PM
			<br>

            Status:<br>

            <input type="radio" name="status" value="1" <?php if($status == '1'){ echo "checked";} ?> >Active

            <input type="radio" name="status" value="0" <?php if($status == '0'){ echo "checked";} ?>>Inactive

            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 