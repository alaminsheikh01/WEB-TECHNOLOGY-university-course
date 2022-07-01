<?php

function getProducts()
{
    return json_decode(file_get_contents(__DIR__ . '/products.json'), true);
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

function createProduct($data)
{
    $products = getProducts();

    $data['id'] = rand(1000000, 2000000);

    $products[] = $data;

    putJson($products);

    return $data;
}

function updateProduct($data, $id)
{
    $updateProduct = [];
    $products = getProducts();
    foreach ($products as $i => $product) {
        if ($product['id'] == $id) {
            $product[$i] = $updateProduct = array_merge($product, $data);
        }
    }

    putJson($products);

    return $updateProduct;
}

function deleteProducts($id)
{
    $users = getProducts();

    foreach ($products as $i => $product) {
        if ($product['id'] == $id) {
            array_splice($products, $i, 1);
        }
    }

    putJson($products);
}

function uploadImage($file, $product)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${product['id']}.$extension");

        $product['extension'] = $extension;
        updateProduct($product, $product['id']);
    }
}

function putJson($products)
{
    file_put_contents(__DIR__ . '/products.json', json_encode($products, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }
    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username is required and it must be more than 6 and less then 16 character';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'This must be a valid email address';
    }

    if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number';
    }
    // End Of validation

    return $isValid;
}