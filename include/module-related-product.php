<?php
    if (isset($_SESSION['relatedBookList'])):
        $relatedBookList = $_SESSION['relatedBookList'];
?>
<div class="section__title text-center">
    <h2 class="title__be--2">Các sản phẩm liên quan</h2>
</div>
<div class="row mt--60">
    <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
        <?php
                foreach ($relatedBookList as $relatedBook) {
            ?>
        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="product__thumb">
                <a class="first__img" href="controller/BookController.php?id=<?php echo $relatedBook->getId(); ?>"><img style="height: 340px;width: 270px;" src="<?=$relatedBook->getImage()?>" alt="product image"></a>
                <a class="second__img animation1" href="controller/BookController.php?id=<?php echo $relatedBook->getId(); ?>"><img style="height: 340px;width: 270px;" src="<?=$relatedBook->getImage()?>" alt="product image"></a>
                <?php
                                if ($relatedBook->getIsBestSeller()):
                            ?>
                <div class="hot__box">
                    <span class="hot-label">BÁN CHẠY</span>
                </div>
                <?php
                                endif;
                            ?>
            </div>
            <div class="product__content content--center">
                <h4><a href="product-detail.php"><?php echo $relatedBook->getTitle(); ?></a></h4>
                <ul class="prize d-flex">
                    <li><?php echo $relatedBook->getPrice(); ?>đ</li>
                    <?php 
                                    if ($relatedBook->getOldPrice()): 
                                ?>
                    <li class="old_prize">
                        <?php echo $relatedBook->getOldPrice(); ?>đ
                    </li>
                    <?php
                                    endif;
                                ?>
                </ul>
                <div class="action">
                    <div class="actions_inner">
                        <ul class="add_to_links">
                            <?php 
                                if($relatedBook->getQuantity()!=0):
                            ?>
                            <li>
                                <a class="cart" href="controller/addCart.php?id=<?=$relatedBook->getId()?>&quantity=1"><i class="bi bi-shopping-cart-full"></i></a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#<?php echo "modal-" . $relatedBook->getId(); ?>">
                                    <i class="bi bi-search"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            ?>
    </div>
</div>

<div id="quickview-wrapper">
    <?php
            foreach ($relatedBookList as $book) {
                include('include/quick-view.php');
            }
        ?>
</div>

<?php
    endif;
?>
