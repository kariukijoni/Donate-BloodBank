<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require  APPPATH . '/libraries/fpdf/fpdf.php';
class Task extends BaseController {

    /**
     * This is default constructor of the class
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('login_model');
        $this->isLoggedIn();
    }

    function transact() {
        $this->global['pageTitle'] = 'BloodDonor : Transact';
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
            'donation_date' => date('Y-m-d H:i:sa'));
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
            $rid = $this->task_model->makeRequests($request);
            $notification = array(
                'rqid' => $rid, 'date_sent' => date('Y-m-d H:i:sa')
            );
            $this->task_model->notifications($notification);
            $data['success'] = 'haha';
        }

        $data['type'] = $this->task_model->getDonationType();
        $data['tbl_request'] = $this->task_model->bloodRequests();
        $this->global['pageTitle'] = 'BloodDonor : Requests';
        $this->loadViews("requests", $this->global, $data, Null);
//        print_r($message);
//        die();
    }

    function donorDashboard() {
        $this->global['pageTitle'] = 'BloodDonor : DonorRequests';
        $data['specific_request'] = $this->task_model->specificRequest();
        $data['specific_report'] = $this->task_model->specificDonorsReport();
        $data['notifications'] = $this->task_model->countNotifications();
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
        $this->global['pageTitle'] = 'BloodDonor : Reports';
        $data['reportDonors'] = $this->task_model->reportDonors();
        $data['reportHos'] = $this->task_model->reportHos();
        $this->loadViews('reports', $this->global, $data, NULL);
    }

    /*
     * function deleteReq
     */

    function deleteReq($rqid = NULL) {
//        print_r($this->task_model->delRequest());
//        die();
//        $data['tbl_request'] = $this->task_model->bloodRequests();
//        $this->loadViews("requests", $this->global, $data, Null);
        $status = $this->task_model->delRequest($rqid);
//        header('Content-type:application/json');
  //      echo json_encode(array('success' => $status));
        $data['tbl_request'] = $this->task_model->bloodRequests();
        redirect("task/requests");
    }

    /*
     * function printPDF reports
     */

    function printPDF() {
        //A4 width 219 mm
        //default margin; 10mm each
        $pdf=new FPDF('p','mm','A4');
        $pdf->AddPage();
        //set font to arial bold and 14 pt
        $pdf->SetFont('Arial','B',14);
        //cell(width, height, text, border, endline, align)
        $pdf->Cell(189, 5, 'Donation Reports', 1, 0);
//        $pdf->Cell(59, 5, '', 1, 1);//endline
//        $this->task_model->reportDonors();
//        $query="SELECT tbl_donation.did,tbl_donation.donation_type,tbl_donation.nextSafeDonation, FROM tbl_donation left join "
//                . "tbl_donation_records on tbl_donation.did=tbl_donation_records.donation_date.did";
//        $result=  mysqli_query($query);
        
        $pdf->Output();
    }

}
