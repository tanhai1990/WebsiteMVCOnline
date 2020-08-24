<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
$pd = new Product();
// if(isset($_POST['btnSave'])){
//     $insertProduct = $pd->InsertProduct($_POST, $_FILES);
// }


if(!isset($_GET["IDProduct"]) || $_GET["IDProduct"]==NULL){
    echo "<script>'window.location = 'productlist.php' '</script>";
}else{
    $IDProduct = $_GET["IDProduct"];
}

if(isset($_POST["btnUpdate"])){
    $updateProduct = $pd->UpdateProduct($_POST, $_FILES, $IDProduct);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block"> 
            <?php
            if(isset($updateProduct)){
                echo $updateProduct;
            }

            ?>

            <?php
            $getProductByID = $pd->GetProductByID($IDProduct);
            if($getProductByID){
                while($resultProduct = $getProductByID->fetch_assoc()){
            
            
            ?>              
         <form action="productedit.php" method="post" enctype="multipart/form-data">
            
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $resultProduct['productName']; ?>" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select Category</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->ShowCategory();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['IDCat'] ?>"><?php echo $result['catName']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Select Brand</option>
                            <?php
                            $brand = new brand();
                            $brandList = $brand->ShowBrand();
                            if($brandList){
                                while($result = $brandList->fetch_assoc()){
                            
                            ?>
                            <option value="<?php echo $result['IDBrand'] ?>"><?php echo $result['brandName'] ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="productDesc"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="productPrice" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="productType">

                            <option>Select Type</option>
                            <option value="1">Featured</option>
                            <option value="0">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>

