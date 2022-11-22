<?php

namespace app\core;

class View extends Router
{
	public string $title = '';

	public function renderView($view, $params = []) {

		$viewContent = $this->renderOnlyView($view, $params);
		$layoutContent = $this->layoutContent();

		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	public function renderContent($viewContent)
	{
		$layoutContent = $this->layoutContent();

		return str_replace('{{content}}', $viewContent, $layoutContent);
	}
}
