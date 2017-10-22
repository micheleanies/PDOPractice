<?php
$hostname = "sql.njit.edu";
$username = "maa222";
$password = "J7gh30hV2";

echo "<h2>Q1: Test connection</h2>";
try {
  
  $connect = new PDO("mysql:host=$hostname;dbname=maa222",$username,$password);
  echo "Connected successfully!";
  echo "<br>";

} catch (PDOExeption $e) {
  $error_message = $e->getMessage();
  echo "<p>Connection failed.</p>";
}
 echo "<h2>Q2 & Q3:</h2>";
 try {
  
  $conn = new PDO("mysql:host=$hostname;dbname=maa222",$username,$password);
  
  $sql = "SELECT * 
    FROM accounts
    WHERE id<6";
  $q = $conn->prepare($sql);
  $q->execute();
  $query = $q->fetchAll();
                   
  if($q->rowCount()) {
   echo "<table border=\"1.5\" 
       style=width:50%><tr>    
      <th>id</th>
      <th>email</th>        
      <th>fname</th>
      <th>lname</th>
      <th>phone</th>
      <th>birthday</th></tr>";
   $results = 0;               
   foreach($query as $row) {            
    echo "<tr><td>".$row["id"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["fname"]."</td>
        <td>".$row["lname"]."</td>
        <td>".$row["phone"]."</td>
        <td>".$row["birthday"]."</td></tr>";
    $results ++; 
   }
   echo "</table>";
   
  } 
  
  echo "<br>";
  if ($results>0) {
   echo "Results: " . $results . "<br>";   
  }
  else {
   echo "0 results";
  }
 } catch (PDOException $e) {
  echo $e->getMessage();
 }
$connect = null;
?>