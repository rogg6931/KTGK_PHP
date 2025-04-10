<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.all.min.js"></script>
</head>
<body>
    <form id="form-add" action="" method="POST">
        <h2 class="h2">Thêm sách</h2>
        <a href="list_books.php" class="a-back">Quay lại danh sách</a>
        
        <div class="bname">
            <label for="name">Tên sách:</label> <br/>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($_data['name']) ?>"> <br/>
            <?= $_err['name'] ?>
        </div>

        <div class="aname">
            <label for="author">Tác giả:</label> <br/>
            <input type="text" name="author" id="author" value="<?= htmlspecialchars($_data['author']) ?>"> <br/>
            <?= $_err['author'] ?>
        </div>

        <div class="price">
            <label for="price">Giá:</label> <br/>
            <input type="text" name="price" id="price" value="<?= htmlspecialchars($_data['price']) ?>"> <br/>
            <?= $_err['price'] ?>
        </div>

        <div class="quantity">
            <label for="quantity">Số lượng:</label> <br/>
            <input type="text" name="quantity" id="quantity" value="<?= htmlspecialchars($_data['quantity']) ?>"> <br/>
            <?= $_err['quantity'] ?>
        </div>
        
        <div class="date">
            <label for="date-public">Ngày xuất bản:</label> <br/>
            <input type="date" name="date-public" id="date-public" value="<?= htmlspecialchars($_data['date_public']) ?>"> <br/>
            <?= $_err['date_public'] ?>
        </div>

        <div class="cate">
            <label for="category">Danh mục:</label> <br/>
            <select name="category" id="category">
                <option value="">-- Chọn danh mục --</option>
                <?php while ($row = $select_category->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $row['category_id'] ?>" <?= $_data['category'] == $row['category_id'] ? 'selected' : '' ?>>
                        <?= $row['category_name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button class="button" type="submit">Thêm sách</button>
        <button class="button-x" type="button" id="back-btn">Quay lại</button>
        <button class="button-x dnone" type="button" id="cancel-btn">Xóa thông tin</button>
    </form>

    <script>window.addBookSuccess = <?= json_encode($add_success) ?>;</script>
    <script src="./js/add_book.js"></script>
</body>
</html>