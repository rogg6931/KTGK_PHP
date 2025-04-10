//khai bao bien:
const form = document.querySelector('#form-edit');
const backBtn = document.querySelector('#back-btn');
const cancelBtn = document.querySelector('#cancel-btn');

// lay input va select tu form
const inputs = form.querySelectorAll('input, select');

// ktra du lieu trong form:
function isDataForm() {
    for (const i of inputs) {
        if (i.value.trim() !== '') {
            return true;
        }
    }
    return false;
}

// update form
function updateDataForm(){
    if(isDataForm()){
        backBtn.classList.add('dnone');
        cancelBtn.classList.remove('dnone');
    }else{
        backBtn.classList.remove('dnone');
        cancelBtn.classList.add('dnone');
    }
}

// lang nghe input:
inputs.forEach(i => {
    i.addEventListener('input', updateDataForm);
});

// click button back:
backBtn.addEventListener('click', () => {
    window.location.href='list_books.php';
});

// click button Xoa:
cancelBtn.addEventListener('click', () => {
    // xoa du lieu:
    inputs.forEach(input => {
        input.value = '';
    });

    // update lai form:
    updateDataForm();
});

// load dau:
updateDataForm();

if(window.editBookSuccess){
    Swal.fire({
        title: 'Bingo!',
        text: 'Cập nhật thành công',
        icon: 'success'
    }).then((success) => {
        // click nut OK thi quay lai list
        if(success.isConfirmed){
            window.location.href='list_books.php'
        }
    });
}