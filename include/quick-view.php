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
                            <img alt="big images" src="images/product/big-img/1.jpg">
                        </div>
                    </div>
                    <!-- end product images -->
                    <div class="product-info">
                        <h1><a href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><?php echo $book->getTitle(); ?></a></h1>
                        <div class="price-box-3">
                            <div class="s-price-box">
                                <span class="new-price"><?php echo $book->getPrice(); ?></span>
                                <span class="old-price">$45.00</span>
                            </div>
                        </div>
                        <div class="quick-desc">
                            <?php echo $book->getDescription(); ?>
                        </div>
                        <div class="social-sharing">
                            <div class="widget widget_socialsharing_widget">
                                <h3 class="widget-title-modal">Share this product</h3>
                                <ul class="social__net social__net--2 d-flex justify-content-start">
                                    <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                    <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                    <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="addtocart-btn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>