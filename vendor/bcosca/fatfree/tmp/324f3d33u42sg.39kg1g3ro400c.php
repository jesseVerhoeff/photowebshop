<?php if ($username==NULL): ?>
    <h1>Hello, user!</h1>
<?php endif; ?>

<?php if ($username!=NULL): ?>
    <h1>Hello, <?php echo $username; ?>!</h1>
<?php endif; ?>


<div class="row">

<?php foreach (($product?:[]) as $item): ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <?php if ($item['productType']=='0'): ?>
                <!--<img src="../lib/watermark.php?image=./<?php echo '../uploads/'.$item['productLink']; ?>&watermerk=../uploads/smallwatermark.jpg" alt="..." height="1080" width="1920">-->
                <img src="/image.php?a=img=<?php echo $item['productLink']; ?>-w_img=smallwatermark.jpg-w_w=100-w_h=100"  alt="..." width="1920" height="1080"  >

            <?php endif; ?>
            <?php if ($item['productType']=='1'): ?>
                <!--<video width="466" controls controlsList="nodownload nofullscreen noremoteplayback">-->
                    <!--<source src="<?php echo '../uploads/'.$item['productLink']; ?>"  type="video/mp4">-->

                <!--</video>-->
                <video width="466" controls controlsList="nodownload nofullscreen noremoteplayback" >
                    <source src="/video.php?a=video=<?php echo $item['productLink']; ?>"  type="video/mp4">
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
<script>


</script>
