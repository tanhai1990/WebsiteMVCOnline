<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
require "../classes/brand.php";
?>
<?php
//Lấy ID 
$brand = new brand();
if(!isset($_GET["IDBrand"]) || $_GET["IDBrand"]==NULL){
    echo "<script>'window.location = 'brandlist.php' '</script>";
}else{
    $IDBrand = $_GET["IDBrand"];

}
?>

<?php
//Sửa danh mục
if(isset($_POST["btnUpdate"])){
    $brandName = $_POST["brandName"];

    $updateBrand = $brand->UpdateBrand($IDBrand, $brandName);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <div class="block copyblock">
                <?php 
                if(isset($updateBrand)){
                    echo $updateBrand;
                }            
                ?>
                
                <?php 
                    $getBrandName = $brand->GetBrandByID($IDBrand);
                    if($getBrandName){
                        while($result = $getBrandName->fetch_assoc()){
                    
                 ?>
                 <form action="#" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName']; ?>" name="brandName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="btnUpdate" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>