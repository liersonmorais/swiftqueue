<?php  if ( !defined('BASEPATH')) exit('No direct script access allowed');

   public function connection(){
      return parent::connection();
   }
$con = new connection();
$ret = $con->select('SELECT * FROM "tbCourses"');

if( $ret == '' || count($ret) <= 0 ){
   print "Nothing to do: no rows found.\n";
   return;

?>
<script>
function mySearch() {
  // Declare variables
 var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myCheck");
  filter = input.value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  if (input.checked == true){
	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
		  txtValue = td.textContent || td.innerText;
		  if (txtValue == "Active") {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}
	 }
  }	
}
</script>
<!DOCTYPE html>

<html>

<head>

    <title>SWIFTQUEUE COURSES</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Courses</h2>
		<div><a class="btn btn-info" href="Insert.php">New Course</a>	
		<input type="checkbox" id="myCheck" onclick="mySearch();" value="true">Only Actives</div>
		

<table class="table" id="myTable">

    <thead>

        <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Start date</th>

        <th>End Date</th>
		
        <th>Time</th>		

        <th>Status</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if (count($ret)> 0) {

                foreach($ret as $row){

        ?>

                    <tr>

                    <td><?php echo $row['Id']; ?></td>

                    <td><?php echo $row['Name']; ?></td>

                    <td><?php echo $row['StartDate']; ?></td>

                    <td><?php echo $row['EndDate']; ?></td>

                    <td><?php echo $row['Time']; ?></td>
					if($row['Status'] == "1"){
                    <td><?php echo "Active" ?></td>
					}else{
					<td><?php echo "Inactive" ?></td>
					}
                    <td><a class="btn btn-info" href="Update.php?id=<?php echo $row['Id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="Delete.php?id=<?php echo $row['Id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>