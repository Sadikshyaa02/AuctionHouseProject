<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auction extends CI_Model{
    public function __construct(){
        parent:: __construct();

        $this->load->library('session');

        $this->user = $this->session->userdata('userStatus');

        $this->client = $this->session->userdata('userId');

        $this->db=$this->load->database('default',true);
    }

    public function clientRegistration($clientData){
        try {
            $this->db->select('email');
            $this->db->where('email', $_POST['email']);
            $emailCheck = $this->db->get('client')->result();

            if(!empty($emailCheck)){
                return 'exists';
            }

            $insertClient = $this->db->insert('client', $clientData);
            
            if($insertClient){
                return 'success';
            }

            return 'error';

        } catch (Exception $th) {
            throw $th;
        }
    }

    public function userLogin($credentials){
        try {
            $this->db->select('email, password, status, client_id');
            $this->db->where('email', $_POST['email']);
            return $this->db->get('client')->row();

        } catch (Exception $th) {
            throw $th;
        }
    }

    public function auctions(){
        try {
            $auctionId = '';
            if(isset($_GET['auctionid'])){
                $auctionId = $_GET['auctionid'];
            }

            $this->db->select();
            $this->db->from('auction');

            if($this->user != 'admin'){
                $this->db->where('auction_status', 'Y');
            }

            if($auctionId != ''){
                $this->db->where('auction_id', $auctionId);
            }

            return $this->db->get()->result();
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function insertAuction($auctionData){
        try {
            

            $imageName = $_FILES["image"]["name"];
            $imageTempName = $_FILES["image"]["tmp_name"];
            $imageFolder = $_SERVER['DOCUMENT_ROOT'] . "/se/frontend/assets/auction/" . $imageName;


            $insertAuction['auction_name'] = $auctionData['name'];
            $insertAuction['auction_start'] = $auctionData['start'];
            $insertAuction['auction_end'] = $auctionData['end'];

            if($imageName != ''){
                $insertAuction['auction_image'] = $imageName;
            }
            
            if(isset($auctionData['status'])){
                $insertAuction['auction_status'] = 'N';
            }
            else{
                $insertAuction['auction_status'] = 'Y';
            }
            
            $this->db->trans_begin();

            if(isset($auctionData['auction_id']) && $auctionData['auction_id'] > 0){
                $this->db->where('auction_id', $auctionData['auction_id']);
                $update = $this->db->update('auction', $insertAuction);
            }
            else{
                $insert = $this->db->insert('auction', $insertAuction);
            }
            
            if($imageName != ''){
                if(move_uploaded_file($imageTempName, $imageFolder)){
                    return $this->db->trans_commit();
                }
                else{
                    $this->db->trans_rollback();
                    return false;
                }
            }
            else{
                return $this->db->trans_commit();
            }

            // $this->db->trans_begin();
            // if ($this->db->trans_status() === FALSE) {
            //     $this->db->trans_rollback();
            //     return false;
            // } else {
            //     return $this->db->trans_commit();
            // }
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function deleteAuction($auctionId){
        try {
            $this->db->delete('bid', array('auctionid' => $auctionId));
            $this->db->delete('auctionlot', array('auctionid' => $auctionId));
            return $this->db->delete('auction', array('auction_id' => $auctionId));
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function items($case = false){
        try {
            $itemId = '';
            if(isset($_GET['itemid'])){
                $itemId = $_GET['itemid'];
            }

            $auctionId = '';
            if(isset($_GET['auction'])){
                $auctionId = $_GET['auction'];
            }

            $category = '';
            if(isset($_GET['category'])){
                $category = $_GET['category'];
            }

            $artist = '';
            if(isset($_GET['artist'])){
                $artist = $_GET['artist'];
            }

            $date = '';
            if(isset($_GET['date'])){
                $date = $_GET['date'];
            }

            $price = '';
            if(isset($_GET['price'])){
                $date = $_GET['price'];
            }
            
            $this->db->select();
            $this->db->from('auctionlot a');
            $this->db->join('auction', 'auctionid = auction_id');
            
            if($this->user != 'admin' && $case != 'sales' && $itemId == ''){
                $this->db->where(array('status' => 'Y', 'approved' => 'Y'));
            }

            if($auctionId != ''){
                $this->db->where('auctionid', $auctionId);
            }

            if($itemId != ''){
                $this->db->where('auctionlotid', $itemId);
            }

            if($case == 'toBeApproved'){
                $this->db->where(array('approved ' => 'N'));
            }

            if($category != ''){
                $this->db->where('category', $category);
            }

            if($artist != ''){
                $this->db->where('artist', str_replace('_', ' ', $artist));
            }

            if($date != ''){
                $this->db->where('auction_start <= ', $date);
                $this->db->where('auction_end >= ', $date);
            }

            if($price != ''){
                $this->db->where('price <', $price);
            }

            if($case == 'sales' || $case == 'bids'){
                if(isset($_GET['clientid'])){
                    $clientid = $_GET['clientid'];
                }
                else{
                    return array();
                }

                if($case == 'bids'){
                    $this->db->join('bid b', 'b.auctionlotid = a.auctionlotid');
                    $this->db->where('bidderid', $clientid);
                }
                else if($case == 'sales'){
                    $this->db->where('clientid', $clientid);
                }
                
            }

            return $this->db->get()->result();
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function insertItem($itemData){ 
        try {
            

            $imageName = $_FILES["image"]["name"];
            $imageTempName = $_FILES["image"]["tmp_name"];
            $imageFolder = $_SERVER['DOCUMENT_ROOT'] . "/se/frontend/assets/auctionlot/" . $imageName;
            
            if($imageName != ''){
                $itemData['itemimage'] = $imageName;
            }

            if(isset($itemData['status'])){
                $itemData['status'] = 'N';
            }
            else{
                $itemData['status'] = 'Y';
            }
            
            $this->db->trans_begin();

            $auction = $this->db->query("SELECT auction_start, auction_end FROM auction WHERE auction_id =" . $itemData['auctionid'])->row();

            $itemData['clientid'] = $this->client;
            
            if(isset($itemData['auctionlotid']) && $itemData['auctionlotid'] > 0){
                $this->db->where('auctionlotid', $itemData['auctionlotid']);
                $update = $this->db->update('auctionlot', $itemData);
            }
            else{
                $insert = $this->db->insert('auctionlot', $itemData);
            }
            
            if($imageName != ''){
                if(move_uploaded_file($imageTempName, $imageFolder)){
                    return $this->db->trans_commit();
                }
                else{
                    $this->db->trans_rollback();
                    return false;
                }
            }
            else{
                return $this->db->trans_commit();
            }

            // $this->db->trans_begin();
            // if ($this->db->trans_status() === FALSE) {
            //     $this->db->trans_rollback();
            //     return false;
            // } else {
            //     return $this->db->trans_commit();
            // }
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function deleteItem($itemId){
        try {
            $this->db->delete('bid', array('auctionlotid' => $itemId));
            return $this->db->delete('auctionlot', array('auctionlotid' => $itemId));
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function approveItem($itemId){
        try {
            $this->db->set('approved', 'Y');
            $this->db->where(array('auctionlotid' => $itemId));
            return $this->db->update('auctionlot');
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function artists($category){
        $this->db->select('artist');
        $this->db->from('auctionlot');

        if($category != 'none'){
            $this->db->where('category', $category);
        }

        return $this->db->get()->result();

    }

    public function userDetails(){
        $clientId = '';
        if(isset($_GET['clientid'])){
            $clientId = $_GET['clientid'];
        }

        $status = '';
        if(isset($_GET['status'])){
            $status = $_GET['status'];
        }

        $this->db->select();
        $this->db->from('client');
        
        if($this->session->userdata('userStatus') != 'admin'){
            $this->db->where('status !=', 'admin');
        }

        if($clientId != ''){
            $this->db->where('client_id', $clientId);
        }

        if($status != ''){
            $this->db->where('status', $status);
        }

        return $this->db->get()->result();

    }

    public function makeABid($details){
        $this->db->select('bidderid');
        $this->db->from('bid');
        $this->db->where(array('bidderid' => $details['bidderid'], 'auctionlotid' => $details['auctionlotid']));

        $bidCheck = $this->db->get()->result();

        if(!empty($bidCheck)){
            return 'bidExists';
        }

        $insertBid = $this->db->insert('bid', $details);

       if($insertBid){
            return 'success';
       }
       else{
        return 'failure';
       }

    }

    public function bids($itemId){
        $this->db->select();
        $this->db->from('bid b');
        $this->db->join('auctionlot a', 'a.auctionlotid = b.auctionlotid');
        $this->db->join('auction', 'auction_id = b.auctionid');
        $this->db->join('client', 'client_id = bidderid');
        $this->db->where(array('b.auctionlotid' => $itemId));

        return $this->db->get()->result();
    }

}
?>