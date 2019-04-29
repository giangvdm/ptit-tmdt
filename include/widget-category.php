<aside class="wedget__categories poroduct--cat">
    <h3 class="wedget__title">Danh mục sách theo thể loại</h3>
    <ul>
        <?php
            $catDao = new CategoryDao();

            $catList = $catDao->getAllCategories();

            foreach ($catList as $category) {
        ?>
                <li>
                    <a href="controller/BookController.php?category=<?php echo $category->getId(); ?>">
                        <?php echo $category->getName(); ?> <span>(<?php echo $catDao->countNumberOfBooksByCategory($category->getId()); ?>)</span>
                    </a>
                </li>
        <?php
            }
        ?>
    </ul>
</aside>