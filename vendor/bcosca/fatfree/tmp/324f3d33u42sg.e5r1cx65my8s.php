<div class="shopping-cart">
    <link href="../ui/css/cart.css" rel="stylesheet">
<!-- Title -->
<div class="title">
    Shopping Cart
</div>

<!-- Product #1 -->
    <?php foreach (($cart?:[]) as $item): ?>
        <div class="item">
            <div class="buttons">
                <a href="/itemdelete/<?php echo $item[0]['productId']; ?>/" class="delete-btn" role="button">Delete</a>

            </div>
            <p><?php echo $item; ?></p>

            <div class="image">
                <img src="<?php echo '../uploads/'.$item[0]['productLink']; ?>" alt="" height="108" width="192" />
            </div>

            <div class="description">
                <span><?php echo $item[0]['productName']; ?></span>

                <span><?php echo $item[0]['productDescription']; ?></span>
            </div>

            <div class="total-price">$<?php echo $item[0]['productPrice']; ?></div>
        </div>
    <?php endforeach; ?>


</div>