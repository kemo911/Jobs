<?php
    class JobsController extends AppController {
        public $name = 'Jobs' ;
        
        public function index() {
            $this ->set('title_for_layout' , 'JobFinds');
            //Get jobs info
            
            $this->set('categories', $this->Job->Category->find('all')) ;
            $this->set('jobs', $this->Job->find('all' )) ;
        }
        
        //Browse method
        public function browse($category = null) {
            $conditions = array();

            if($this->request->is('post')){
                if(!empty($this->request->data('keywords'))){
                    $conditions[]=array ('OR' => array(
                    'Job.title LIKE' => "%" . $this->request->data('keywords') . "%",
                    'Job.description LIKE' => "%" . $this->request->data('keywords') . "%"    
                 )   ) ;
                }
            }
            
                if(!empty($this->request->data('state')) && $this->request->data('state')!= 'Select state' ){
                    $conditions[]=array (
                    'Job.state LIKE' => "%" . $this->request->data('state') . "%"    
                    )    ;
                }
            
                if(!empty($this->request->data('category')) && $this->request->data('category')!= 'Select category' ){
                    $conditions[]=array (
                    'Job.category_id LIKE' => "%" . $this->request->data('category') . "%"    
                    )    ;
                }
            
            $this->set('categories', $this->Job->Category->find('all')) ;
            
            if ($category != NULL){
                $conditions[]=array (
                    'Job.category_id LIKE' => "%" . $category . "%"
                ) ;
            }
            $options = array (
                'order' => array('Job.created'=>'desc'),
                'conditions' => $conditions,
                'limit' => 8
            );
            $this ->set('title_for_layout' , 'Browse jobs');
            //Get jobs info
            $this->set('jobs', $this->Job->find('all',$options)) ;
        }
        
        
        public function view ($id) {
            if(!$id){
                throw new NotFoundException(__('Invalid Job listing'));
            }
            $job = $this->Job->findById($id);
            
            if(!$job){
                throw new NotFoundException(__('Invalid Job listing'));
            }
            
            //set title
            
            $this ->set('title_for_layout' , $job['Job']['title']);
            $this->set('job',$job);
            
        }
        
        public function add(){
            $this->set('categories',$this->Job->Category->find('list'));
            $this->set('types' ,  $this->Job->Type->find('list'));
            
            if($this->request->is('post')){
                $this->Job->create();
                //Save the data 
                $this->request->data['Job']['user_id'] = 1;
                if($this->Job->save($this->request->data)){
                    $this->Session->setFlash(__('Your Job has been listed'));
                    return $this->redirect(array('action'=>'index'));
                }
                $this->Session->setFlash(__('Unable you Add the jobs'));
            }
        }
        
        public function edit($id){
            $this->set('categories',$this->Job->Category->find('list'));
            $this->set('types' ,  $this->Job->Type->find('list'));
            
            if(!$id){
                throw new NotFoundException(__('Invalid Job listing'));
            }
            
            $job = $this->Job->findById($id);
            
            if(!$job){
                 throw new NotFoundException(__('Invalid Job listing'));
            }
            
            if($this->request->is(array('job','put'))){
                $this->Job->id=$id;
                if($this->Job->save($this->request->data)){
                    $this->Session->setFlash(__('Your Job has been listed'));
                    return $this->redirect(array('action'=>'index'));
                }
                $this->Session->setFlash(__('Unable you Add the jobs'));
            }
            if(!$this->request->data){
                $this->request->data = $job;
            }
        }
        public function delete($id){
            if($this->request->is('get')){
                throw new MethodNotAllowedException();
            }
            if($this->Job->delete($id)){
                $this->Session->setFlash(__('The Job with id : %s had been deleted',  h($id)));
            }
            return $this->redirect(array('action'=>'index'));
        }
    }
?>