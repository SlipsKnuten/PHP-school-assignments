<html>
<body>
<form action="" method="post">
  ID: <input type="text" name="ID" /><br>
  Price: <input type="text" name="Price" /><br>
  Shipping Adress: <input type="text" name="Shipping_Adress" /><br>
  Weight: <input type="text" name="Weight" /><br>
  Description: <input type="text" name="Description" /><br>
  <input type="submit" />
</form> 
<table>
 
<?php
    $pdo = new PDO('mysql:dbname=PlaceOrder;host=localhost', 'sqllab', 'Tomten2009');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES,false);
	print_r($_POST);
    // Only make insert if there is a form post to process
    if(isset($_POST['Price'])){
        $querystring='UPDATE PlacedOrder
			SET 
				ID=:ID1, 
				Price=:PRICE, 
				Shipping_Adress=:SHIPPING_ADRESS, 
				Weight=:WEIGHT, 
				Description=:DESCRIPTION 
			WHERE ID=:ID2;';
        $stmt = $pdo->prepare($querystring);
        $stmt->bindParam(':ID1', $_POST['ID']);
        $stmt->bindParam(':ID2', $_POST['ID']);
        $stmt->bindParam(':PRICE', $_POST['Price']);
        $stmt->bindParam(':SHIPPING_ADRESS', $_POST['Shipping_Adress']);
        $stmt->bindParam(':WEIGHT', $_POST['Weight']);       
        $stmt->bindParam(':DESCRIPTION', $_POST['Description']);       
		 try{ 
            $stmt->execute();
        }catch (PDOException $e){
			echo $e->getMessage();
        }		
    }
    
    // Read all customers
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