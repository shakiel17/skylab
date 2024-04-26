<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."user_main");
            }
            $this->load->view('pages/'.$page);            
        }
        //===========================Admin Module=========================
        public function admin(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."user_main");
            }
            $this->load->view('pages/admin/'.$page);            
        }        
        public function admin_authentication(){
            $user=$this->Booking_model->admin_authentication();
            if($user){
                $user_data=array(
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."admin_main");
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."admin';</script>";
            }
        }
        public function admin_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['commuters'] = $this->Booking_model->getAllCommuters();
            $data['riders'] = $this->Booking_model->getAllRiders();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function admin_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('admin_login');
            redirect(base_url()."admin");
        }
        public function manage_rider(){
            $page = "manage_rider";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['title'] = 'Riders Manager';
            $data['riders'] = $this->Booking_model->getAllRiders();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function save_rider(){
            $save=$this->Booking_model->save_rider();
            if($save){
                $this->session->set_flashdata('success','Rider successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save rider!');
            }
            redirect(base_url()."manage_rider");
        }
        // public function fetch_single_rider(){
        //     $id=$this->input->post('id');
        //     $data=$this->Booking_model->fetch_single_rider($id);
        //     echo json_encode($data);
        // }
        public function delete_rider($id){
            $save=$this->Booking_model->delete_rider($id);
            if($save){
                $this->session->set_flashdata('success','Rider successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete rider!');
            }
            redirect(base_url()."manage_rider");
        }
        public function save_license(){
            $save=$this->Booking_model->save_license();
            if($save){
                $this->session->set_flashdata('success','Rider license successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save rider license!');
            }
            redirect(base_url()."manage_rider");
        }
        public function view_license_image($id){
            $page="license_image";
            $data['image'] = $this->Booking_model->getLicense($id);
            $this->load->view('pages/admin/'.$page,$data);
        }
        public function manage_commuter(){
            $page = "manage_commuter";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['title'] = 'Commuter Manager';
            $data['riders'] = $this->Booking_model->getAllCommuters();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        //===========================Admin Module==========================

        //===========================User Module===========================
        public function register_user(){
            $page = "register";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            $this->load->view('pages/'.$page);  
        }
        public function save_user(){
            $fullname=$this->input->post('fullname');            
            $username=$this->input->post('username');
            $register=$this->Booking_model->save_user();
            if($register){
                $user_data=array(
                    'username' => $username,
                    'fullname' => $fullname,
                    'user_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."user_main");
            }else{
                echo "<script>alert('Unable to save user!');window.location='".base_url()."';</script>";
            }
        }
        public function user_authentication(){
            $user=$this->Booking_model->user_authentication();
            if($user){
                $user_data=array(
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'user_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."user_main");
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."';</script>";
            }
        }
        public function user_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }
            $data['commuters'] = $this->Booking_model->getAllCommuters();
            $data['riders'] = $this->Booking_model->getAllRiders();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function user_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function user_profile(){
            $page = "profile";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'User Profile';
            $data['profile'] = $this->Booking_model->getUserProfile();
            $data['bookings'] = $this->Booking_model->getAllBookingsByUser($data['profile']['id']);
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_valid_id(){
            $save=$this->Booking_model->save_valid_id();
            if($save){
                $this->session->set_flashdata('success','Valid ID successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save valid ID!');
            }
            redirect(base_url()."user_profile");
        }
        public function save_user_account(){
            $save=$this->Booking_model->save_user_account();
            if($save){
                $this->session->set_flashdata('success','User Account successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save user account!');
            }
            redirect(base_url()."user_profile");
        }
        public function save_user_profile(){
            $save=$this->Booking_model->save_user_profile();
            if($save){
                $this->session->set_flashdata('success','User Profile successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save user profile!');
            }
            redirect(base_url()."user_profile");
        }
        public function user_booking(){
            $page = "bookings";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'My Bookings';
            $profile = $this->Booking_model->getUserProfile();
            $data['bookings'] = $this->Booking_model->getAllBookingsByUser($profile['id']);
            $data['commuter_id']=$profile['id'];
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function add_booking($id){
            $page = "add_booking";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'New Booking';
            $data['commuter_id'] = $id;
            $data['riders'] = $this->Booking_model->getAllActiveRiders();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_booking(){
            $save=$this->Booking_model->save_booking();
            if($save){
                $this->session->set_flashdata('success','Your booking was successfull!');
            }else{
                $this->session->set_flashdata('failed','Unable to save booking!');
            }
            redirect(base_url()."user_booking");
        }
        public function cancel_user_booking($id){
            $save=$this->Booking_model->cancel_booking($id);
            if($save){
                $this->session->set_flashdata('success','Your booking was successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Unable to cancel booking!');
            }
            redirect(base_url()."user_booking");
        }
        //===========================User Module===========================
        //===========================Rider Module==========================
        public function rider(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/rider/'.$page.".php")){
                show_404();
            }
            if($this->session->rider_login){
                redirect(base_url()."rider_main");
            }
            $this->load->view('pages/rider/'.$page);            
        }
        public function register_rider(){
            $page = "register";
            if(!file_exists(APPPATH.'views/pages/rider/'.$page.".php")){
                show_404();
            }            
            $this->load->view('pages/rider/'.$page);  
        }
        public function save_rider_account(){            
            $register=$this->Booking_model->save_rider_account();
            if($register){
                $user_data=array(
                    'username' => $register['username'],
                    'fullname' => $register['fullname'],
                    'rider_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."rider_main");
            }else{
                echo "<script>alert('Unable to save user!');window.location='".base_url()."rider';</script>";
            }
        }
        public function rider_authentication(){
            $user=$this->Booking_model->rider_authentication();
            if($user){
                $user_data=array(
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'rider_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."rider_main");
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."rider';</script>";
            }
        }
        public function rider_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/rider/'.$page.".php")){
                show_404();
            }
            if($this->session->rider_login){
                
            }else{
                redirect(base_url()."rider");
            }
            $data['commuters'] = $this->Booking_model->getAllCommuters();
            $data['riders'] = $this->Booking_model->getAllRiders();
            $this->load->view('templates/header');
            $this->load->view('templates/rider/navbar');
            $this->load->view('templates/rider/sidebar');
            $this->load->view('pages/rider/'.$page,$data);
            $this->load->view('templates/rider/modal');
            $this->load->view('templates/rider/footer');
        }
        public function rider_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('rider_login');
            redirect(base_url()."rider");
        }
        //===========================Rider Module==========================
    }
?>