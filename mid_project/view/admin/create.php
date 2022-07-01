

<?php

$title  = $desc = $price =  "";
$titleErrMsg = $descError = $priceError = "";



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
    if(isset($_POST['submit'] ) ){

    
        $new_message = array(
            "title" => $_POST['title'],
            "desc" => $_POST['desc'],
            "price" => $_POST['price'],
        );
       
        if(filesize('productAdded.json') == "" ){
            $first_record = array($new_message);
            $data_to_save = $first_record;
        }else{
           
            $old_records = json_decode(file_get_contents('productAdded.json'));
            array_push($old_records, $new_message);
    
            $data_to_save = $old_records;
        }
    
        if(!file_put_contents('product_added.json', json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
            $error = "Error storing message, please try again";
        }else{
            $success = "Message is stored successfully";
        }
    }
    
}



}

?>

<div class="form-custom">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Product Add</legend>

			<label for="title">Title</label>
			<input type="text" name="title" id="title" >
			<span style="color: red">*<?php echo $titleErrMsg; ?></span>

			<br><br>

            <label for="desc">Desc</label>
			<input type="text" name="desc" id="desc">
			<span style="color: red">*<?php echo $descError; ?></span>

			<br><br>
            <label for="price">Price</label>
			<input type="number" name="price" id="price">
			<span style="color: red">*<?php echo $priceError; ?></span>

			<br><br>

		</fieldset>

		
		<input style="margin-top:10px" type="submit" name="submit" value="Submit">
	</form>

</div>
</body>
</html>