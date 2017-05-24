<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Task extends BaseController {

    /**
     * This is default constructor of the class
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->isLoggedIn();
    }

    function transact() {
        $this->global['pageTitle'] = 'BloodDonor : Transact';
        $this->load->model('task_model');
        $data['record'] = $this->task_model->bloodStock(); //retrieve array with bloodstock
        $data['hos_name'] = $this->task_model->getNameRegHos(); //getHosName
//        $data['blood_type'] = $this->task_model->getBloodGroup(); //GetBloodGroup
//        $data['donation_type'] = $this->task_model->getBloodType(); //GetBloodType       
        $this->loadViews("transact", $this->global, $data, Null);
    }

    function transactHos() {
//        print_r($this->input->post('hos_id'));
//        die();
        $this->load->model('task_model');
        $transact = array(
            'hos_name' => $this->input->post('hos_name'),
            'donation_type' => $this->input->post('blood_group'),
            'blood_type' => $this->input->post('blood_type'),
            'amount_donated_cc' => $this->input->post('amount_donated_cc'),
            'transact_date' => date('Y-m-d')
        );
        $this->task_model->transactBlood($transact);
        redirect('task/transact');
    }

    /**
     * This function is used to add new hospital to the system
     */
    function addHos() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hos_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('hos_location', 'Location', 'trim|required');
        $this->load->model('task_model');
        $data = array(
            'hos_name' => $this->input->post('hos_name'),
            'hos_location' => $this->input->post('hos_location'),
            'createdAt' => date('Y-m-d H:i:sa')
        );
        $this->task_model->addHos($data);
        redirect('task/transact');
    }

    /*
     * This function is used to get the donation types
     *  Either Blood, plasma,power red or platelets
     */

    function donate() {
        $this->load->model('task_model');
        $data['type'] = $this->task_model->getDonationType();
        $data['user_id'] = $this->input->get('user_id');
        $this->global['pageTitle'] = 'BloodDonor : Donate';
        $this->loadViews("donate", $this->global, $data, Null);
    }

    /*
     * 
     * process donate transaction
     */

    function donateUser() {
        /*
         * Array to input record to tbl_donation_records
         */
        $donationRecord = array(
            'donation_date' => date('Y-m-d H:i:sa'),
            'bbid' => $this->input->post('bbid')
        );
        $this->load->model('task_model');
        $this->task_model->donationRecord($donationRecord);

        /*
         * Array to input record to tbl_donation
         */
        $data = array(
            'donation_type' => $this->input->post('donation_type'),
            'userid' => $this->input->post('userId'),
            'amount_donated_cc' => $this->input->post('amount_donated_cc')
        );
        $this->task_model->donateUser($data);
        redirect('user/donors');
    }

    /*
     * requests by admin
     */

    function requests() {


        if (isset($_POST['type_requested']) & isset($_POST['quantity_requested'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('blood_type_requested', 'Blood Type', 'required');
            $this->form_validation->set_rules('quantity_requested', 'Quantity Requested', 'required');
            $request = array(
//                'userid' => $this->input->post('userid'),
                'blood_type' => $this->input->post('blood_group'),
                'blood_type_requested' => $this->input->post('type_requested'),
                'date_requested' => date('Y-m-d H:i:sa'),
                'quantity_requested' => $this->input->post('quantity_requested')
            );

            $this->task_model->getRequests($request);
        }


        $data['type'] = $this->task_model->getDonationType();
        $data['tbl_request'] = $this->task_model->bloodRequests();

        $this->global['pageTitle'] = 'BloodDonor : Requests';

        $this->loadViews("requests", $this->global, $data, Null);
    }

    function donorRequest() {
        $this->global['pageTitle'] = 'BloodDonor : DonorRequests';
        $this->loadViews('donorRequest', $this->global, Null, NULL);
    }

    /*
     * this controller lists the added hospitals using
     * ajax
     */

    function showHos() {
        //load library table
        $this->load->library('table');

        //set heading
        $this->table->set_heading('#', 'Hospital Name', 'Hospital Location', 'JoinedOn');

        //set template
        $style = array('table_open' => '<table class="table table-striped table-hover table-bordered">');
        $this->table->set_template($style);

        echo $this->table->generate($this->db->get('tbl_hospitals'));
    }

}
