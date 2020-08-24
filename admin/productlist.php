<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once "../classes/product.php"; ?>

<?php
$pd = new Product();
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH SẢN PHẨM</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$pdList = $pd->ShowProduct();
			if($pdList){
				$i = 0;
				while($resultProduct = $pdList->fetch_assoc()){
					$i++;
			
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $resultProduct['productName']; ?></td>
					<td><?php echo $resultProduct['catName']; ?></td>
					<td><?php echo $resultProduct['brandName']; ?></td>
					<td><?php echo $resultProduct['productDesc']; ?></td>
					<td><?php echo $resultProduct['productType']; ?></td>
					<td><?php echo $resultProduct['productPrice']; ?></td>
					<td><a href="productedit.php?IDProduct=<?php echo $resultProduct['IDProduct']; ?>">Edit</a> 
					|| <a href="?IDProduct=<?php echo $resultProduct['IDProduct']; ?>">Delete</a></td>
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
