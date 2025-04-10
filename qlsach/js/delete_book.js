document.querySelectorAll('.btn-del').forEach(btn => {
    btn.addEventListener('click', () => {
        const bookId = btn.getAttribute('data-id'); // lay book_id tu data-id

        // thong bao:
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: 'Không thể hoàn tác!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // click OK, den giao dien xoa
                window.location.href = `delete_book.php?delete_id=${bookId}`;
            }
        });
    });
});