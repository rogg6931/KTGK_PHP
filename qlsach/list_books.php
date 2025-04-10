<?php
    require "./db_connect.php";

    // khai bao bien:
    $search = '';
    $search_field = '';
    $params = [];

    // 20 sp / 1 page:
    $book_page = 15;
    // lay trang hien tai, =1 neu k co 'page':
    $page_number = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
    // tinh vi tri sach hien tai:
    $offset = ($page_number - 1) * $book_page;
    
    // truy van:
    $sql = "select book_id, title, author, publication_date, price, quantity, category_name 
            from books b join categories c
            on b.category_id = c.category_id";

    // truy van count:
    $count_sql = "select count(*)
                from books b join categories c
                on b.category_id = c.category_id";

    // xu ly voi form search:
    if (isset($_GET['search']) && $_GET['search'] !== '') {
        $search = trim($_GET['search']);
        $search_field = $_GET['search_field'] ?? 'name';
        $params[':search'] = "%$search%";
    
        if ($search_field == 'name') {
            $sql .= " where title like :search";
        } elseif ($search_field == 'author') {
            $sql .= " where author like :search";
        } elseif ($search_field == 'category') {
            $sql .= " where category_name like :search";
        }
    }
    
    // xu ly form sort:
    $sorts = [
        'price_asc' => 'price asc',
        'price_desc' => 'price desc',
        'default' => 'book_id'
    ];
    $sort_key = isset($_GET['sort']) ? $_GET['sort'] : 'default';
    $sort_order = isset($sorts[$sort_key]) ? $sorts[$sort_key] : 'book_id';
    $sql .= " order by $sort_order";

    // limit - offet lay data trang hien tai:
    $sql .= " limit :limit offset :offset";
    
    // xu ly sql:
    try{
        // chuan bi:
        $stmt = $conn->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val, PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit', $book_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        // thuc thi:
        $stmt->execute();
        // lay ket qua tra ve duoi dang array:
        $arr_books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // tong so sach:
        if (!empty($params)) {
            if ($search_field == 'name') {
                $count_sql .= " where title like :search";
            } elseif ($search_field == 'author') {
                $count_sql .= " where author like :search";
            } elseif ($search_field == 'category') {
                $count_sql .= " where category_name like :search";
            }
        }
        $stmt_count = $conn->prepare($count_sql);
        foreach ($params as $key => $val) {
            $stmt_count->bindValue($key, $val, PDO::PARAM_STR);
        }
        $stmt_count->execute();
        $total_books = $stmt_count->fetchColumn();
        // tong so trang:
        $total_pages = ceil($total_books / $book_page);
    }catch (PDOException $e){
        die("Error: " . $e->getMessage());
    }
    
    // dem tong so cot:
    $table_header = array('ID', 'Tên sách', 'Tác giả', 'Ngày xuất bản', 'Giá', 'Số lượng', 'Danh mục', 'Tùy chọn');
    $total_columns = count($table_header);

    // UI:
    require "./ui/list_books_show.php";

    // close:
    $conn = null;
?>