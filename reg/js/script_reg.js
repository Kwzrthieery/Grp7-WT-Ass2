// Kwizera Thierry
// 222003408
document.getElementById("registrationForm").addEventListener("submit", function(event){
    event.preventDefault();
    
    var form = this;
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("message").innerHTML = xhr.responseText;
            form.reset();
        } else {
            alert('An error occurred!');
        }
    };
    xhr.send(formData);
});
