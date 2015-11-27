<?php

class Element {
	protected $type;
	protected $childs;
	protected $attr;

	public function __construct($type) {
		$this->type = $type;
		$this->attr = array();
		$this->childs = array();
	}

	public function addChild($child) {
		$this->childs[] = $child;
	}

	public function addAttr($attribute, $value) {
		$this->attr[$attribute] = $value;
	}

	public function rmAttr($attribute) {
		unset($this->attr[$attribute]);
	}

	public function render() {
		$this->renderStart();
		$this->renderChilds();
		$this->renderEnd();
	}

	protected function renderStart() {
		echo '<' . $this->type;
		foreach ($this->attr as $name => $value) {
			if ($value != '')
				echo ' ' . $name . '="' . $value . '"';
		}
		echo '>';
	}

	protected function renderEnd() {
		echo '</' . $this->type . '>';
	}

	protected function renderChilds() {
		foreach ($this->childs as $child) {
			$child->render();
		}
	}

	/**SETTERS**/
	public function setType($type) {
		$this->type = $type;
	}

	public function setChilds($childs) {
		$this->childs = $childs;
	}

	public function setAttributes($attributes) {
		$this->attributes = $attributes;
	}

	/**GETTERS**/
	public function getType() { return $this->type; }

	public function getChilds() { return $this->childs; }

	public function getAttributes() { return $this->attr; }

	public function getAttribute($name) { return $this->attr[$name]; }
}