<h1>Hello, <?php echo $product[0]['productName']; ?>!</h1>


<div class="row">

<?php foreach (($product?:[]) as $item): ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <?php if ($item['productType']=='0'): ?>
                <img src="<?php echo '../uploads/'.$item['productLink']; ?>" alt="..." height="1080" width="1920">
            <?php endif; ?>
            <?php if ($item['productType']=='1'): ?>
                <video width="466" controls controlsList="nodownload nofullscreen noremoteplayback">
                    <source src="<?php echo '../uploads/'.$item['productLink']; ?>"  type="video/mp4">

                </video>
            <?php endif; ?>

            <div class="caption">
                <h3><?php echo $item['productName']; ?></h3>
                <p><?php echo $item['productDescription']; ?></p>
                <p><a href="/addproduct/<?php echo $item['productId']; ?>" class="btn btn-primary" role="button">Add</a></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>



</div>
