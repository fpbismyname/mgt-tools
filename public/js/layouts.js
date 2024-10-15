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

function changeTabs(event, id = "") {
    const selectElement= event.target;
    const selectedIndex= selectElement.selectedIndex;
    const menuSelected = selectElement.options[selectedIndex].text;
    
    const params = new URLSearchParams(window.location.search)
    params.set('menu', menuSelected)    

    window.history.pushState(null, null, `${window.location.pathname}?${params}`)
}