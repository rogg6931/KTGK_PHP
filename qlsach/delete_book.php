<?php
    require "./db_connect.php";

    if(isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
        // get id:
        $delete_id = $_GET['delete_id'];
    
        try {
            $stmt = $conn->prepare("delete from books where book_id = :id");
            $stmt->execute([':id' => $delete_id]);

            // redirect 
            header("Location: list_books.php?deleted=1"); // vi ben del_book_show co isset($_GET['deleted']) nen truyen =1 vao de hien alert.
            exit;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // close:
    $conn = null;
?>