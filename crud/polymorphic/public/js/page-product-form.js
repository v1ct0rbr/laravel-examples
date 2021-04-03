(() => {

    // configuration
    let priceInput = document.getElementById('price');



    const args = {
        afterFormat(e) { },
        allowNegative: false,
        beforeFormat(e) { },
        negativeSignAfter: false,
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: ',',
        thousandsSeparator: '.',
        cursor: 'end'
    };

    // Select the element
    const input = SimpleMaskMoney.setMask('#price', args);
    // Convert the input value to a number, which you can save e.g. to a database:
    input.formatToNumber();

  

    /* let currency = document.querySelector("input[data-type='currency']")
    currency.addEventListener("keyup", (e) => {

        
        let newValue = currency(e.target.value, { separator: '.', decimal: ',' });
        console.log(newValue)

        // currency.value = newValue;
    }) */


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
