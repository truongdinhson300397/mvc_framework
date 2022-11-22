<?php
namespace app\models;

use app\core\UserModel;

class User extends UserModel {
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_DELETED = 2;

	public string $name = '';
	public string $email = '';
	public string $password = '';
	public string $confirm_password = '';
	public int $status = self::STATUS_INACTIVE;

	public function tableName(): string
	{
		return 'users';
	}

	public function primaryKey(): string
	{
		return 'id';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'password'];
	}

	public function save()
	{
//		$this->status = self::STATUS_INACTIVE;
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);

		return parent::save();
	}

	public function rules(): array
	{
		return [
			'name' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 1], [self::RULE_MAX, 'max' => 32]],
			'confirm_password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
		];
	}

	public function labels(): array
	{
		return [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'confirm_password' => 'Confirm Password'
		];
	}

	public function getDisplayName(): string
	{
		return $this->name;
	}
}
