<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction extends MX_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->Model('model_auction', 'model');

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');

        $this->load->helper('url');

        $this->user = $this->session->userdata('userStatus');

        $this->client = $this->session->userdata('userId');

    }

    public function index(){
        $data['auctions'] = $this->model->auctions();
        $data['items'] = $this->model->items();
        $this->load->view('header', array('title' => 'home')) ;
        $this->load->view('home', $data);
    }

    public function login(){
        if($this->session->has_userdata('userStatus')){
            echo "<script>location.href='" . base_url() . "';</script>";
        }
        $this->load->view('login');
    }

    public function logout(){
        $this->session->unset_userdata('userStatus');
        $this->session->unset_userdata('userId');

        echo "<script>location.href='" . base_url() . "auction';</script>";
    }

    public function register(){
        if($this->session->has_userdata('userStatus')){
            echo "<script>location.href='" . base_url() . "';</script>";
        }
        $this->load->view('register');
    }

    public function auctions(){
        $data['auctions'] = $this->model->auctions();
        $this->load->view('header', array('title' => 'auctions')) ;
        $this->load->view('auction', $data);
    }

    public function addAuction(){
        if(!($this->user == 'admin')){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }
        $data = array();
        if(isset($_GET['auctionid'])){
            $data['auctions'] = $this->model->auctions();
        }
        $this->load->view('header', array('title' => 'auctions')) ;
        $this->load->view('insertAuction', $data);
    }

    public function items(){
        $data['items'] = $this->model->items();
        $this->load->view('header', array('title' => 'items')) ;
        $this->load->view('items', $data);
    }

    public function toBeApproved(){
        if(!($this->user == 'admin')){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }
        $data['items'] = $this->model->items('toBeApproved');
        $data['approval'] = 'toBeApproved';
        $this->load->view('header', array('title' => 'approval')) ;
        $this->load->view('items', $data);
    }

    public function userDetails(){
        if(!($this->user == 'admin' || $this->client == $_GET['clientid'])){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }
        $data['users'] = $this->model->userDetails();
        $this->load->view('header', array('title' => 'clients')) ;
        $this->load->view('userDetails', $data);
    }

    public function users(){
        if(!($this->user == 'admin')){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }
        $data['users'] = $this->model->userDetails();
        $this->load->view('header', array('title' => 'users')) ;
        $this->load->view('users', $data);
    }

    public function addItem(){
        if(!($this->user == 'seller' || $this->user == 'joint' || $this->user == 'admin')){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }
        $data = array();
        $data['auctions'] = $this->model->auctions();
        if(isset($_GET['itemid'])){
            $data['items'] = $this->model->items();
        }
        $data['category'] = isset($_GET['category']) ? $_GET['category'] : '';
        $this->load->view('header', array('title' => 'items')) ;
        $this->load->view('insertItem', $data);
    }

    public function clientRegistration(){
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $clientData = $_POST;

        $insertClient = $this->model->clientRegistration($clientData);

        if($insertClient == 'success'){
            echo "<script>location.href='" . base_url() . "auction';</script>";
        }
        else if($insertClient == 'exists'){
            echo "Email already exists";
        }
        else{
            echo "Client insert unsuccessful";
        }

    }

    public function userLogin(){
        $credentials = $_POST;

        $user = $this->model->userLogin($credentials);

        if($_POST['email'] == 'admin123@gmail.com' && $_POST['password'] == 'admin123'){
            $this->session->set_userdata('userStatus', 'admin');
            $this->session->set_userdata('userId', '10');
            echo "<script>location.href='" . base_url() . "';</script>";
        }
        else if(password_verify($_POST['password'], $user->password)){
            $this->session->set_userdata('userStatus', $user->status);
            $this->session->set_userdata('userId', $user->client_id);
            echo "<script>location.href='" . base_url() . "';</script>";
        }
        else{
            echo "<script>alert('Email or password did not match');location.href='" . base_url() . "login';</script>";
        }
    }

    public function insertAuction(){
        $auctionData = $_POST;

        $insertAuction = $this->model->insertAuction($auctionData);

        if($insertAuction){
            echo "<script>alert('Auction saved');location.href='" . base_url() . "auctions';</script>";
        }
        else{
            echo "<script>alert('Auction not added');location.href='" . base_url() . "auctions';</script>";
        }

    }

    public function deleteAuction(){
        if(!($this->user == 'admin')){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }

        $auctionId = $_GET['auctionid'];

        $deleteAuction = $this->model->deleteAuction($auctionId);

        if($deleteAuction){
            echo "<script>location.href='" . base_url() . "auctions';</script>";
        }
        else{
            echo "<script>alert('Auction not deleted');location.href='" . base_url() . "auctions';</script>";
        }

    }

    public function insertItem(){
        $itemData = $_POST;

        $insertItem = $this->model->insertItem($itemData);

        if($insertItem){
            echo "<script>alert('Item saved');location.href='" . base_url() . "items';</script>";
        }
        else{
            echo "<script>alert('Item not saved');location.href='" . base_url() . "items';</script>";
        }

    }

    public function deleteItem(){
        $itemId = $_GET['itemid'];

        $deleteItem = $this->model->deleteItem($itemId);

        if($deleteItem){
            echo "<script>location.href='" . base_url() . "items';</script>";
        }
        else{
            echo "<script>alert('Auction not deleted');location.href='" . base_url() . "items';</script>";
        }

    }

    public function approveItem(){
        if(!($this->user == 'admin')){
            echo "<script>location.href='" . base_url() . "';</script>";
            return;
        }

        $itemId = $_GET['itemid'];

        $approveItem = $this->model->approveItem($itemId);

        if($approveItem){
            echo "<script>alert('Item accepted');location.href='" . base_url() . "toBeApproved';</script>";
        }
        else{
            echo "<script>alert('Item not accepted');location.href='" . base_url() . "toBeApproved';</script>";
        }

    }

    public function itemDetails(){
        $itemDetails = $this->model->items();

        echo json_encode(array(
            'details' => $itemDetails
        ));
    }

    public function artists(){

        $category = '';

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $category = $this->input->get('category');
        }
        
        $artists = $this->model->artists($category);

        echo json_encode(array(
            'artists' => $artists
        ));

    }

    public function makeABid(){
        $details = array();

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $details = $this->input->post();
        }

        $bidInsert = $this->model->makeABid($details);

        echo json_encode(array(
            'status' => $bidInsert
        ));

    }

    public function userSales(){
        $data['items'] = $this->model->items('sales');
        $data['sales'] = 'sales';

        if($this->session->userdata('userStatus') == 'seller' || $this->session->userdata('userStatus') == 'joint'){
            $this->load->view('header', array('title' => 'sales'));
        }

        $this->load->view('items', $data);
    }

    public function userBids(){
        $data['items'] = $this->model->items('bids');
        $data['bids'] = 'bids';

        if($this->session->userdata('userStatus') == 'buyer' || $this->session->userdata('userStatus') == 'joint'){
            $this->load->view('header', array('title' => 'bids'));
        }

        $this->load->view('items', $data);
    }

    public function bids(){
        $itemId = '';

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $itemId = $this->input->get('itemid');
        }

        $bids = $this->model->bids($itemId);

        echo json_encode(array(
            'bids' => $bids
        ));

    }

}
?>