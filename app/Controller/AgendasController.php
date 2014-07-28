<?php
class AgendasController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Agendas';
    
    function index() {
        $this->set('agendas', $this->Agenda->find('all', array(
           'conditions' => array('Agenda.user_id =' => $this->Auth->user('id'))
         )));
    }

    public function view($id = null) {
        $this->Agenda->id = $id;
        $this->set('agenda', $this->Agenda->read());
    }
    
    ///* sintetizado no edit, pois a view teria o mesmo código
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Agenda->save($this->request->data)) {
                $this->Session->setFlash('Seu compromisso foi salvo.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    //*/
    
    function edit($id = null) {
       $this->Agenda->id = $id;
       if ($this->request->is('get')) {
           $this->request->data = $this->Agenda->read();
       } else if ($this->request->is('post')) {
            $this->request->data['Agenda']['user_id'] = $this->Auth->user('id');
            if ($this->Agenda->save($this->request->data)) {
                $this->Session->setFlash('Seu compromisso foi salvo.');
                $this->redirect(array('action' => 'index'));
            }
        } else {
           if ($this->Agenda->save($this->request->data)) {
               $this->Session->setFlash('Seu compromisso foi atualizado.');
               $this->redirect(array('action' => 'index'));
           }
       }
   }
   function delete($id) {
       if (!$this->request->is('post')) {
           throw new MethodNotAllowedException();
       }
       if ($this->Agenda->delete($id)) {
           $this->Session->setFlash('O compromisso ' . $id . ' foi excluido.');
           $this->redirect(array('action' => 'index'));
       }
   }
   
   public function isAuthorized($user) {
       if (!parent::isAuthorized($user)) {
           if ($this->action === 'add') {
               // Todos os usuários registrados podem criar compromissos
               return true;
           }
           if (in_array($this->action, array('edit', 'delete', 'view'))) {
               $agendaId = (int) isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : 0;
               return $this->Agenda->isOwnedBy($agendaId, $user['id']);
           }
       }
       return false;
   }
}