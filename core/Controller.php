<?php
namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{
	public string $layout = 'main';
	public string $action = '';

	/**
	 * @var \app\core\middlewares\BaseMiddleware
	 */
	public array $middlewares = [];


	protected function setLayout($layout)
	{
		$this->layout = $layout;
	}

	protected function render($view, $params = [])
	{
		return Application::$app->view->renderView($view, $params);
	}

	public function registerMiddleware(BaseMiddleware $middleware)
	{
		$this->middlewares[] = $middleware;
	}


	/**
	 * @var \app\core\middlewares\BaseMiddleware[]
	 */
	public function getMiddlewares(): array
	{
		return $this->middlewares;
	}
}
