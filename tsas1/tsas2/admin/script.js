const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/logDB.php", true);
    xhr.onload = () => {
        if(xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success") {
                    window.location.href="user.php";
                } else {
                    console.log(data);
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}
