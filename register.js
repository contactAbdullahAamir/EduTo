document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("registerform");
  const registerBtn = document.getElementById("registerBtn");

  registerBtn.onclick = () => {
    // Create FormData object from the form
    const formData = new FormData(form);

    // Use Fetch API for form submission
    fetch("sign-up.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Network response was not ok: ${response.status}`);
        }
        return response.text();
      })
      .then((data) => {
        handleResponse(data);
      })
      .catch((error) => {
        console.error("Fetch error:", error);
        showModal("An error occurred. Please try again.", false);
      });
  };

  // Modal Close Button
  const modalCloseBtn = document.getElementById("modalCloseBtn");
  modalCloseBtn.addEventListener("click", () => {
    const modal = document.getElementById("myModal");
    modal.style.display = "none";
  });

  // Modal Close on outside click
  window.onclick = function (event) {
    const modal = document.getElementById("myModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };

  // Function to show a modal with a message
  function showModal(message, isSuccess) {
    const modal = document.getElementById("myModal");
    const modalContent = document.getElementById("modalContent");
    const modalHeader = document.getElementById("modalHeader");

    modalContent.innerHTML = message;
    modalHeader.style.backgroundColor = isSuccess ? "#28a745" : "#dc3545";
    modal.style.display = "block";

    // Close the modal after 3 seconds
    setTimeout(() => {
      modal.style.display = "none";
    }, 3000);
  }

  // Function to handle the response from the server
  // Inside handleResponse function
  function handleResponse(data) {
    console.log(data); // Log the response to the console

    showModal(data, data === "success");

    // Redirect if registration is successful
    if (data === "success") {
      setTimeout(() => {
        window.location.href = "index.php";
      }, 3000); // Redirect after 3 seconds
    }
  }
});
