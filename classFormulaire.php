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

	public function champTypeText($name, $label='', $value='') {
		$el = new Element('input');
		$el->addAttr('type', 'text');
		$el->addAttr('name', $name);
		$el->addAttr('value', $value);

		$this->addBasicChamp('txt_', $name, $el, $label);

		return $el;
	}

	public function champTypePassword($name, $label='') {
		$el = new Element('input');
		$el->addAttr('type', 'password');
		$el->addAttr('name', $name);

		$this->addBasicChamp('pass_', $name, $el, $label);

		return $el;
	}

	public function champTypeTextarea($name, $label='', $value='') {
		$el = new Element('textarea');
		$el->addAttr('name', $name);
		if ($value != '')
			$el->setContent($value);

		$this->addBasicChamp('txtarea_', $name, $el, $label);

		return $el;
	}

	public function champTypeCheckBox($values, $labels, $label='') {
		$fieldset = new Element('fieldset');
		$els = array();

		if ($label != '') {
			$legend = new Element('legend');
			$legend->setContent($label);
			$els[] = $legend;
		}

		$ol = new Element('ol');

		foreach ($values as $key => $value) {
			$elsLi = array();

			$id = 'chck_' . $value; 

			$el = new Element('input');
			$el->addAttr('type', 'checkbox');
			$el->addAttr('value', $value);
			$el->addAttr('id', $id);

			$elsLi[] = $el;

			if (isset($labels[$key])) {
				$label = new Element('label');
				$label->addAttr('for', $id);
				$label->setContent($labels[$key]);

				$elsLi[] = $label;
			}

			$li = new Element('li');
			$li->setChilds($elsLi);
			$ol->addChild($li);
		}

		$els[] = $ol;

		$fieldset->setChilds($els);

		$this->addElementsInOl(array($fieldset));

		return $els;
	}

	public function champTypeSelectSimple($name, $values, $labels, $label='', $multiple=false) {
		$select = new Element('select');
		$select->addAttr('name', $name);
		if ($multiple)
			$select->addAttr('multiple', 'true');

		foreach ($values as $key => $value) {
			$option = new Element('option');
			$option->addAttr('value', $value);
			if (isset($labels[$key]))
				$option->setContent($labels[$key]);

			$select->addChild($option);
		}

		$this->addBasicChamp('sel_', $name, $select, $label);
	}

	public function champTypeSelectMultiple($name, $values, $labels, $label='') {
		$this->champTypeSelectSimple($name, $values, $labels, $label, true);
	}

	public function champTypeFile($name, $label='', $accept='') {
		$el = new Element('input');
		$el->addAttr('type', 'file');
		$el->addAttr('name', $name);
		if ($accept != '')
			$el->addAttr('accept', $accept);

		$this->addBasicChamp('file_', $name, $el, $label);

		return $el;
	}

	public function champTypeRadio($name, $values, $labels, $label='') {
		$fieldset = new Element('fieldset');
		$els = array();

		if ($label != '') {
			$legend = new Element('legend');
			$legend->setContent($label);
			$els[] = $legend;
		}

		$ol = new Element('ol');

		foreach ($values as $key => $value) {
			$elsLi = array();

			$id = 'rd_' . $value; 

			$el = new Element('input');
			$el->addAttr('type', 'radio');
			$el->addAttr('value', $value);
			$el->addAttr('id', $id);
			$el->addAttr('name', $name);

			$elsLi[] = $el;

			if (isset($labels[$key])) {
				$label = new Element('label');
				$label->addAttr('for', $id);
				$label->setContent($labels[$key]);

				$elsLi[] = $label;
			}

			$li = new Element('li');
			$li->setChilds($elsLi);
			$ol->addChild($li);
		}

		$els[] = $ol;

		$fieldset->setChilds($els);

		$this->addElementsInOl(array($fieldset));

		return $els;
	}

	public function champTypeHidden($name, $value) {
		$el = new Element('input');
		$el->addAttr('type', 'hidden');
		$el->addAttr('name', $name);
		$el->addAttr('value', $value);

		$this->addChild($el);

		return $el;
	}

	public function boutonAnnuler($value='') {
		$el = new Element('input');
		$el->addAttr('type', 'reset');
		if ($value != '')
			$el->addAttr('value', $value);

		$this->addChild($el);

		return $el;
	}

	public function boutonValider($value='') {
		$el = new Element('input');
		$el->addAttr('type', 'submit');
		if ($value != '')
			$el->addAttr('value', $value);

		$this->addChild($el);

		return $el;
	}

	public function afficheFormulaireHTML() {
		$this->render();
	}

	public function getCptElements() {
		return count($this->getChilds());
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