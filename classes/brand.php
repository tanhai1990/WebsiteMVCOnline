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

    public function InsertCategory($catName){
        $catName = $this->fm->validation($catName);
       

        if(empty($catName)){
            $alert = "<span class='error'>Category must be not empty</span>";
            return $alert;
        }else{
            $sql = "
                INSERT INTO category(catName)
                VALUES('$catName')
            ";
            $result = $this->db->insert($sql);

            if($result){
                $alert = "<span class='success'>Insert category successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Insert category not successfully</span>";
                return $alert;
            }

        }
    }

    //Show category
    public function ShowCategory(){
        $sql = "
                SELECT * FROM category 
                ORDER BY IDCat DESC
        ";
        $result = $this->db->select($sql);
        return $result;
    }

    //End Show category

    //Edit category
    public function GetCatByID($IDCat){
        $sql = "
                SELECT * FROM category 
                WHERE IDCat = '$IDCat'
        ";
        $result = $this->db->select($sql);
        return $result;
    }

    public function UpdateCategory($IDCat, $catName){
        $catName = $this->fm->validation($catName);

        if(empty($catName)){
            $alert = "<span class='error'>Category must be not empty</span>";
            return $alert;
        }else{
            $sql = "
                UPDATE category
                SET catName = '$catName'
                WHERE IDCat = '$IDCat'
            ";
            $result = $this->db->update($sql);

            if($result){
                $alert = "<span class='success'>Update category successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Update category not success</span>";
                return $alert;
            }

        }
    }

    //End Edit category


    //Delete category
    public function DeleteCategory($IDDel){
        $sql = "
            DELETE FROM category 
            WHERE IDCat = '$IDDel'
        ";
        $result = $this->db->delete($sql);
        if($result){
            $alert = "<span class='success'>Category deleted successfully</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Category deleted not success</span>";
            return $alert;
        }
    }

    //End Delete category


}


?>