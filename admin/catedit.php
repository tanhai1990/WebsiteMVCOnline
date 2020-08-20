<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
require "../classes/category.php";
?>
<?php
//Lấy ID 
$cat = new category();
if(!isset($_GET["IDCat"]) || $_GET["IDCat"]==NULL){
    echo "<script>'window.location = 'catlist.php' '</script>";
}else{
    $IDCat = $_GET["IDCat"];

}
?>

<?php
//Sửa danh mục
if(isset($_POST["btnUpdate"])){
    $catName = $_POST["catName"];

    $updateCat = $cat->UpdateCategory($IDCat, $catName);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <div class="block copyblock">
                <?php 
                if(isset($updateCat)){
                    echo $updateCat;
                }            
                ?>
                
                <?php 
                    $getCatName = $cat->GetCatByID($IDCat);
                    if($getCatName){
                        while($result = $getCatName->fetch_assoc()){
                    
                 ?>
                 <form action="#" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName']; ?>" name="catName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
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