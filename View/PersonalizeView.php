<?php
App::uses('View', 'View');
class PersonalizeView extends View {

	protected $_config = array(
		'before' => '{{',
		'after' => '}}'
	);

	public function render($view = null, $layout = null) {
		$content = parent::render($view, $layout);
		if (!isset($this->viewVars['_personalize']) || !is_array($this->viewVars['_personalize'])) {
			return $content;
		}

		$content = $this->_personalize($content, $this->viewVars['_personalize']);
		return $content;
	}

	protected function _personalize($content, array $vars) {
		$content = String::insert($content, Hash::flatten($vars), $this->_config);
		return $content;
	}

}
