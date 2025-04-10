<?php
    require "./db_connect.php";

    // khoi tao bien:
    $add_success = ''; 
    
    $_data = [
        'name' => '', // key: cac field trong form
        'author' => '',
        'price' => '',
        'quantity' => '',
        'date_public' => '',
        'category' => ''
    ];

    $_err = [
        'name' => '',
        'author' => '',
        'price' => '',
        'quantity' => '',
        'date_public' => '',
        'general' => ''
    ];

    // xu ly voi post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            // lay du lieu tu form
            $_data['name'] = $_POST['name'] ?? ''; // khi submit: $post['name_input'] is null => '', not null => $data['name_input']
            $_data['author'] = $_POST['author'] ?? '';
            $_data['price'] = $_POST['price'] ?? '';
            $_data['quantity'] = $_POST['quantity'] ?? '';
            $_data['date_public'] = $_POST['date-public'] ?? '';
            $_data['category'] = $_POST['category'] ?? '';

            // goi ham ktra du lieu:
            require "./valid/valid.php";

            // name:
            validate_field($_data['name'], 'name', $_err, [
                'required' => true,
                'field_label' => 'tên sách',
                'max_length' => 100
            ]);

            // author:
            validate_field($_data['author'], 'author', $_err, [
                'required' => true,
                'field_label' => 'tên tác giả',
                'max_length' => 100
            ]);

            // price:
            validate_field($_data['price'], 'price', $_err, [
                'required' => true,
                'field_label' => 'giá sách',
                'regex' => "/^[0-9]+(\.[0-9]+)?$/",
                'regex_message' => 'Vui lòng chỉ nhập số',
                'non_zero' => true,
                'non_zero_message' => 'Giá sách phải lớn hơn 0'
            ]);
            
            // quantity:
            validate_field($_data['quantity'], 'quantity', $_err, [
                'required' => true,
                'field_label' => 'số lượng',
                'regex' => "/^[0-9]+$/",
                'regex_message' => 'Vui lòng chỉ nhập số nguyên',
                'max_value' => 1000,
                'max_value_message' => 'Số lượng chỉ được dưới 1000 quyển',
                'non_zero' => true,
                'non_zero_message' => 'Số lượng phải lớn hơn 0'
            ]);

            // date:
            validate_field($_data['date_public'], 'date_public', $_err, [
                'required' => true,
                'field_label' => 'ngày xuất bản',
                'date_max' => date('Y-m-d'),
                'date_max_message' => 'Vui lòng chọn lại thời gian'
            ]);
            
            // sql insert:
            if(empty(array_filter($_err))){
                $sql_insert = "INSERT INTO books (title, author, publication_date, price, quantity, category_id) 
                            VALUES (:title, :author, :publication_date, :price, :quantity, :category_id)";

                $placeholder = [
                    'title' => $_data['name'], // key: placeholder name trong values
                    'author' => $_data['author'],
                    'publication_date' => $_data['date_public'],
                    'price' => $_data['price'],
                    'quantity' => $_data['quantity'],
                    'category_id' => $_data['category']
                ];
                $stmt = $conn->prepare($sql_insert);
                $add_success = $stmt->execute($placeholder);

                // reset
                if ($add_success) {
                    $_data = array_fill_keys(array_keys($_data), '');
                }else{
                    $_err['general'] = "<span style='color:red'>Không thể thêm sách, vui lòng thử lại!</span>";
                }
            }
        }catch(PDOException $e){
            die("Error: " . $e->getMessage());
        }
    }

    //select category:
    try{
        $select_category = $conn->query("select * from categories");
    }catch(PDOException $e){
        die("Error: " . $e->getMessage());
    }

    // UI:
    require "./ui/add_book_show.php";

    // close:
    $conn = null;
?>