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
    const selectElement = event.target;
    const selectedIndex = selectElement.selectedIndex;
    const menuSelected = selectElement.options[selectedIndex].text;

    const params = new URLSearchParams(window.location.search)
    params.set('menu', menuSelected)

    window.history.pushState(null, null, `${window.location.pathname}?${params}`)
}

function toggleView(event, id, id2) {
    const Element1 = document.getElementById(id);
    const Element2 = document.getElementById(id2);
    const InitElement = event.target;
    // console.log(InitElement.innerHTML = "Kumalala")

    Element1.style.display === 'none' ? Element1.style.display = 'block' : Element1.style.display = 'none'
    Element2.style.display === 'none' ? Element2.style.display = 'block' : Element2.style.display = 'none'
    Element1.style.display === 'none' ? InitElement.innerText = 'Manage Use Case' : InitElement.innerText = 'Manage Actor'
}