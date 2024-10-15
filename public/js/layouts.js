function alertWeb(title, message, type) {
    const Alert = Swal.mixin({
        toast: false,
        customClass: {
            confirmButton: 'btn btn-primary',
            popup: 'rounded-4 shadow'
        }
    })
    Alert.fire({
        title: title,
        text: message,
        icon: type
    })
}

function changeTabs(event, id = "", data = []) {
    const selectValue = event.target.value - 1;
    const elementEffected = document.getElementById(id);
    const menuSelected = data[selectValue].menu;
    elementEffected.innerText = menuSelected;
}