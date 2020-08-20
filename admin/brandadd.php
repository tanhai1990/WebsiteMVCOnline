<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
require "../classes/brand.php";
?>
<?php
$brand = new brand();
if(isset($_POST["btnSave"])){
    $brandName = $_POST["brandName"];
    $insertCat = $brand->InsertCategory($catName);
}*/
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu</h2>
                <div class="block copyblock"> 
                <?php
                /*if(isset($insertCat)){
                    echo $insertCat;
                }*/
                ?>
                 <form action="brandadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="btnSave" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>