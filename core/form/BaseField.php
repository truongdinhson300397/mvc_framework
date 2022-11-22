<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseField {
	public string $type;
	public Model $model;

	public function __construct(Model $model, string $attribute) {
		$this->model = $model;
		$this->attribute = $attribute;
	}
	abstract public function renderInput(): string;
}
