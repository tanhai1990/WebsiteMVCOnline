<?php
    require_once "../lib/session.php";
    Session::checkLogin();
    require_once "../lib/database.php";
    require_once "../helpers/format.php";
?>

<?php 
class adminLogin
{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function admin_login($adminUser, $adminPass){
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);


        if(empty($adminUser) || empty($adminPass)){
            $alert = "User and Pass must be not empty";
            return $alert;
        }else{
            $sql = "
                SELECT * FROM admin 
                WHERE AdminUser = '$adminUser' 
                AND AdminPass = '$adminPass'
                LIMIT 1
            ";
            $result = $this->db->select($sql);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('adminLogin', true);
                Session::set('IDAdmin', $value['IDAdmin']);
                Session::set('AdminName', $value['AdminName']);
                Session::set('AdminUser', $value['AdminUser']);
                header('Location: index.php');
            }else{
                $alert = "User and pass not match";
                return $alert;
            }

        }
    }
}


?>