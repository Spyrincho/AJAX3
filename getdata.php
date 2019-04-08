<?php
include 'dbVars.php';
try {
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $e) {
  echo $e->getMessage();
  exit;
}
$debug = false;
$q = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
$sql = "SELECT * FROM user_details WHERE last_name LIKE '$q%'";
if ($debug) {
  echo $sql;
}
$statement = $conn->query($sql);
$result = $statement->fetchAll();
echo "<table id='informationTable'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Gender</th>
<th>UID</th>
<th>Password</th>
</tr>";
foreach ($result as $row) {
  echo "<tr>";
  echo "<td>" . $row['first_name'] . "</td>";
  echo "<td>" . $row['last_name'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['user_id'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<tr>";
}
echo "</table>";
$conn = null;
?>
