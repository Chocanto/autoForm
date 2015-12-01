<?php

require_once('Element.php');

class FormulaireHTML extends Element {
	protected $action = '';
	protected $fieldset;
	protected $ol;

	public function __construct($action='', $method='GET') {
		parent::__construct('form');

		$this->addAttr('action', $action);
		$this->addAttr('method', $method);

		$this->fieldset = new Element('fieldset');
		$this->ol = new Element('ol');

		$this->fieldset->addChild($this->ol);
		$this->addChild($this->fieldset);
	}

	public function label($text, $for='') {
		$el = new Element('label');
		$el->addAttr('for', $for);
		$el->setContent($text);

		return $el;
	}

	public function champTypeText($name='', $label='', $value='') {
		$el = new Element('input');
		$el->addAttr('type', 'text');
		$el->addAttr('name', $name);
		$el->addAttr('value', $value);

		$this->addBasicChamp('txt_', $name, $el, $label);

		return $el;
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

	protected function addElementsInOl($arr) {
		$li = new Element('li');
		foreach ($arr as $el) {
			$li->addChild($el);
		}
		$this->ol->addChild($li);
	}

	protected function addBasicChamp($idPrefix, $name, $champ, $label = '') {
		$els = array();
		$id = $idPrefix . $name;

		if ($label != '') {
			$label = $this->label($label, $id);
			$els[] = $label;
		}

		$champ->addAttr('id', $id);
		$els[] = $champ;

		$this->addElementsInOl($els);

		return $els;
	}
}