<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
	public string $email = '';
	public string $password = '';

	public function rules(): array
	{
		return [
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'password' => [self::RULE_REQUIRED]
		];
	}

	public function login()
	{
		$user = User::findOne(['email' => $this->email]);
		if (!$user) {
			$this->addError($this->email, 'Email is exists');
			return false;
		}
		if (!password_verify($this->password, $user->password)) {
			$this->addError($this->password, 'Password is incorrect');
			return false;
		}

		Application::$app->login($user);

		return true;
	}

	public function labels(): array {
		return [
			'email' => 'Your email',
			'password' => 'Password'
		];
	}
}
