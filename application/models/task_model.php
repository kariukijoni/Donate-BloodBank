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
        $query = $this->db->insert('tbl_donation', $donor);
//        $this->db->trans_complete();
        if ($query) {
            $this->db->trans_complete();
            return TRUE;
        } else {
            $this->db->trans_complete();
            return FALSE;
        }
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
        $results = array();
        $this->db->select('tbl_notifications.status,tbl_donors_preexam.blood_type');
        $this->db->from('tbl_notifications');
        $this->db->join('tbl_donors_preexam', 'tbl_notifications.userid=tbl_donors_preexam.userid');
        $this->db->where('tbl_donors_preexam.userid', $this->session->userdata('userId'));
        $this->db->where('tbl_notifications.status', 'unread');
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        if ($num_of_records > 0) {
            $results = $query->result_array();
        }
//        print_r($this->session->userdata('userId'));
//        die();
        return $results;
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
        $this->db->join('tbl_donors_preexam', 'tbl_donation.userid=tbl_donors_preexam.userid');
        $this->db->select('tbl_donation.donation_type,tbl_donors_preexam.blood_type');
        $this->db->select_sum('tbl_donation.amount_donated_cc');
        $this->db->group_by('tbl_donation.donation_type');
        $this->db->group_by('tbl_donors_preexam.blood_type');
        $this->db->from('tbl_donation');
        $query = $this->db->get();
        $result = $query->result();
        /*
         * do substraction from bloodStock
         */
        foreach ($result as $data) {
            $this->db->select_sum('tbl_transaction.amount_donated');
            $this->db->where('donation_type', $data->donation_type);
            $this->db->where('blood_type', $data->blood_type);
            $this->db->from('tbl_transaction');
            $query3 = $this->db->get();
            $result3 = $query3->result();
            $data->balance = $data->amount_donated_cc - $result3[0]->amount_donated;
        }

        return $result;
    }

    /*
     * function used to populate tbl_transact
     */

    function transactBlood($trans) {
        $this->db->trans_start();
        $query = $this->db->insert('tbl_transaction', $trans);
        if ($query) {
            $this->db->trans_complete();
            return TRUE;
        } else {
            $this->db->trans_complete();
            return FALSE;
        }
//        $this->db->trans_complete();
    }

    /*
     * function report Hospitals
     */

    function reportHos() {
        $this->db->select('trans_id,hos_name,donation_type,blood_type,amount_donated,transact_date');
        $this->db->from('tbl_transaction');
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

    function delRequest($rqid = NULL) {
//       $this->db->where('rqid');
//       $this->db->delete('tbl_requests');
        return $this->db->delete('tbl_requests', array('rqid' => $rqid));
    }

    /*
     * specific nextSafeDonation
     */

    function specificNextSafeDonation() {
        $this->db->select('nextSafeDonation as nextSafe');
        $this->db->from('tbl_donation');
        $this->db->where('userid', $this->session->userdata('userId'));
//        $this->db->join('tbl_donation_records', 'tbl_donation_records.did=tbl_donation.did', 'inner');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_users_with_blood_type($request) {
        $this->db->where('blood_type', $request['blood_type']);
        $query = $this->db->get('tbl_donors_preexam');
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /*
     * insert response
     */

    function responses($response) {
        $this->db->trans_start();
        $query = $this->db->insert('tbl_response', $response);
        if ($query) {
            $this->db->trans_complete();
            return TRUE;
        } else {
            $this->db->trans_complete();
            return FALSE;
        }
    }

    /*
     * fetch all responses
     */

    function all_responses() {
        $this->db->select('tbl_response.userid,tbl_response.textArea,tbl_response.responseDate, '
                . 'tbl_donors_preexam.blood_type');
        $this->db->from('tbl_response');
        $this->db->join('tbl_donors_preexam', 'tbl_response.userid=tbl_donors_preexam.userid', 'inner');
        $this->db->order_by('tbl_response.responseDate', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}
