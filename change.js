const form = document.getElementById('form')
const type = document.getElementById('user_type');




function checkAll() {
    const typeValue = type.value;

    if (
        typeValue ==='none'
    ) {
        alert('Please input required fields.');
        return false;
    } else {
        return true;
    }
}

