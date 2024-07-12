<div class="content">
    <form action="index.php?act=add_detail" method="post">
        <div id="variants-container">
            <h4>THÊM BIẾN THỂ SẢN PHẨM</h4>
            <div class="variant">
                <hr>
                <label for="size"><h5>Kích thước</h5> </label>
                <input class="form-control" type="text"  aria-label="default input example"  name="size[]" required>

                <label for="variantQuantity"><h5>Số Lượng</h5></label>
                <input class="form-control" type="number"  aria-label="default input example"  name="variantQuantity[]" required> <br> <br>
            </div>
        </div>

        <input type="hidden" name="idsp" value="<?= $id ?>">
        <button type="button" class="btn btn-primary" id="add-variant">Thêm biến thể</button>
        <button class="btn btn-success">Thêm</button>
        <button class="btn btn-success"><a href="index.php?act=add_detail">Danh sách biến thể</a></button>
    </form>
</div>

<script>
    document.getElementById("add-variant").addEventListener("click", function() {
        var variantsContainer = document.getElementById("variants-container");
        var newVariant = document.querySelector(".variant").cloneNode(true);
        variantsContainer.appendChild(newVariant);
    });
</script>
<style>
    a{
        color:#fff;
    }
</style>