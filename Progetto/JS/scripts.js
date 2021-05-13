let founder;

src = "https://smtpjs.com/v3/smtp.js";

    function darkMode() {
        var element = document.body;
        element.classList.toggle("dark-mode");
        document.getElementById("tt").classList.toggle('test');
        document.getElementById("email").classList.toggle('niggatext');
        document.getElementById("password").classList.toggle('niggatext');
        document.getElementById("nome").classList.toggle('niggatext');
        document.getElementById("cognome").classList.toggle('niggatext');
        document.getElementById("tel").classList.toggle('niggatext');
    }

function emailCheck() {
    var nome = document.getElementById("nome").value;
    var cognome = document.getElementById("cognome").value;
    var email = document.getElementById("email").value;
    var psw = document.getElementById("password").value;
    var tel = document.getElementById("tel").value;

    var OTP = Math.floor(Math.random() * (9999 - 1000) + 1000);
    document.getElementById('codiceNascosto').value = OTP;

    if (nome === "" || cognome === "" || psw === "" || tel.length < 10) {
        alert("Uno o più campi sono vuoti o errati, per favore compilali tutti! muccusiell");
    } else {

        document.getElementById("codice").className = "showText";
        document.getElementById("buttonCheck").className = "showBtn";
        Email.send({
            Host: "smtp.gmail.com",
            Username: "phpforgotpsw@gmail.com",
            Password: "6$Y0&2wM1%NTmdE",
            To: email,
            From: "phpforgotpsw@gmail.com",
            Subject: "OTP di conferma",
            Body: "Il codice OTP è: " + OTP
        })
            .then(function (message) {
                alert("Controlla la tua casella di posta elettronica per il codice OTP!")
            });
    }
}

function assistance(clicked) {
    document.getElementById("OVER").style.opacity="0.9";
    document.getElementById("myForm").style.display = "block";
    if (clicked === "Mattia") {
        founder = "mariobrosscot@yahoo.it"
    } else if (clicked === "Luigi") {
        founder = "luigi.solaro@yahoo.com"
    } else {
        founder = "difendiamolanoia@gmail.com"
    }
    console.log(founder);
}

function sendAssistance(){
    let EA = document.getElementById("EA").value;
    let msg = document.getElementById("msg").value;
    console.log(founder);
    console.log(EA);
    console.log(msg);

    if (EA === "" || msg === "")
        alert("Un campo è vuoto, riprovare!")
    else {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "phpforgotpsw@gmail.com",
            Password: "6$Y0&2wM1%NTmdE",
            To: founder,
            From: EA,
            Subject: "Richiesta di assistenza",
            Body: msg,
        })
            .then(function (message) {
                alert("Email inviata con successo!")
            });
    }
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function utente() {
    document.getElementById("UTENTE").innerHTML = " Test";
}