<?php

class SocialHelper extends AppHelper
{
	public $helpers = array('Html');
	public function foto($user, $grande = false)
	{

		if (!$grande){
				$url = 'foto.jpg';
			} else {
				$url = 'foto_gd.jpg';
			}

		if (!empty($user['id']) and (!empty($user['foto']))) {
			if (!$grande){
				$dir = '/thumb_';
			} else {
				$dir = '/';
			}
			$url = 'perfil/'.$user['id'].$dir.$user['foto'];
		}

		$img = $this->Html->image($url, array('class'=>'img-responsive'));
		return $img;
	}
}