<?php
class Agenda extends AppModel {
    public $name = 'Agenda';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'starts' => array(
            'rule' => 'notEmpty'
        ),
        'ends' => array(
            'rule' => 'notEmpty'
        )
    );
    
   public function isOwnedBy($agenda, $user) {
         if($agenda == 0){
            return true;
         }
       return $this->field('id', array('id' => $agenda, 'user_id' => $user)) === $agenda;
   }
}