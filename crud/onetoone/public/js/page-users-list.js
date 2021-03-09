(() => {
    var formUser = document.querySelectorAll(".needs-validation")[0];
    let formSubmit = document.querySelector("#form-submit");
    let modalSubmit = new bootstrap.Modal(
        document.getElementById("confirm-modal"),
        {
            keyboard: false,
        }
    );

    let deleteButton = document.getElementsByClassName("delete");

    [].forEach.call(deleteButton, function (el) {
        el.addEventListener("click", (e) => {
            e.preventDefault();
            let r = confirm("excluir");

            console.log(r);
            if (r) {
                form = e.target.parentNode;
                form.submit();
            } else {
                alert("cancelado");
            }
        });
    });

    document
        .querySelector("#modal-confirm-button")
        .addEventListener("click", (e) => {});
})();
