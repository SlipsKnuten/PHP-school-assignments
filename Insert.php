<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

<form action="" method="post">
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
    // Only make insert if there is a form post to process
    if(isset($_POST['Price'])){
        $querystring='insert into PlacedOrder(Price, Shipping_Adress, Weight, Description)
 VALUES(:PRICE, :SHIPPING_ADRESS, :WEIGHT, :DESCRIPTION);';
        $stmt = $pdo->prepare($querystring);
        $stmt->bindParam(':PRICE', $_POST['Price']);
        $stmt->bindParam(':SHIPPING_ADRESS', $_POST['Shipping_Adress']);
        $stmt->bindParam(':WEIGHT', $_POST['Weight']);
        $stmt->bindParam(':DESCRIPTION', $_POST['Description']);
         
		 try{ 
            $stmt->execute();
			$message = "this code runs";
			echo "<script type='text/javascript'>alert('$message');</script>";
        }catch (PDOException $e){
			echo $e->getMessage();
			$message = "this code dont run";
			echo "<script type='text/javascript'>alert('$message');</script>";
        }		
    }
    foreach($pdo->query( "SELECT * FROM PlacedOrder;" ) as $row){
      echo "<table border='1' class='form'>";
		echo "<tr>";		
				echo "<th>ID:</th>";
				echo "<th>Price</th>";
				echo "<th>Shipping Adress</th>";
				echo "<th>Weight</th>";
				echo "<th>Description</th>";
		echo "</tr>";
		echo "<tr>";
			  echo "<td>".$row['ID']."</td>";
			  echo "<td>".$row['Price']."</td>";
			  echo "<td>".$row['Shipping_Adress']."</td>";
			  echo "<td>".$row['Weight']."</td>";
			  echo "<td>".$row['Description']."</td>";
		echo "</tr>";
	  echo "</table>";
    }
?>
</table>
</body>
</html>