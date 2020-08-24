<?php
    require_once "../lib/database.php";
    require_once "../helpers/format.php";

?>

<?php 
class Product
{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function InsertProduct($data, $files){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catName = mysqli_real_escape_string($this->db->link, $data['category']);
        $brandName = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
        $productType = mysqli_real_escape_string($this->db->link, $data['productType']);

        // Kiem tra hinh anh va lay hinh anh cho vao folder upload
        $permited = array('jpg','jpeg','png','gif');
        $fileName = $_FILES['image']['name'];
        $fileName = $_FILES['image']['size'];
        $fileName = $_FILES['image']['tmp_name'];

        $div = explode('.', $fileName);
        $fileExt = strtolower(end($div));
        $uniqueImage = substr(md5(time()), 0, 10).'.'.$fileExt;
        $uploadedImage = "uploads/".$uniqueImage;


        if($productName=="" || $brandName =="" || $catName == "" || $productDesc == "" || $productPrice == "" || $productType == "" || $fileName == ""){
            $alert = "<span class='error'>fields must be not empty</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp, $uploadedImage);
            $sql = "
                INSERT INTO product(productName, IDCat, IDBrand, productDesc, productType, productPrice, image)
                VALUES('$productName','$catName', '$brandName', '$productDesc', '$productType', '$productPrice', '$uniqueImage')
            ";
            $result = $this->db->insert($sql);

            if($result){
                $alert = "<span class='success'>Insert productsuccessfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Insert product not successfully</span>";
                return $alert;
            }

        }
    }

    //Show category
    public function ShowProduct(){
        $sql = "
                SELECT product.*, brand.brandName, category.catName FROM product
                INNER JOIN category ON product.IDCat = category.IDCat
                INNER JOIN brand ON product.IDBrand = brand.IDBrand
                ORDER BY IDProduct DESC
        ";
        $result = $this->db->select($sql);
        return $result;
    }

    // //End Show category

    // //Edit category
    public function GetProductByID($IDProduct){
        $sql = "
                SELECT * FROM product 
                WHERE IDProduct = '$IDProduct'
        ";
        $result = $this->db->select($sql);
        return $result;
    }

    public function UpdateProduct($IDCat, $catName){
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

    // //End Edit category


    // //Delete category
    // public function DeleteCategory($IDDel){
    //     $sql = "
    //         DELETE FROM category 
    //         WHERE IDCat = '$IDDel'
    //     ";
    //     $result = $this->db->delete($sql);
    //     if($result){
    //         $alert = "<span class='success'>Category deleted successfully</span>";
    //         return $alert;
    //     }else{
    //         $alert = "<span class='error'>Category deleted not success</span>";
    //         return $alert;
    //     }
    // }

    // //End Delete category


}


?>