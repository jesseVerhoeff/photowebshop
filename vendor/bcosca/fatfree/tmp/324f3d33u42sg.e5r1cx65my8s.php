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
            <?php if ($item[0]['productType']=='0'): ?>
                
                    <p>Photo</p>
                
                <?php else: ?>
                    <p>Video</p>
                

            <?php endif; ?>
            <?php if ($item[0]['productType']=='0'): ?>
                
                    <div class="image">
                        <!--<img src="<?php echo '../uploads/'.$item[0]['productLink']; ?>" alt="" height="108" width="192" />-->
                        <img src="/image.php?a=img=<?php echo $item[0]['productLink']; ?>-w_img=smallwatermark.jpg-w_w=100-w_h=100"  alt="..." width="192" height="108"  >
                    </div>
                
                <?php else: ?>
                    <video class="video" width="192" nocontrols controlsList="nodownload nofullscreen noremoteplayback">
                        <source src="/video.php?a=video=<?php echo $item[0]['productLink']; ?>"  type="video/mp4">
                    </video>
                

            <?php endif; ?>


            <div class="description">
                <span><?php echo $item[0]['productName']; ?></span>

                <span><?php echo $item[0]['productDescription']; ?></span>

                <span><?php echo $item[0]['productCategory']; ?></span>
            </div>

            <div class="total-price">$<?php echo $item[0]['productPrice']; ?></div>
        </div>
    <?php endforeach; ?>
    <div class="item">

        <div class="total-price">$<?php echo $total; ?></div>
    </div>


    <a class="btn btn-lg btn-primary " href="/order" type="submit">Bestellen</a>


</div>