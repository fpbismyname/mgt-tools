function PreviewImage(event, id) {
    const reader = new FileReader();
    const image = event.target.files[0];
    reader.onload = function (event) {
        const ImagePreview = document.getElementById(id)
        ImagePreview.src = event.target.result;
        ImagePreview.className = "img-thumbnail rounded-2 w-100 mt-2";
    }
    reader.readAsDataURL(image);
}

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

function changeTabs(event){
    const tab = event.target;
    console.log(tab.value);
}