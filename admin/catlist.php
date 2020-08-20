<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    require_once "../classes/category.php";
?>

<?php
$cat = new category();

if(isset($_GET["IDDelete"])){
	$IDDel = $_GET["IDDelete"];
	$delCat = $cat->DeleteCategory($IDDel);
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
					$rowCat = $cat->ShowCategory();
					if($rowCat){
						$i=0;
						while($result = $rowCat->fetch_assoc()){
							$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?IDCat=<?php echo $result['IDCat'] ?>">Edit</a> || 
							<a onclick="return confirm('Are you want to delete?')" href="catlist.php?IDDelete=<?php echo $result['IDCat'] ?>">Delete</a></td>
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

