<?php

if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}
function getProducts()
{
    return json_decode(file_get_contents(__DIR__ . '../../../products.json'), true);
}
function getProductById($id)
{
    $products = getProducts();
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}


$productId = $_GET['id'];

$product = getProductById($productId);
if (!$product) {
    echo "not found";
    exit;
}

function updateProduct($data, $id)
{
    $products = getProducts();
    foreach ($products as $i => $product) {
        if ($product['id'] == $id) {
            $products[$i] = array_merge($product, $data);
        }
    }

	// putJson($products);
    file_put_contents(__DIR__ . '../../../products.json', json_encode($products));
	
	// return $updateProduct;

    
}
// echo '<pre>';
// var_dump ($product);
// echo '</pre>';

function putJson($products)
{
    file_put_contents(__DIR__ . '../../../products.json', json_encode($products, JSON_PRETTY_PRINT));
}


$title  = $desc = $price =  "";
$titleErrMsg = $descError = $priceError = "";

  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $product = array_merge($product, $_POST);
       

        updateProduct($_POST, $productId);
        echo "<script>alert('updated')</script>";
        header("Location: welcome.php");
        

		// validation

		function test_input($data) {
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$title = test_input($_POST['title']);
		$desc = test_input($_POST['desc']);
		$price = test_input($_POST['price']);

$message = "";

if (empty($title)) {

    $titleErrMsg = "Title is Empty";
}

if (empty($desc)) {

    $descError = "Desc is Empty";
}

if (empty($price)) {
    $priceError = "Price is Empty";
    
}
else {
    echo $message;
}

}

?>
<div class="form-custom">
<form method="post" action="" enctype="multipart/form-data" novalidate>
			<h3>
                <?php if ($product['id']): ?>
                    Update Product for <b><?php echo $product['title'] ?></b>
                <?php else: ?>
                    Create new Product
                <?php endif ?>
            </h3>
		<fieldset>
			<legend>Product Update</legend>

			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="<?php echo $product['title'] ?>" >
			<span style="color: red">*<?php echo $titleErrMsg; ?></span>

			<br><br>

            <label for="desc">Desc</label>
			<input type="text" name="desc" id="desc" value="<?php echo $product['desc'] ?>">
			<span style="color: red">*<?php echo $descError; ?></span>

			<br><br>
            <label for="price">Price</label>
			<input type="number" name="price" id="price" value="<?php echo $product['price'] ?>">
			<span style="color: red">*<?php echo $priceError; ?></span>

			<br><br>

		</fieldset>

		
		<!-- <input style="margin-top:10px" type="submit" name="submit" value="Submit"> -->
		<button class="btn btn-success">Submit</button>
	</form>

</div>