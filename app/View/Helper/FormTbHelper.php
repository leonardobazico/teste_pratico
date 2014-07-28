<?php

App::import('View/Helper', 'FormHelper');

class FormTbHelper extends FormHelper
{
	public function create($model = null, $options = array()) {
		
		if (!empty($options['inputDefaults'])){
			extract($options['inputDefaults']);
			$class = (!empty($class))? 'form-control '.$class:'form-control';
			$before = (!empty($before))? '<div class="form-group">'.$before : '<div class="form-group">';
			$between = (!empty($between))? '<div class="col-sm-10"> '.$between:'<div class="col-sm-10">';
			$after = (!empty($after))? '</div></div> '.$after:'</div></div>';
			if ((!empty($label)) and is_array($label)) {
				$label['class'] = (!empty($label['class']))? 'control-label col-sm-2 '.$label: 'control-label col-sm-2';
			} else if (!empty($label)) {
				$label['text'] = $label;
				$label['class'] = 'control-label col-sm-2';
			}
		} else {
			$class = 'form-control';
			$before = '<div class="form-group">';
			$between = '<div class="col-sm-10">';
			$after = '</div></div>';
			$label['class'] = 'control-label col-sm-2 ';
		}

		$options['class'] = (empty($options['class']))?'form-horizontal':'form-horizontal '.$options['class'];
		$options['role'] = (empty($options['role']))?'form':'form '.$options['role'];

		$options['inputDefaults']['class'] = $class;
		$options['inputDefaults']['before'] = $before;
		$options['inputDefaults']['between'] = $between;
		$options['inputDefaults']['after'] = $after;
		$options['inputDefaults']['label'] = $label;
		$options['inputDefaults']['div']=false;

		return parent::create($model, $options);
	}

	public function input($fieldName, $options = array()) {

		if (!empty($options['type']) and ($options['type'] == 'submit')) {
            if ((!empty($options['label'])) and is_array($options['label'])) {
				$label['class'] = (!empty($label['class']))? 'control-label col-sm-2 '.$options['label']: 'control-label col-sm-2';
				$label['text'] = (!empty($label['text']))? $options['label']['text']: false;
			} else if (!empty($options['label'])) {
				$label['text'] = false;
				$label['class'] = 'control-label col-sm-2';
			}

			if (isset($label)) {
				$options['label'] = $label;
			}
			if (empty($options['class'])) $options['class'] = 'btn btn-danger';
		} else {
			if (!empty($options['class'])) $options['class'] = 'form-control '.$options['class'];
			if ((!empty($options['label'])) and is_array($options['label'])) {
				$options['label']['class'] = (!empty($options['label']['class']))? 'control-label col-sm-2 '.$options['label']['class']: 'control-label col-sm-2';
			} else if (!empty($options['label'])) {
				$label['text'] = $options['label'];
				$label['class'] = 'control-label col-sm-2';
				$options['label'] = $label;
			}
		}

		if (empty($options['between'])) $options['between'] = '<div class="col-sm-10">';
		if (!empty($options['after'])) $options['after'] = $options['after'].'</div></div> ';

		return parent::input($fieldName, $options);
	}
}