 <table>
 <tr><th>Sök efter namn på aliens</th></tr>
 <form method="post" action="">
	<tr>
		<td><input type="text" name="ID" placeholder="Hör söker man"></td>
		<td><input type="submit" value = "Sök"></td>
 <?php
    $pdo = new PDO('mysql:dbname=PlaceOrder;host=localhost', 'sqllab', 'Tomten2009');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES,false);
	if(isset($_POST["ID"])){
		$findNamn = $_POST["ID"];
		$search = "SELECT * FROM PlacedOrder WHERE ID LIKE '%$findNamn%'";
		$sql=$pdo->query($search);
		foreach($sql as $row){
	            echo "<tr><td>";
						echo "<th>Resultat </th>";
						echo "<th>ID:</th><td>".$row['ID']."</td>";
					  echo "<th>Price</th><td>".$row['Price']."</td>";
					  echo "<th>Shipping Adress</th><td>".$row['Shipping_Adress']."</td>";
					  echo "<th>Weight</th><td>".$row['Weight']."</td>";
					  echo "<th>Description</th><td>".$row['Description']."</td>";
	            echo "</td>";
		}
	}
	foreach($pdo->query( "SELECT * FROM PlacedOrder;" ) as $row){
      echo "<table border='1'>";
		echo "<tr>";
			  echo "<th>ID:</th><td>".$row['ID']."</td>";
			  echo "<th>Price</th><td>".$row['Price']."</td>";
			  echo "<th>Shipping Adress</th><td>".$row['Shipping_Adress']."</td>";
			  echo "<th>Weight</th><td>".$row['Weight']."</td>";
			  echo "<th>Description</th><td>".$row['Description']."</td>";
		echo "</tr>";
	  echo "</table>";
    }
?>
</table>
</body>
</html>