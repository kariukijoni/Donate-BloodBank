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
        $this->loadViews("transact", $this->global, $data, Null);
    }

    function transactHos() {
//        print_r($this->input->post('hos_id'));
//        die();
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
            'bbid' => $this->input->post('bbid'),
        );
        $this->task_model->donationRecord($donationRecord);

        /*
         * Array to input record to tbl_donation
         */
        $duration = $this->task_model->duration($this->input->post('donation_type'));
        $next_safe = date("Y-m-d", strtotime('+ ' . $duration[0]->frequency_days . ' days')); //render nextSafeDonationDate
        $data = array(
            'donation_type' => $this->input->post('donation_type'),
            'userid' => $this->input->post('userId'),
            'amount_donated_cc' => $this->input->post('amount_donated_cc'),
            'nextSafeDonation' => $next_safe
        );
        $this->task_model->donateUser($data);

        /*
         * update don_status controller
         */
        $userId = $this->input->post('userId');
        $userInfo = array('don_status' => 0);
        $this->task_model->donStatus($userId, $userInfo);
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
                'blood_type' => $this->input->post('blood_group'),
                'blood_type_requested' => $this->input->post('type_requested'),
                'date_requested' => date('Y-m-d H:i:sa'),
                'quantity_requested' => $this->input->post('quantity_requested')
            );

            $rid = $this->task_model->getRequests($request);

            $notification = array(
                'rqid' => $rid,
                'date_sent' => date('Y-m-d')
            );
            $this->task_model->notifications($notification);
        }

        $data['type'] = $this->task_model->getDonationType();
        $data['tbl_request'] = $this->task_model->bloodRequests();

        $this->global['pageTitle'] = 'BloodDonor : Requests';

        $this->loadViews("requests", $this->global, $data, Null);
    }

    function donorDashboard() {
        $this->global['pageTitle'] = 'BloodDonor : DonorRequests';
        $data['tbl_request'] = $this->task_model->bloodRequests();

        $this->loadViews('donorDashboard', $this->global, $data, NULL);
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

    function reports() {
        $this->global['pageTitle'] = 'BloodDonor : Transact';
        $data['reportDonors'] = $this->task_model->reportDonors();
        $data['reportHos'] = $this->task_model->reportHos();
        $this->loadViews('reports', $this->global, $data, NULL);
    }

}
