<?php
    if (isset($_SESSION['bestSellerBookList'])):
        $bestSellerBookList = $_SESSION['bestSellerBookList'];
?>
<div class="wn__related__product">
    <div class="section__title text-center">
        <h2 class="title__be--2">Sản phẩm bán chạy</h2>
    </div>
    <div class="row mt--60">
        <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
            <?php
                        foreach ($bestSellerBookList as $book) {
                    ?>
            <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="product__thumb">
                    <a class="first__img" href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><img style="height: 340px;width: 270px;" src="<?=$book->getImage()?>" alt="product image"></a>
                    <a class="second__img animation1" href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><img style="height: 340px;width: 270px;" src="<?=$book->getImage()?>" alt="product image"></a>
                    <?php
                                        if ($book->getIsBestSeller()):
                                    ?>
                    <div class="hot__box">
                        <span class="hot-label">BÁN CHẠY</span>
                    </div>
                    <?php
                                        endif;
                                    ?>
                </div>
                <div class="product__content content--center">
                    <h4><a href="product-detail.php"><?php echo $book->getTitle(); ?></a></h4>
                    <ul class="prize d-flex">
                        <li><?php echo $book->getPrice(); ?> VNĐ</li>
                        <?php 
                                            if ($book->getOldPrice()): 
                                        ?>
                        <li class="old_prize">
                            <?php echo $book->getOldPrice(); ?> VNĐ
                        </li>
                        <?php
                                            endif;
                                        ?>
                    </ul>
                    <div class="action">
                        <div class="actions_inner">
                            <ul class="add_to_links">
                                <li>
                                    <a class="cart" href="controller/addCart.php?id=<?=$book->getId()?>&quantity=1"><i class="bi bi-shopping-cart-full"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#<?php echo "modal-" . $book->getId(); ?>">
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
</div>
<?php
    endif;
?>
<div id="quickview-wrapper">
    <?php
        foreach ($bestSellerBookList as $book) {
            include('include/quick-view.php');
        }
    ?>
</div>
