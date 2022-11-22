<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
	public function home()
	{
		$params = [
			'name' => 'seven test'
		];

		return $this->render('home', $params);
	}

	public function contact(Request $request)
	{
		$data = new ContactForm();
		if ($request->isPost()) {
			$data->loadData($request->getBody());

			if ($data->validate() && $data->send()) {
				Application::$app->session->setFlash('success', 'Thanks register for contact');
				Application::$app->response->redirect('/');
				exit;
			}

			$this->setLayout('auth');

			return $this->render('contact', [
				'model' => $data
			]);
		}

		$this->setLayout('auth');

		return $this->render('contact', [
			'model' => $data
		]);
	}
}
