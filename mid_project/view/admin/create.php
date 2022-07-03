

<?php

$title  = $desc = $price =  "";
$titleErrMsg = $descError = $priceError = "";

$product = [
    'id' => '',
    'title' => '',
    'desc' => '',
    'price' => '',
];

function getProducts()
{
    return json_decode(file_get_contents(__DIR__ . '../../../products.json'), true);
}
// var_dump(getProducts());

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

function createProduct($data)
{
    $products = getProducts();

    $data['id'] = rand(1, 20);

    $products[] = $data;

    putJson($products);

    return $data;
}
function putJson($products)
{
    file_put_contents(__DIR__ . '../../../products.json', json_encode($products, JSON_PRETTY_PRINT));
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {



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

if(!$title == "" && !$desc == "" && !$price == "")
{
$product = array_merge($product, $_POST);

if ($product) {
    $product = createProduct($_POST);
    header("Location:./controller/admin/viewProducts.php");
}
}
}

?>

<div class="form-custom">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Product Add</legend>

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

		
		<input style="margin-top:10px" type="submit" name="submit" value="Submit">
	</form>

</div>
</body>
</html>