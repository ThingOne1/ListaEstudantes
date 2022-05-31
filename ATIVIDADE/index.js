function Escolas() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "app/controller/Escolas.php?carregar=1");
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectEscolas = document.getElementById("nome_escola");
        selectEscolas.innerHTML = resposta;
    }
    xhttp.send();
}

function Calendario(value) {
    window.nomeEscola = value;
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "app/controller/Calendario.php?id=" + nomeEscola);
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectCalendario = document.getElementById("calendario");
        selectCalendario.innerHTML = resposta;
    }
    xhttp.send();
}

function Etapas(value) {
    window.calendarioEscola = value;
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "app/controller/Etapas.php?id=" + nomeEscola);
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectEtapas = document.getElementById('Etapas');
        selectEtapas.innerHTML = resposta;
    }
    xhttp.send();
}

function Turmas(value) {
    window.EtapasEscola = value;
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "app/controller/Turmas.php?id_escola=" + nomeEscola + "&id_calendario=" + calendarioEscola + "&id_etapa=" + EtapasEscola);
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectTurmas = document.getElementById('Turmas');
        selectTurmas.innerHTML = resposta;
    }
    xhttp.send();
}

function Alunos(value) {
    window.TurmasEscola = value;
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "app/controller/Alunos.php?id_escola=" + nomeEscola + "&id_calendario=" + calendarioEscola + "&id_turma=" + TurmasEscola);
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectAlunos = document.getElementById('Alunos');
        selectAlunos.innerHTML = resposta;
    }
    xhttp.send();
}

function Edit(value) {
    let elmento = value;
    let tr = elmento.closest('tr');
    window.edit = tr.id;
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "app/controller/editar.php?id_escola=" + nomeEscola + "&id_calendario=" + calendarioEscola + "&id_turma=" + TurmasEscola + "&id_edit=" + edit);
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectAlunos = document.getElementById('Alunos');
        selectAlunos.innerHTML = resposta;
    }
    xhttp.send();
}

function Update() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "editarup.php?");
    xhttp.onload = function() {
        let resposta = xhttp.responseText;
        let selectAlunos = document.getElementById('Update');
        selectAlunos.innerHTML = resposta;
    }
    xhttp.send();
}