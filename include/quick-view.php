<div class="modal fade" id="<?php echo "modal-" . $book->getId(); ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal__container" role="document">
        <div class="modal-content">
            <div class="modal-header modal__header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-product">
                    <!-- Start product images -->
                    <div class="product-images">
                        <div class="main-image images">
                            <img style="width:420px;height: 614px" alt="big images" src="<?=$book->getImage()?>">

                        </div>
                    </div>
                    <!-- end product images -->
                    <div class="product-info">
                        <h1><a href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><?php echo $book->getTitle(); ?></a></h1>
                        <div class="price-box-3">
                            <div class="s-price-box">
                                <span class="new-price"><?php echo $book->getPrice(); ?>đ</span>
                                <?php if(($book->getOldPrice())!=null):?>
                                <span class="old-price"><?=$book->getOldPrice()?>đ</span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="quick-desc">
                            <?php echo $book->getDescription(); ?>
                        </div>
                        <?php if($book->getQuantity()==0): ?>
                        <p class="text-danger">Đã Hết hàng</p>
                        <?php endif;?>
                        <?php if($book->getQuantity()!=0): ?>
                        <div class="addtocart-btn">
                            <a href="./controller/addCart.php?id=<?=$book->getId()?>&quantity=1">Thêm vào giỏ hàng</a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
