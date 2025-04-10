//khai bao bien:
const form = document.querySelector('#form-add');
const backBtn = document.querySelector('#back-btn');
const cancelBtn = document.querySelector('#cancel-btn');

// lay input va select tu form
const inputs = form.querySelectorAll('input, select');

// ktra du lieu trong form:
function isDataForm(){
    for(const i of inputs){
        // value trong (input, select) # ''
        if(i.value.trim() !== ''){
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

// lang nghe inputs:
inputs.forEach(input => {
    input.addEventListener('input', updateDataForm);
});

// click button back:
backBtn.addEventListener('click', () => {
    window.location.href='list_books.php';
});

// click button Huy:
cancelBtn.addEventListener('click', () => {
    // reset form:
    form.reset();

    // update lai form:
    updateDataForm();
});

// load dau:
updateDataForm();

if(window.addBookSuccess){
    Swal.fire({
        title: 'Bingo!',
        text: 'Thêm sách thành công',
        icon: 'success'
    });
}