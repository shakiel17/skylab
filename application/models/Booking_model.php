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
        public function fetch_single_rider($id){
            $result=$this->db->query("SELECT * FROM rider WHERE id='$id'");
            return $result->result_array();
        }
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
    }

?>