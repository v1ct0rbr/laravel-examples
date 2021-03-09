(() => {
    var formUser = document.querySelectorAll(".needs-validation")[0];
    let formSubmit = document.querySelector("#form-submit");
    let modalSubmit = new bootstrap.Modal(
        document.getElementById("confirm-modal"),
        {
            keyboard: false,
        }
    );

    formSubmit.addEventListener("click", () => {
        modalSubmit.show();
    });

    document
        .querySelector("#modal-confirm-button")
        .addEventListener("click", (e) => {
            if (formUser.checkValidity()) {
                formUser.submit();
            } else {
                modalSubmit.hide();
            }
            formUser.classList.add("was-validated");
        });
})();
