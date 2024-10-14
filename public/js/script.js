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

function changeTabs(event) {
    const tab = event.target;
    console.log(tab.value);
}