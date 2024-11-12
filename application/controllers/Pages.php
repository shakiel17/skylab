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
            $data['pending'] = $this->Booking_model->getAllBookingsByType("pending");
            $data['confirmed'] = $this->Booking_model->getAllBookingsByType("confirmed");
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

        public function manage_booking(){
            $page = "manage_booking";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['title'] = 'Booking Manager';
            $data['bookings'] = $this->Booking_model->getAllBookings();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function view_reviews($username){
            $page = "reviews";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['title'] = 'Comments/Reviews';
            $data['reviews'] = $this->Booking_model->getAllUserReviews($username);
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }

        public function view_commuter_profile($username){
            $page = "profile";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
           if($this->session->admin_login){
                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'User Profile';
            $data['profile'] = $this->Booking_model->getUserProfileByUser($username);
            $data['bookings'] = $this->Booking_model->getAllBookingsByUser($data['profile']['id']);
            $data['reviews'] = $this->Booking_model->getAllUserReviews($username);
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
            $profile=$this->Booking_model->getUserProfile();
            $data['commuters'] = $this->Booking_model->getAllCommuters();
            $data['pending'] = $this->Booking_model->getAllBookingsByUserType($profile['id'],"pending");
            $data['confirmed'] = $this->Booking_model->getAllBookingsByUserType($profile['id'],"confirmed");
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
                
            }else if($this->session->admin_login){
                
            }else if($this->session->rider_login){
                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'User Profile';
           
            $data['reviews'] = $this->Booking_model->getAllUserReviews($this->session->username);
	if($this->session->user_login || $this->session->admin_login){	
        $data['profile'] = $this->Booking_model->getUserProfile();
        $data['bookings'] = $this->Booking_model->getAllBookingsByUser($data['profile']['id']);
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
	}else{
            $data['profile'] = $this->Booking_model->getRiderProfile();
            $data['bookings'] = $this->Booking_model->getAllBookingsByRider($data['profile']['id']);
	    $this->load->view('templates/header');
            $this->load->view('templates/rider/navbar');
            $this->load->view('templates/rider/sidebar');
            $this->load->view('pages/rider/'.$page,$data);
            $this->load->view('templates/rider/modal');
            $this->load->view('templates/rider/footer');
	}
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
	public function update_rider_account(){
            $save=$this->Booking_model->update_rider_account();
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
	public function save_rider_profile(){
            $save=$this->Booking_model->save_rider_profile();
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
        public function cancel_user_booking(){
            $id=$this->input->post('id');            
            $com=$this->Booking_model->getSingleBooking($id);
            $commuter=$com['fullname'];
            $rider=$com['rider'];
            $email=$com['email'];
            $rider_email=$com['remail'];
            $from=$com['loc_origin'];
            $to=$com['loc_destination'];
            $message="Hello, $commuter! You have successfully cancelled your booking.";
            $subject="Booking Cancelled!";
            $message_rider="Hello, $rider! Mr/Ms. $commuter cancelled his/her booking for a certain reasons. Sorry for the inconvenience.";

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('Online Skylab Booking');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('Online Skylab Booking');
                $this->email->to($rider_email);
                $this->email->subject($subject);
                $this->email->message($message_rider);
                $this->email->send();
                $confirm=$this->Booking_model->update_booking($id,"cancel");            
            }            
            if($confirm){
                $this->session->set_flashdata('success','Your booking was successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Unable to cancel booking!');
            }
            redirect(base_url()."user_booking");
        }

        public function user_reviews(){
            $page = "reviews";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'Comments/Reviews';                        
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_reviews(){            
            $save=$this->Booking_model->save_reviews();
            if($save){
                $this->session->set_flashdata('success','Your reviews was successfully posted!');
            }else{
                $this->session->set_flashdata('failed','Unable to post reviews!');
            }
            redirect(base_url()."user_reviews");
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
            $profile=$this->Booking_model->getRiderProfile();
            $data['commuters'] = $this->Booking_model->getAllCommuters();
            $data['riders'] = $this->Booking_model->getAllRiders();
            $data['pending'] = $this->Booking_model->getAllRiderBookingsType($profile['id'],"pending");
            $data['confirmed'] = $this->Booking_model->getAllRiderBookingsType($profile['id'],"confirmed");
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
        public function rider_booking(){
            $page = "bookings";
            if(!file_exists(APPPATH.'views/pages/rider/'.$page.".php")){
                show_404();
            }
            if($this->session->rider_login){
                
            }else{
                redirect(base_url()."rider");
            }
            $data['title'] = 'My Bookings';
            $profile = $this->Booking_model->getRiderProfile();
            $data['bookings'] = $this->Booking_model->getAllRiderBookings($profile['id']); 
            $this->load->view('templates/header');
            $this->load->view('templates/rider/navbar');
            $this->load->view('templates/rider/sidebar');
            $this->load->view('pages/rider/'.$page,$data);
            $this->load->view('templates/rider/modal');
            $this->load->view('templates/rider/footer');
        }
        public function confirm_rider_booking(){
            $id=$this->input->post('id');
            $com=$this->Booking_model->getSingleBooking($id);
            $commuter=$com['fullname'];
            $rider=$com['rider'];
            $rider_email=$com['remail'];
            $email=$com['email'];
            $from=$com['loc_origin'];
            $to=$com['loc_destination'];
            $message="Hello, $commuter! Your booking is confirmed by $rider with the details:            
            Origin: $from
            Destination: $to";
            $subject="Booking Confirmed!";

            $message_rider="Hello $rider! You have confirmed the booking of Mr/Ms. $commuter with the details:
            Origin: $from
            Destination: $to";

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('Online Skylab Booking');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('Online Skylab Booking');
                $this->email->to($rider_email);
                $this->email->subject($subject);
                $this->email->message($message_rider);
                $this->email->send();
                $confirm=$this->Booking_model->update_booking($id,"confirmed"); 
            }           
            if($confirm){
                $this->session->set_flashdata('success','Booking successfully confirmed!');
            }else{
                $this->session->set_flashdata('failed','Unable to update booking status!');
            }            
            redirect(base_url()."rider_booking");
        }
        public function cancel_rider_booking(){
            $id=$this->input->post('id');
            $com=$this->Booking_model->getSingleBooking($id);
            $commuter=$com['fullname'];
            $rider=$com['rider'];
            $email=$com['email'];
            $rider_email=$com['remail'];
            $from=$com['loc_origin'];
            $to=$com['loc_destination'];
            $message="Hello, $commuter! I regret to inform you that your booking was cancelled by $rider for some reasons! Sorry for the inconvenience.";
            $subject="Booking Cancelled!";
            $message_rider="Hello, $rider! You have successfully cancelled the booking of Mr/Ms. $commuter.";

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('Online Skylab Booking');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('Online Skylab Booking');
                $this->email->to($rider_email);
                $this->email->subject($subject);
                $this->email->message($message_rider);
                $this->email->send();
                $confirm=$this->Booking_model->update_booking($id,"cancel");            
            }
            if($confirm){
                $this->session->set_flashdata('success','Booking successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Unable to cancel booking!');
            }            
            redirect(base_url()."rider_booking");
        }
        public function complete_booking(){
            $id=$this->input->post('id');
            $com=$this->Booking_model->getSingleBooking($id);
            $commuter=$com['fullname'];
            $rider=$com['rider'];
            $email=$com['email'];
            $rider_email=$com['remail'];
            $from=$com['loc_origin'];
            $to=$com['loc_destination'];
            $message="Hello, $commuter! Thank  you for the support and hoping to serve you more in the future.";            
            $subject="Booking Completed!";
            $message_rider="Hello, $rider! Thank  you for fetching and transporting Mr/Ms. $commuter.";

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('Online Skylab Booking');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('Online Skylab Booking');
                $this->email->to($rider_email);
                $this->email->subject($subject);
                $this->email->message($message_rider);
                $this->email->send();
                $confirm=$this->Booking_model->update_booking($id,"completed");            
            }
            if($confirm){
                $this->session->set_flashdata('success','Booking successfully completed!');
            }else{
                $this->session->set_flashdata('failed','Unable to update booking status!');
            }            
            redirect(base_url()."rider_booking");
        }
        public function change_rider_status($id,$status){            
            $save=$this->Booking_model->change_rider_status($id,$status);
            if($save){
                $this->session->set_flashdata('success','Rider status successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update rider status!');
            }
            redirect(base_url()."user_profile");
        }
        public function save_rider_license(){
            $save=$this->Booking_model->save_license();
            if($save){
                $this->session->set_flashdata('success','Rider license successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save rider license!');
            }
            redirect(base_url()."user_profile");
        }
        public function save_plateno(){
            $save=$this->Booking_model->save_plateno();
            if($save){
                $this->session->set_flashdata('success','Rider plate number successfully uploaded!');
            }else{
                $this->session->set_flashdata('failed','Unable to upload plate number!');
            }
            redirect(base_url()."user_profile");
        }
        //===========================Rider Module==========================
    }
?>
