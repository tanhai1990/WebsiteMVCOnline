<?php
    require_once "../lib/database.php";
    require_once "../helpers/format.php";

?>

<?php 
class brand
{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function InsertBrand($brandName){
        $brandName = $this->fm->validation($brandName);
       

        if(empty($brandName)){
            $alert = "<span class='error'>Brand must be not empty</span>";
            return $alert;
        }else{
            $sql = "
                INSERT INTO brand(brandName)
                VALUES('$brandName')
            ";
            $result = $this->db->insert($sql);

            if($result){
                $alert = "<span class='success'>Insert brand successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Insert brand not successfully</span>";
                return $alert;
            }

        }
    }

    //Show category
    public function ShowBrand(){
        $sql = "
                SELECT * FROM brand
                ORDER BY IDBrand DESC
        ";
        $result = $this->db->select($sql);
        return $result;
    }

    //End Show category

    //Edit category
    public function GetBrandByID($IDBrand){
        $sql = "
                SELECT * FROM brand 
                WHERE IDBrand = '$IDBrand'
        ";
        $result = $this->db->select($sql);
        return $result;
    }

    public function UpdateBrand($IDBrand, $brandName){
        $brandName = $this->fm->validation($brandName);

        if(empty($brandName)){
            $alert = "<span class='error'>Brand must be not empty</span>";
            return $alert;
        }else{
            $sql = "
                UPDATE brand
                SET brandName = '$brandName'
                WHERE IDBrand = '$IDBrand'
            ";
            $result = $this->db->update($sql);

            if($result){
                $alert = "<span class='success'>Update brand successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Update brand not success</span>";
                return $alert;
            }

        }
    }

    //End Edit category


    //Delete category
    public function DeleteBrand($IDDel){
        $sql = "
            DELETE FROM brand 
            WHERE IDBrand = '$IDDel'
        ";
        $result = $this->db->delete($sql);
        if($result){
            $alert = "<span class='success'>Brand deleted successfully</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Brand deleted not success</span>";
            return $alert;
        }
    }

    //End Delete category


}


?>