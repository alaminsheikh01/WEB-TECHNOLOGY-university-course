<?php 
	if (! isset($_SESSION['username'])) {
		header("Location: ../../login.php");
	}
?>
<?php

require 'products.php';

$products = getProducts();

?>


<div style="text-align:center">
    <table class="table" border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Desc</th>
            <th>price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['desc'] ?></td>
                <td><?php echo $product['price'] ?></td>
               
                <td>
                    
                    <a href="dashboard_update_prod.php?id=<?php echo $product['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>
