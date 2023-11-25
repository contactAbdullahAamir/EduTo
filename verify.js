const otp = document.querySelectorAll('.otp_field');

otp[0].focus();

otp.forEach((field, index) => {
    field.addEventListener('keydown', (e) => {
        if (e.key >= 0 && e.key <= 9) {
            otp[index].value = "";
            setTimeout(() => {
                otp[index + 1] && otp[index + 1].focus();
            }, 4);
        } else if (e.key === 'Backspace') {
            setTimeout(() => {
                otp[index - 1] && otp[index - 1].focus();
            }, 4);
        }
    });
});
  
    
    const form = document.querySelector('.form form');
    const submitBtn = document.querySelector('.submit input[type="submit"]');

submitBtn.onclick = function() {
    // Your onclick function
    let x = new XMLHttpRequest();
    x.timeout = 5000;

    x.open("POST", "./verify.php", true);

    x.onload = function() {
        if (x.readyState === XMLHttpRequest.DONE) {
            if (x.status == 200) {
                let data = x.response;
                if (data == "success") {
                    location.href = "./dashboardsDifferentiator.php";
                    // console.log("mm");
                } else {
                    // Handle other responses
                }
            }
        }
    };

    x.ontimeout = function() {
        console.error("Request timed out");
    };

    let formData = new FormData(form);
    x.send(formData);
};

