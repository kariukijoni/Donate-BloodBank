<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task_model extends CI_Model {
    /*
     * This function is used to add new Hospital 
     */

    function addHos($addHos) {
        $this->db->trans_start();
        $this->db->insert('tbl_hospitals', $addHos);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    /*
     * function used to insert data to table tbl_donation
     */

    function donateUser($donor) {
        $this->db->trans_start();
        $this->db->insert('tbl_donation', $donor);
        $this->db->trans_complete();
//        return $insert_id;
    }

    /*
     * this function is used to getRequests
     */

    function makeRequests($requests) {
        $this->db->trans_start();
        $this->db->insert('tbl_requests', $requests);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    /*
     * function notifications
     */

    function notifications($notification) {
        $this->db->trans_start();
        $this->db->insert('tbl_notifications', $notification);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    /*
     * function count notifications
     */

    function countNotifications() {
        $q = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_notifications where status='unread'");
        return $q->row_array();
    }

    /*
     * function used to getDonationTypes
     */

    function getDonationType() {
        $this->db->select('type');
        $this->db->from('tbl_donation_types');
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * Select Blood Group
     */

    function getBloodGroup() {
        $this->db->select('blood_type');
        $this->db->from('tbl_donors_preexam');
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * Select name of registered hospital
     */

    function getNameRegHos() {
        $this->db->select('hos_name');
        $this->db->from('tbl_hospitals');
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * Select Blood type
     */

    function getBloodType() {
        $this->db->select('donation_type');
        $this->db->from('tbl_donation');
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * get blood all requests
     */

    function bloodRequests() {
        $this->db->select('tbl_requests.*');
        $this->db->from('tbl_requests');
        $this->db->order_by('date_requested');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    /*
     * get blood requests for a specific user
     */

    public function blood_type() {
        $this->db->select('tbl_donors_preexam.blood_type');
        $this->db->where('userid', $this->session->userdata('userId'));
        $this->db->from('tbl_donors_preexam');
        $query = $this->db->get();
        $result = $query->result();

        return $result[0]->blood_type;
    }

    function specificRequest() {
        $blood_type = $this->blood_type();
        $this->db->select('tbl_requests.*');
        $this->db->where('blood_type', $blood_type);
        $this->db->from('tbl_requests');
        $query = $this->db->get();
        $result = $query->result();
//        print_r($result);
//        die();
        return $result;

//        print_r($this->session->userdata('userId'));
//        print_r($this->session->userdata('name'));
//        print_r($this->session->userdata ( 'roleText' ));
//        die();
    }

    /*
     * fuction used to keep donationRecords
     */

    function donationRecord($record) {
        $this->db->trans_start();
        $this->db->insert('tbl_donation_records', $record);
        $this->db->trans_complete();
    }

    /*
     * Sum blood donation amount_donated_cc and groupings totals
     */

    function bloodStock() {
        $this->db->select('tbl_donation.donation_type,tbl_donors_preexam.blood_type');
        $this->db->select_sum('tbl_donation.amount_donated_cc');
        $this->db->group_by('tbl_donation.donation_type');
        $this->db->group_by('tbl_donors_preexam.blood_type');
        $this->db->from('tbl_donation');
        $this->db->join('tbl_donors_preexam', 'tbl_donation.userid=tbl_donors_preexam.userid');
        $query = $this->db->get();
        $result = $query->result();
//        print_r($result);
//        die();
        return $result;
    }

    /*
     * function used to populate tbl_transact
     */

    function transactBlood($trans) {
        $this->db->trans_start();
        $this->db->insert('tbl_transact', $trans);
        $this->db->trans_complete();
    }

    /*
     * function report Hospitals
     */

    function reportHos() {
        $this->db->select('trans_id,hos_name,donation_type,blood_type,amount_donated_cc,transact_date');
        $this->db->from('tbl_transact');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /*
     * function print donation reports
     */

    function reportDonors() {
        $this->db->select('tbl_donation.did,tbl_donation.donation_type,tbl_donation.nextSafeDonation, '
                . 'tbl_donation_records.donation_date');
        $this->db->from('tbl_donation');
        $this->db->join('tbl_donation_records', 'tbl_donation_records.did=tbl_donation.did', 'inner');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /*
     * specific donors report
     */

    function specificDonorsReport() {
        $this->db->select('tbl_donation.did,tbl_donation.userid,tbl_donation.donation_type,tbl_donation.nextSafeDonation, '
                . 'tbl_donation_records.donation_date');
        $this->db->where('tbl_donation.userid', $this->session->userdata('userId'));
        $this->db->from('tbl_donation');
        $this->db->join('tbl_donation_records', 'tbl_donation_records.did=tbl_donation.did', 'inner');
//        $this->db->where('tbl_donation.userid', $this->session->userdata('userId'));
        $query = $this->db->get();
        $result = $query->result();
//        print_r($result);
//        die();
        return $result;
    }

    /*
     * function duration to set date_frequencies
     */

    function duration($type) {
        $this->db->select('frequency_days');
        $this->db->where('type', $type);
        $this->db->from('tbl_donation_types');
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * function count number of registered active donors
     */

    function countDonors() {
        $q = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_users where isDeleted='0' AND roleId='3'");
        return $q->row_array();
    }

    /*
     * count All users of the system
     */

    function getCountAllUsers() {
        $q = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_users where isDeleted='0'");
        return $q->row_array();
    }

    /*
     * function update donation_status after donation
     */

    function donStatus($userId, $userInfo) {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }

    /*
     * update donation_status after a period of time
     */

    function donStatusDonate($userId, $userInfo) {
        $this->db->where('userId', $userId);
        $this->db->where();
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }

    function getMales() {
        $q = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_donors_preexam left join "
                . "tbl_users on tbl_donors_preexam.userid=tbl_users.userid where isDeleted='0' AND gender='male'");
        return $q->row_array();
    }

    function getFemales() {
         $q = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_donors_preexam left join "
                . "tbl_users on tbl_donors_preexam.userid=tbl_users.userid where isDeleted='0' AND gender='female'");
        return $q->row_array();
    }
    
   /*
    * function deleterequest
    */
   function delRequest($rqid=NULL)
   {
//       $this->db->where('rqid');
//       $this->db->delete('tbl_requests');
        return $this->db->delete('tbl_requests',array('rqid'=>$rqid));
   }

}
