<h1>Hello, <?php echo $product['productName']; ?>!</h1>


<div class="row">

    <?php foreach (($product?:[]) as $products): ?>
        <?php echo $products; ?>
    <?php endforeach; ?>

<!--   <?php foreach (($product?:[]) as $product): ?>-->
<!--        <h2><?php echo $product; ?></h2>-->
<!--       <img src="<?php echo '../uploads/'.$product['productLink']; ?>" />-->
<!--    <?php endforeach; ?>-->

<!--    <div class="col-sm-6 col-md-4">-->
<!--        <div class="thumbnail">-->
<!--            <img src="<?php echo '../uploads/'.$product['productLink']; ?>" alt="...">-->
<!--            <div class="caption">-->
<!--                <h3><?php echo $product['productName']; ?></h3>-->
<!--                <p><?php echo $product['productDescription']; ?></p>-->
<!--                <p><a href="#" class="btn btn-primary" role="button">Button</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

</div>