<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,800&display=swap" rel="stylesheet">
<style type = "text/css">

  body{
    font-family: "Work Sans", sans-serif;
    background-repeat: no-repeat;
    font-size: 30px;
    background-size: cover;
    /* background-image: url(https://images.unsplash.com/photo-1597852074816-d933c7d2b988?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80); */
    padding-left: 200px;
    padding-top: 5px;
 background-color: white;
     /* background-color: #000000;
background-image: linear-gradient(147deg, #000000 0%, #04619f 74%); */
background-color: #000000;
background-image: linear-gradient(147deg, #000000 0%, #2c3e50 100%);
 padding-bottom: 20%;

  }
  table, th, td {
  border: 1px solid white;
  padding: 15px;
  text-align: center;
  color: white;
}
table {
  border-spacing: 20px;
}
h1{
  font-family: 'Abril Fatface', cursive;
  font-size: 2.5rem;
  color: white;
  text-align: center;
  padding-right: 300px;
}
</style>
<body>
  <h1> CARETAKER'S DATABASE </h1>
  <table>
    <tr>

      <td style="font-size: 20px">C_fname</td>
      <td style="font-size: 20px">C_lname</td>
	  <td style="font-size: 20px">Animal_name</td>
	  <td style="font-size: 20px">type_of_job</td>
      <td style="font-size: 20px">Salary</td>
      
      </tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT c.C_fname,c.C_lname,a.animal_name,c.type_of_job,c.salary FROM `caretaker` c,animals a WHERE a.animal_no=c.animal_no ORDER BY c.salary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        ?>
        <tr>
            
            <td style="font-size: 20px"><?php echo $row["C_fname"]; ?></td>
            <td style="font-size: 20px"><?php echo $row["C_lname"]; ?></td>
			<td style="font-size: 20px"><?php echo $row["animal_name"]; ?></td>
			<td style="font-size: 20px"><?php echo $row["type_of_job"]; ?></td>
            <td style="font-size: 20px"><?php echo $row["salary"]; ?></td>
            
        </tr>
          <?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<tr>
</tr>
</table>
</body>
</html>
