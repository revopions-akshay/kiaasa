<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class State extends REST_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function getState_post() {
        $method = $this->_detect_method();
        if (!$method == 'POST') {
            $this->response(['status' => 400, 'messsage'=>'error', 'description' => 'Bad request.'], REST_Controller::HTTP_BAD_REQUEST);
            exit();
        }
        else{
            $offset = $this->input->post('offset');
            $limit = $this->input->post('limit');
            $states = $this->state_m->getStates($limit,$offset);
            if (!empty($states)) {

                    $newdata = array( 
                        
                        'states' => $states
                    );
                    $response = ['status' => 200, 'message' => 'success', 'description' => 'There is states list.', 'data'=>$newdata];
                
            } else {
            
             
                    $response = ['status' => 200, 'message' => 'error', 'description' => 'There is some error'];
                }
            
                    
            $this->response($response, REST_Controller::HTTP_OK);
            exit();
            
        }
    }

    





//CLASS ENDS
}