<?php

namespace app\core\db;

use app\core\Application;
use app\core\Model;
use app\models\User;

abstract class DbModel extends Model
{
	abstract public function tableName(): string;

	abstract public function attributes(): array;

	abstract public function primaryKey(): string;

	public function save()
	{
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		$params = array_map(fn($attr) => ":$attr", $attributes);
		$statement = self::prapare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
			VALUES(" . implode(',', $params) . ")");
		foreach ($attributes as $attribute) {

			$statement->bindValue(":$attribute", $this->{$attribute});
		}

		$statement->execute();

		return true;
	}

	public static function prapare($sql)
	{
		return Application::$app->db->pdo->prepare($sql);
	}

	public static function abc()
	{
		return 'xyz';
	}

	public static function findOne(array $where)
	{
		$tableName = (new static)->tableName();
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(fn($atr) => "$atr = :$atr", $attributes));
		$statement = self::prapare("SELECT * FROM $tableName WHERE $sql");

		foreach ($where as $key => $item) {
			$statement->bindValue(":$key", $item);
		}

		$statement->execute();

		return $statement->fetchObject(static::class);
	}


}
