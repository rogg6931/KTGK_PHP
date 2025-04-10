<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Book</title>

    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php require './ui/delete_book_show.php' ?>

    <section>
        <h1 class="h1">Thông tin sách</h1>

        <div class="group-form">
            <form id="form-search">
                <div class="search-wrapper">
                    <select id="select-search" name="search_field">
                        <option value="name" <?= $search_field == 'name' ? 'selected' : '' ?>>Tên sách</option>
                        <option value="author" <?= $search_field == 'author' ? 'selected' : '' ?>>Tác giả</option>
                        <option value="category" <?= $search_field == 'category' ? 'selected' : '' ?>>Danh mục</option>
                    </select>

                    <input class="search" type="text" placeholder="Tìm kiếm ..." name="search" value="<?= htmlspecialchars($search ?? '') ?>">

                    <button class="btn-search" type="submit">Tìm</button>
                </div>
            </form>

            <!-- sort -->
            <form id="form-sort">
                <label>Sắp xếp theo:</label>
                <select name="sort" id="select-sort" onchange="this.form.submit()">
                    <option value="default">Mặc định</option>
                    <option value="price_asc" <?= $sort_key == 'price_asc' ? 'selected' : '' ?>>Giá tăng dần</option>
                    <option value="price_desc" <?= $sort_key == 'price_desc' ? 'selected' : '' ?>>Giá giảm dần</option>
                </select>
                <!-- giu value -->
                <input type="hidden" name="search" value="<?= htmlspecialchars($search ?? '') ?>">
                <input type="hidden" name="search_field" value="<?= htmlspecialchars($search_field ?? 'name') ?>">
                <input type="hidden" name="page" value="<?= $page_number ?>">
            </form>

            <button class="btn-add">Thêm sách</button>
        </div>

        <table>
            <tr>
                <?php foreach($table_header as $th){ ?>
                    <th><?= htmlspecialchars($th) ?></th>
                <?php } ?>
            </tr>

            <?php if(!empty($arr_books)){ ?>
                <?php $i=1; foreach($arr_books as $arr){ ?>
                    <tr>
                        <td class="td-id"><?= $offset + $i++ ?></td> <!-- stt thay the id -->
                        <td class="td-title"><?= htmlspecialchars($arr['title']) ?></td>
                        <td class="td-author"><?= htmlspecialchars($arr['author']) ?></td>
                        <td class="td-date"><?= htmlspecialchars($arr['publication_date']) ?></td>
                        <td class="td-price"><?= htmlspecialchars($arr['price']) ?></td>
                        <td class="td-quantity"><?= htmlspecialchars($arr['quantity']) ?></td>
                        <td class="td-cate"><?= htmlspecialchars($arr['category_name']) ?></td>
                        <td class="td-tools">
                            <button class="btn-edit">
                                <a href="edit_book.php?id= <?= $arr['book_id'] ?>">Sửa</a>
                            </button>
                            <button class="btn-edit btn-del" data-id="<?= $arr['book_id'] ?>">Xóa</button>
                        </td>
                    </tr>
                <?php } ?>
            <?php }else{ ?>
                <tr><td colspan="<?= $total_columns ?>" style="text-align:center">Khong co du lieu</td></tr>
            <?php } ?>
        </table>

        <!-- phan trang -->
        <?php if ($total_pages > 1) { ?>
            <div class="pagination">
                <!-- trang truoc -->
                <?php if ($page_number > 1) { ?>
                    <a href="list_books.php?page=<?= $page_number - 1 ?>&sort=<?= htmlspecialchars($sort_key) ?>&search=<?= htmlspecialchars($search) ?>&search_field=<?= htmlspecialchars($search_field) ?>">Trang trước</a>
                <?php } else { ?>
                    <span class="disabled">Trang trước</span>
                <?php } ?>
    
                <!-- Các số trang -->
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <?php if ($i == $page_number) { ?>
                        <span class="current"><?= $i ?></span>
                    <?php } else { ?>
                        <a href="list_books.php?page=<?= $i ?>&sort=<?= htmlspecialchars($sort_key) ?>&search=<?= htmlspecialchars($search) ?>&search_field=<?= htmlspecialchars($search_field) ?>"><?= $i ?></a>
                    <?php } ?>
                <?php } ?>
    
                <!-- Trang sau -->
                <?php if ($page_number < $total_pages) { ?>
                    <a href="list_books.php?page=<?= $page_number + 1 ?>&sort=<?= htmlspecialchars($sort_key) ?>&search=<?= htmlspecialchars($search) ?>&search_field=<?= htmlspecialchars($search_field) ?>">Trang sau</a>
                <?php } else { ?>
                    <span class="disabled">Trang sau</span>
                <?php } ?>
            </div>
        <?php } ?>
    </section>

    <script src="./js/list.js"></script>
    <script src="./js/delete_book.js"></script>
</body>
</html>