<section style="margin-left: 70px;">
    <h2>Book Category</h2>


    <?php

    $json_data = file_get_contents("data/products.json");
    $products = json_decode($json_data, true);

    if(count($products) != 0) {
        foreach($products as $product ) {
            ?>
<section>
<div class="column">
    <div class="card">
    <img src="<?php echo $product['image']?>" alt="Denim Jeans" style="width:60%">
        <h1><?php echo $product['title']?></h1>
        <p class="price">$<?php echo $product['price']?></p>
        <p><?php echo $product['desc']?></p>
        <p><button>Add to Cart</button></p>
    </div>
    </div>
</section>

            <?php
        }
    }
    
    ?>
    

</section>
