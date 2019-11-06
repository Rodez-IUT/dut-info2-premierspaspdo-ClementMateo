<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Premiers pas avec PDO</title>		
   </head>
<?php ?>
	<body>
		<table>
			<?php
			$host = 'localhost';
			$db   = 'my_activities';
			$user = 'root';
			$pass = 'root';
			$charset = 'utf8mb4';
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			try {
				$pdo = new PDO($dsn, $user, $pass, $options);
			} catch (PDOException $e) {
				throw new PDOException($e->getMessage(), (int)$e->getCode());
			}
			$stmt = $pdo->query('SELECT email FROM users');
			while ($row = $stmt->fetch())
			{
				echo $row['email'] . "\n";
			}
			// foreach($tabMedic as $ligne){
			// $tabMedic = explode(';', $ligne);
			// $des=$tabMedic[0];
			// $type=$tabMedic[1];
			// $labo=$tabMedic[2];
			// echo '<tr>';
			// echo '<td>'.$des.'</td>';
			// echo '<td>'.$type.'</td>';
			// echo '<td>'.$labo.'</td>';
			// echo '</tr>';
			// }	
			?>
		</table>
	</body>
</html>