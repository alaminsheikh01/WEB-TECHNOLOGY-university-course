<?php

function getProducts()
{
    return json_decode(file_get_contents(__DIR__ .'../../../products.json'), true);
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


function putJson($products)
{
    file_put_contents(__DIR__ . '../../../products.json', json_encode($products, JSON_PRETTY_PRINT));
}
