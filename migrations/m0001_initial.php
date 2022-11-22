<?php

class m0001_initial
{
	public function up()
	{
		$db = \app\core\Application::$app->db;
		$sql = "CREATE TABLE users(
			id    INT AUTO_INCREMENT PRIMARY KEY,
			name  varchar(255) NOT NULL,
			email varchar(255) NOT NULL
		) ENGINE=INNODB;";

		$db->pdo->exec($sql);
	}

	public function down()
	{
		$db = \app\core\Application::$app->db;
		$sql = "DROP TABLE users;";

		$db->pdo->exec($sql);
	}
}
