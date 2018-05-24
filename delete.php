<?php
	function deleteAlien($pdo) {	
		$sql = 'CALL GetAllOrders';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		
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
	}
?>