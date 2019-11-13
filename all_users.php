<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Premiers pas avec PDO</title>		
   </head>
<?php ?>
	<body>
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
			$pdo->beginTransaction();
			$stmt = $pdo->query('SELECT *
								 FROM users U
								 JOIN status S ON U.status_id = S.id
								 ORDER BY username');
			echo '<table>';	
			echo '<tr><td>Id</td><td>Username</td><td>Email</td><td>Status</td></tr>';
			while ($row = $stmt->fetch()){
				echo '<tr><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>'.$row['email']
				.'</td><td>'.$row['name'].'</td></tr>';
			}
			echo '</table>';
			
			// try {
				// $pdo->beginTransaction();
				// $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (?)");
				// foreach (['Lisa','Frederic'] as $name){
					// $stmt->execute([$name]);
				// }
				// $pdo->commit();
			// }catch (Exception $e){
				// $pdo->rollBack();
				// throw $e;
			// }
			?>
	</body>
</html>