<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    require_once "../classes/brand.php";
?>

<?php
$brand = new brand();

if(isset($_GET["IDDelete"])){
	$IDDel = $_GET["IDDelete"];
	$delBrand = $brand->DeleteBrand($IDDel);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
					<?php
					if(isset($delCat)){
						echo $delCat;
					}
					?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$rowBrand = $brand->ShowBrand();
					if($rowBrand){
						$i=0;
						while($result = $rowBrand->fetch_assoc()){
							$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?IDBrand=<?php echo $result['IDBrand'] ?>">Edit</a> || 
							<a onclick="return confirm('Are you want to delete?')" href="brandlist.php?IDDelete=<?php echo $result['IDBrand'] ?>">Delete</a></td>
						</tr>
					<?php
						}
					}
					?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

