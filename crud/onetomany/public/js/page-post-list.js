(() => {
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
})();
