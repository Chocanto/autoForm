<?php

require_once('Element.php');

class FormulaireHTML extends Element {
	protected $action = '';

	public function __construct($action='', $method='GET') {
		parent::__construct('form');

		$this->addAttr('action', $action);
		$this->addAttr('method', $method);
	}

	public function champTypeText($name='', $value='') {
		$el = new Element('input');
		$el->addAttr('type', 'text');
		$el->addAttr('name', $name);
		$el->addAttr('value', $value);

		$this->addChild($el);
	}

	public function champTypePassword() {

	}

	public function champTypeTextarea() {

	}

	public function champTypeCheckBox() {

	}

	public function champTypeSelectSimple() {

	}

	public function champTypeSelectMultiple() {

	}

	public function champTypeFile() {

	}

	public function champTypeRadio() {

	}

	public function champTypeHidden() {

	}

	public function boutonAnnuler() {

	}

	public function boutonValider() {

	}

	public function afficheFormulaireHTML() {
		$this->render();
	}

	public function getCptElements() {

	}
}