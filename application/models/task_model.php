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
     * function used to populate tbl_transact
     */

    function transactBlood($trans) {
        $this->db->trans_start();
        $this->db->insert('tbl_transact', $trans);
        $this->db->trans_complete();
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

    function getRequests($requests) {
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
        $this->db->insert('tbl_notifications',$notification);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
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
     * get blood requests
     */

    function bloodRequests() {
        $q = $this->db->get('tbl_requests');
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
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
     * function used to get Registered hospitals
     */

    function getHos() {
//        $this->load->helper('url');
        $res = $this->db->get('tbl_hospitals')->result();
        $data_array = array();
        $i = 0;
        foreach ($res as $r) {
            $data_array[$i]['hos_id'] = $r->hos_id;
            $data_array[$i]['hos_name'] = $r->hos_name;
            $data_array[$i]['hos_location'] = $r->hos_location;
            $i++;
        }
        echo json_encode($data_array);
    }

    /*
     * Sum blood donation totals
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
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();
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
        $this->db->select('tbl_donation.did,tbl_donation.donation_type,tbl_donation.nextSafeDonation, tbl_donation_records.donation_date');
        $this->db->from('tbl_donation');
        $this->db->join('tbl_donation_records', 'tbl_donation_records.did=tbl_donation.did', 'inner');
        $query = $this->db->get();
        $result = $query->result();
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

}
