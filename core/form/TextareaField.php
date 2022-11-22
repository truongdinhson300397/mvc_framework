<?php

namespace app\core\form;

use app\core\Model;

class TextareaField extends BaseField
{
	public function __construct(Model $model, string $attribute) {
		parent::__construct($model, $attribute);
	}

	public function renderInput(): string {
		return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
			$this->attribute,
			$this->model->hasError($this->attribute) ? ' is-invalid' : '',
			$this->model->{$this->attribute},

		);
	}

	public function __toString() {
		return sprintf('
			<div class="form-group">
				<label>%s</label>
				%s
				<div class="invalid-feedback">
					%s
				</div>
			</div>
		',
			$this->model->labels()[$this->attribute] ?? $this->attribute,
			$this->renderInput(),
			$this->model->getFirstError($this->attribute)
		);
	}
}
