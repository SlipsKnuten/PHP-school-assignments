<html>
<h3>Query Parameter</h3>
<div id="content"> 
<form method="post">
   <input type="text" name="id" />
   <button type="submit">Remove</button>
</form>
</div>
<table>
 <?php
 $pdo = new PDO('mysql:dbname=lel;host=localhost', 'sqllab', 'Tomten2009');
include 'delete.php';
if(isset($_POST['id'])){
	deleteAlien($pdo);
}
foreach($pdo->query( "SELECT * FROM Alien;" ) as $row){
      echo "<table border='1'>";
	  echo "<tr>";	  
      echo "<th>ID</th><td>".$row['id']."</td>";
      echo "<th>Farlighetsgrad</th><td>".$row['farlighetsgrad']."</td>";
      echo "<th>Namn</th><td>".$row['namn']."</td>";
      echo "<th>Ras namn</th><td>".$row['rasnamn']."</td>";
      echo "</tr>";
	  echo "</table>";
    }
?>
</table>
</body>
</html>