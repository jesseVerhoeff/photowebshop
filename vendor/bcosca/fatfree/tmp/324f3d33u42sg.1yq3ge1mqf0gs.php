<div class="col-md-12" style="
            padding-top: 50px;
        ">
    <link href="../ui/css/cart.css" rel="stylesheet">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <h2>Downloads van een week geleden</h2>
        <div class="container">
            <div class="row">

                <?php foreach (($downloads?:[]) as $item): ?>


                    <div  class="item">
                        <div class="col-md-2">
                            <!--<img src="/image.php?a=img=<?php echo $item['productLink']; ?>-w_img=smallwatermark.jpg-w_w=100-w_h=100"  alt="..." width="192" height="108"  >-->
                            <?php if ($item['productType']=='0'): ?>
                                
                                    <div class="image">
                                        <!--<img src="<?php echo '../uploads/'.$item[0]['productLink']; ?>" alt="" height="108" width="192" />-->
                                        <img src="/image.php?a=img=<?php echo $item['productLink']; ?>-w_img=smallwatermark.jpg-w_w=100-w_h=100"  alt="..." width="192" height="108"  >
                                    </div>
                                
                                <?php else: ?>
                                    <video class="video" width="192" nocontrols controlsList="nodownload nofullscreen noremoteplayback">
                                        <source src="/video.php?a=video=<?php echo $item['productLink']; ?>"  type="video/mp4">
                                    </video>
                                

                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <h4 class="list-group-item-heading"><?php echo $item['productName']; ?></h4>
                            <p class="list-group-item-text"><?php echo $item['userUsername']; ?></p>
                            <p class="list-group-item-text"><?php echo $item['downloadDate']; ?></p>
                        </div>

                    </div>



                <?php endforeach; ?>



            </div>
        </div>
    </div>


</div>

