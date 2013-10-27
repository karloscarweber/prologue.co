<?php
App::uses('AppController', 'Controller');

class FeaturesController extends AppController {

	public $name = 'Features';

	var $components = array('Auth');
	var $p_user = array();

	public function beforeFilter()
	{
	}

	public function index()
	{
		$this->layout = 'dashboard';
		$features = $this->Feature->find('all');
		$this->set('features', $features);
	}


	public function admin_index()
	{	
		$this->layout = 'dashboardsingles';		
		$this->loadModel('Vote');
		$features = $this->Feature->find('all');
		$new = array();
		foreach($features as $feature){
			$feature['Feature']['votestotal'] = $this->Vote->find('count', array('conditions' => array('feature_id' => $feature['Feature']['id'])));
			$new[] = $feature;
		}
		$this->set('features', $new);
		$this->scrollStats();
	}	

	public function admin_edit($id = null)
	{
		$this->layout = 'dashboardsingles';		
		if(!empty($this->data)){
			if($this->Feature->save($this->data)){
				$this->Session->setFlash('Feature Saved Successfully');
				$this->redirect('/admin/features/');
			}
		}
		if($id){
			$feature = $this->Feature->findById($id);
			if(!empty($feature)){
				$this->data = $feature;
				debug($feature);
			}
		}
	}

	public function admin_add($id = null)
	{
		$this->layout = 'dashboardsingles';		
		if(!empty($this->data)){
			if($this->Feature->save($this->data)){
				$this->Session->setFlash('Feature Saved Successfully');
				$this->redirect('/admin/features/');
			}
		}
        $this->render('admin_edit');
	}

}