<form action="<?= BASE_URL . 'mon-hoc/luu-cap-nhat?id='.$id?>" method="post">
    <div>
        <label for="">Tên danh mục</label>
        <input type="text" name="name" value="<?php echo $model->name; ?>">
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>