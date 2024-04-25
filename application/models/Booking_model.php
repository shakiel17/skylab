 <?php   
    date_default_timezone_set('Asia/Manila');
    class Booking_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function admin_authentication(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM `admin` WHERE username='$username' AND password='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllRiders(){
            $result=$this->db->query("SELECT * FROM rider ORDER BY plateno ASC");
            return $result->result_array();
        }
        public function save_rider(){
            $id=$this->input->post('id');
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $plateno=$this->input->post('plateno');
            $status=$this->input->post('status');
            $check=$this->db->query("SELECT * FROM rider WHERE fullname='$fullname' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO rider(fullname,`address`,contactno,plateno,`status`) VALUES('$fullname','$address','$contactno','$plateno','$status')");
                }else{
                    $result=$this->db->query("UPDATE rider SET fullname='$fullname',`address`='$address',plateno='$plateno',`status`='$status',contactno='$contactno' WHERE id='$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        // public function fetch_single_rider($id){
        //     $result=$this->db->query("SELECT * FROM rider WHERE id='$id'");
        //     return $result->result_array();
        // }
        public function delete_rider($id){
            $result=$this->db->query("DELETE FROM rider WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }            
        }
        public function save_license(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE rider SET `license`='$imgContent' WHERE id='$id'");            
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getLicense($id){
            $result=$this->db->query("SELECT * FROM rider WHERE id='$id'");
            return $result->row_array();
        }

        public function getAllCommuters(){
            $result=$this->db->query("SELECT * FROM commuter");
            return $result->result_array();
        }
        public function save_user(){
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->db->query("SELECT * FROM commuter WHERE username='$username'");
            if($check->num_rows() > 0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO commuter(fullname,`address`,contactno,username,`password`) VALUES('$fullname','$address','$contactno','$username','$password')");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function user_authentication(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM commuter WHERE username='$username' AND password='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getUserProfile(){
            $username=$this->session->username;
            $result=$this->db->query("SELECT * FROM commuter WHERE username='$username'");
            return $result->row_array();
        }
        public function getAllBookingsByUser($id){            
            $result=$this->db->query("SELECT b.*,r.fullname FROM bookings b LEFT JOIN rider r ON r.id=b.rider_id WHERE b.commuter_id='$id'");
            return $result->result_array();
        }
        public function save_valid_id(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE commuter SET valid_id='$imgContent' WHERE id='$id'");            
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_user_account(){
            $id=$this->input->post('id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->db->query("SELECT * FROM commuter WHERE username='$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("UPDATE commuter SET username='$username',`password`='$password' WHERE id = '$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_user_profile(){
            $id=$this->input->post('id');
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $result=$this->db->query("UPDATE commuter SET fullname='$fullname',`address`='$address',contactno='$contactno' WHERE id = '$id'");            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllActiveRiders(){
            $result=$this->db->query("SELECT * FROM rider WHERE `status`='Active' ORDER BY plateno ASC");
            return $result->result_array();
        }
        public function save_booking(){
            $commuter_id=$this->input->post('commuter_id');
            $rider_id=$this->input->post('rider_id');
            $origin=$this->input->post('origin');
            $destination=$this->input->post('destination');
            $book_date=$this->input->post('book_date');
            $book_time=$this->input->post('book_time');
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $check=$this->db->query("SELECT * FROM bookings WHERE rider_id='$rider_id' AND `status`='confirmed' AND book_date='$book_date' AND book_time='$book_time'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO bookings(commuter_id,rider_id,loc_origin,loc_destination,book_date,book_time,datearray,timearray) VALUES('$commuter_id','$rider_id','$origin','$destination','$book_date','$book_time','$datearray','$timearray')");
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function cancel_booking($id){
            $result=$this->db->query("UPDATE bookings SET `status` = 'cancel' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

?>