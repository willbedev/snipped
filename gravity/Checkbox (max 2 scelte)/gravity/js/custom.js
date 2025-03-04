document.addEventListener("DOMContentLoaded", function () {
    var checkboxesWrapper = document.getElementById("input_11_15"); // Contenitore dei checkbox
    var checkboxes = checkboxesWrapper.querySelectorAll("input[type='checkbox']");
    
    // Crea il messaggio di errore nello stile di Gravity Forms
    var errorMessage = document.createElement("div");
    errorMessage.className = "gfield_validation_message"; // Classe predefinita di Gravity Forms
    errorMessage.style.display = "none"; // Inizialmente nascosto
    errorMessage.textContent = "Puoi selezionare al massimo 2 opzioni.";

    // Aggiunge il messaggio sotto il gruppo di checkbox
    checkboxesWrapper.appendChild(errorMessage);

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", function () {
            var checkedCount = checkboxesWrapper.querySelectorAll("input[type='checkbox']:checked").length;

            if (checkedCount > 2) {
                this.checked = false; // Deseleziona l'ultimo checkbox selezionato
                errorMessage.style.display = "block"; // Mostra il messaggio di errore
            } else {
                errorMessage.style.display = "none"; // Nasconde il messaggio se il numero è corretto
            }
        });
    });
});