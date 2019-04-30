<div class="box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="controller/BookController.php" method="GET">
        <div class="field__search">
            <input type="text" placeholder="Tìm kiếm trên toàn bộ cửa hàng..." name="search-query" required>
            <div class="action">
                <a href="#" id="search-query-submit"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>đóng</span>
    </div>
</div>

<script>
    document.getElementById("search-query-submit").onclick = function() {
        document.getElementById("search_mini_form").submit();
    }
</script>