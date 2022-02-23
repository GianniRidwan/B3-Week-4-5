<?php 
	require_once "variables.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Lab 1</title>
	</head>
	<body>

		<?php 
			echo $_name . "<br>";

			for ($i = 0; $i < 3; $i++){
				echo $fruit[$i] . "<br>";
			}
		?>

	</body>
</html>