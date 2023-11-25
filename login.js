document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById('form');
  const submitBtn = form.querySelector('button[type="button"]');

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    submitBtn.onclick = () => {
        let x = new XMLHttpRequest();
        x.timeout = 5000;

    x.open("POST", "./login.php", true);
    x.onload = () => {
      if (x.readyState === XMLHttpRequest.DONE) {
          if (x.status == 200) {
              try {
                  let data = JSON.parse(x.responseText);
  
                  if (data.status === "success") {
                    //   console.log("mqds");
                      // Introduce a slight delay before redirection (e.g., 500 milliseconds)
                      
                          location.href = "./verify.php";
                     
                  } else {
                      console.error("Server Error:", data.message);
                      // Handle other error cases if needed
                  }
              } catch (error) {
                  console.error("JSON Parse Error:", error);
                  // Handle the case where the response is not valid JSON
              }
          }
      }
  };
  

    x.ontimeout = () => {
      console.error("Request timed out");
    };

    let formData = new FormData(form);
    // console.log(formData);
    x.send(formData);
  };
});
