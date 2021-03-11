(() => {
    let editorContent = "";
    var myEditor;

    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            myEditor = editor;

            editor.model.document.on("change:data", () => {
                console.log(editor.getData());
                document.getElementById("editor_max_length");
            });
        })
        .catch((error) => {
            console.error(error);
        });

    var formPost = document.querySelectorAll(".needs-validation")[0];
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
            if (formPost.checkValidity()) {
                formPost.submit();
            } else {
                modalSubmit.hide();
            }
            formPost.classList.add("was-validated");
        });
})();
