<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete book</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php if(isset($_GET['deleted'])) { ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    title: 'Bingo!',
                    text: 'Đã xóa thành công',
                    icon: 'success'
                });
            });
        </script>
    <?php } ?>
</body>
</html>