// Speichert, ob Fehler aufgetreten sind
var hasErrors = false;

// Sucht alle Elemente mit Fehlermeldungen (Klassen "labelError" und "checkboxError") und entfernt diese aus dem DOM-Baum bzw. löscht deren Inhalt
function clearErrors() {
    // Suche alle Elemente im Dokument mit der Klasse "labelError" (ergibt ein Array)
    var labelErrors = document.getElementsByClassName("labelError");
    // Iteriere so lange über das Array, solange Einträge darin sind (Länge ist > 0)
    while (labelErrors.length > 0) {
        // Tipp: Da man nur Kindknoten entfernen kann, greife über parentNode auf den Elternknoten des 1. Elements im Array
        // zu und lösche dann mit removeChild wieder den eigentlichen Knoten (die anderen rücken im Array nach)
        labelErrors[0].parentNode.removeChild(labelErrors[0]);
    }

    // Suche nun das Element mit der Klasse "checkboxError" bzw. der ID "checkboxErrorField"
    var checkboxError = document.getElementById("checkboxErrorField");
    // Lösche den Inhalt des Elements
    checkboxError.textContent = "";

    // Setze hasErrors auf false
    hasErrors = false;
}

// Setzt ein <em>-Element mit der Fehlermeldung message in das Label des <input>-Elements mit der übergebenen id
function setLabelErrorMessage(id, message) {
    // Erzeuge ein neues <em>-Element
    var em = document.createElement("em");
    // Setze die Klasse "labelError" (zur leichteren Formatierung mit CSS)
    em.className = "labelError";
    // Setze die im Parameter message mitgegebene Fehlermeldung als Textinhalt des <em>-Elements
    em.textContent = message;
    // Suche das <input>-Element mit der als Parameter mitgegebenen id
    var input = document.getElementById(id);
    // Greife auf das vorangehende Geschwisterelement <label> zu und hänge das neue <em> hinein
    // Tipp: Die Eigenschaft previousElementSibling ist hilfreicher als previousSibling alleine,
    // da sie das vorangehende Element auswählt und nicht etwa dazwischenliegende Textknoten
    input.previousElementSibling.appendChild(em);
    // Setze hasErrors auf true
    hasErrors = true;
}

function setCheckboxErrorMessage() {
    // Suche das <div> mit der ID "checkBoxError
    var errorDiv = document.getElementById("checkboxErrorField");
    // Setze die Fehlermeldung, dass mindestens 1 Checkbox ausgewählt werden muss als Textinhalt des <div>-Elements
    errorDiv.textContent = "Es muss mindestens 1 Checkbox ausgewählt werden";
    // Setze hasErrors auf true
    hasErrors = true;
}

// Überprüft, ob ein übergebener Wert eine Ganzzahl ist
function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n) && n % 1 === 0;
}

// Überprüft, ob die Formularfelder korrekt ausgefüllt sind
function isValid() {
    // Lösche zunächst eventuell vorhandene Fehlermeldungen
    clearErrors();

    // Beginne nun mit Validierungs-Checks...

    // Frage den Inhalt des Feldes für den Benutzernamen ab
    var checkboxCounter = 0;

    var username = document.getElementById("username").value;
    // Frage alle anderen Inhalte ab, die validiert werden müssen

    var email = document.getElementById("email").value;
    var plz = document.getElementById("plz").value;
    var passwort1 = document.getElementById("passwort1").value;
    var passwort2 = document.getElementById("passwort2").value;

    // Check: Name is Plichtfeld - Überprüfen ob Länge 0 ist
    if (username.length === 0) {
        // Fehlermeldung ins Label des <input>-Elements mit der ID "username" setzen.
        setLabelErrorMessage("username", "Kein Benutzername gewählt!");
    }

    // E-Mail-Adresse darf nicht leer sein
    if (email.length === 0) {
        setLabelErrorMessage("email", "Keine E-Mail-Adresse angegeben!");
    }

    // E-Mail-Adresse muss @ enthalten
    if (email.length !== 0 && email.indexOf("@") === -1) {
        setLabelErrorMessage("email", "E-Mail-Adresse ist ungültig.");
    }

    // Postleitzahl nur Zahlen sind erlaubt
    if (plz.length !== 0 && !isNumber(plz)) {
        setLabelErrorMessage("plz", "Nur Zahlen eingeben!");
    }

    // Zahl muss vierstellig sein
    if (isNumber(plz) && plz.length !== 4) {
        setLabelErrorMessage("plz", "Nur 4-stellige Zahlen eingeben!");
    }

    // Passwort muss mind. 5 Zeichen haben
    if (passwort1.length < 5) {
        setLabelErrorMessage("passwort1", "Das Passwort muss mindestens 5 Zeichen lang sein.");
    }

    // Text Wiederholung muss mit Passwort übereinstimmen
    if (passwort2 !== passwort1) {
        setLabelErrorMessage("passwort2", "Die Passwörter stimmen nicht überein!");
    }

    // mindestens eine von fünf Boxen muss angehackt sein
    for (var i = 1; i <= 5; i++) {
        if (document.getElementById("hardware" + i).checked) {
            checkboxCounter++;
        }
    }

    if (checkboxCounter < 1) {
        setCheckboxErrorMessage();
    }

    // Falls Fehler aufgetreten sind ...
    if (hasErrors) {
        // Formular Abschicken unterdrücken
        return false;
    }
    else {
        // ... wenn alles OK, Formluar abschicken
        return true;
    }

}

// Sicherheitsabfrage bei Reset
function resetCheck() {
    // Frage ab, ob Reset gewünscht ist und speichere Ergebnis zwischen
    var reset = window.confirm("Do you want to reset your input?");
    // Wenn reset gewünscht wurde, lösche auch alle Fehlermeldungen mit clearErrors()
    if (reset) {
        clearErrors();
    }
    // Gib das Ergebnis zurück (true führt reset aus, false nicht)
    return reset;
}

// Wenn der DOM-Baum fertig aufgebaut ist, ...
window.onload = function () {
    // Frage das Formular ab
    var form = document.getElementById("registerform");
    // Führe beim Absenden isValid() aus
    form.onsubmit = isValid;
    // Führe beim Reset resetCheck() aus
    form.onreset = resetCheck;
};