<?php

namespace app\core;

use app\core\db\Database;
use app\core\db\DbModel;

class Application
{
	public static string $ROOT_DIR;

	public string $layout = 'main';
	public string $userClass;
	public Request $request;
	public Response $response;
	public Session $session;
	public Router $router;
	public static Application $app;
	public Controller $controller;
	public Database $db;
	public ?DbModel $user;
	public View $view;

	public function __construct($rootPath, array $config)
	{
		$this->userClass = $config['userClass'];
		self::$ROOT_DIR = $rootPath;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		$this->router = new Router($this->request, $this->response);
		$this->db = new Database($config['db']);
		$this->view = new View($this->request, $this->response);

		$primaryValue = $this->session->get('user');
		if ($primaryValue) {
			$primaryKey = (new $this->userClass)->primaryKey();
			$this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
		} else {
			$this->user = null;
		}
	}

	public static function isGuest()
	{
		return !self::$app->user;
	}

	public function run()
	{
		try {
			echo $this->router->resolve();
		}catch (\Exception $e) {
			$this->response->setStatusCode($e->getCode());
			echo $this->view->renderView('_error', [
				'exception' => $e
			]);
		}
	}

	public function setController(Controller $controller): void
	{
		$this->controlle = $controller;
	}

	public function getController(): Controller
	{
		return $this->controller;
	}

	public function login(DbModel $user)
	{
		$this->user = $user;
		$primaryKey = $user->primaryKey();
		$primaryValue = $user->{$primaryKey};
		$this->session->set('user', $primaryValue);
	}

	public function logout()
	{
		$this->user = null;
		$this->session->remove('user');
	}
}
