"use strict"
const url = 'api/comentarios';


// funcion para agregar un comentario al hacer click en el boton de enviar
let btn = document.querySelector(".enviar").addEventListener("click", addComments);

function addComments(e) {
    e.preventDefault();
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let equipo_id = document.querySelector("#id_equipo").value;
    let puntaje = document.querySelector("#puntuacion").value;
    let hoy = new Date();

    let newComment = {
        comentario: comentario,
        username: username,
        id_equipo: equipo_id,
        puntaje: puntaje,
        fecha: hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds(),
    }
    if (comentario != "") {
        fetch(url, {
                method: "POST",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(newComment)
            })
            .then(resp => resp.json())
            .then(data => {
                console.log(data);
                document.querySelector("#comentario").value = "";
                showComments(); //actualizar la lista de comentarios
            })
            .catch(error => console.log(error));
    } else {
        console.log("no se puede agregar un comentario vacio");
    }
}
//funcion para borrar un comentario
async function deleteComments(id) {
    try {
        let resp = await fetch(url + "/" + id, {
            "method": "DELETE",
        });
        if (resp.ok) {
            showComments();
            console.log("Comentario eliminado");
        }
    } catch (error) {
        console.log("error" + error);
    }
}

let app = new Vue({
    el: "#comentarios-detalle",
    data: {
        comentarios: [],
        puntos: 0.0,
    },
    methods: {
        Evento: function (id) {
            id = id.currentTarget.id;
            deleteComments(id);
        }
    },

});

//funcion que asigna el puntaje total a la variable puntos y los comentarios a la variable comentarios de la clase Vue
async function showComments(inicio = 0, limite = 5) {
    try {
        let id = document.querySelector("#id_equipo").value;
        let respuesta = await fetch(url + "/" + id);
        if (respuesta.ok) {
            let comentarios = await respuesta.json();
            app.comentarios = comentarios.slice(inicio, limite);
            app.puntos = totalPoints();
            paginacion(comentarios.length);
        } else {
            app.comentarios = [];
            app.puntos = 0.0;
        }
    } catch (error) {
        console.log("error" + error);
    }
}
showComments();

//funcion para calcular el puntaje total de los comentarios, por cada comentario se suma su puntaje
function totalPoints() {
    let puntos = 0.0;
    for (let i = 0; i < app.comentarios.length; i++) {
        puntos += Number(app.comentarios[i].puntaje);
    }
    return puntos;
}

async function paginacion(cantComentarios) {
    let contenedor = document.getElementById("btn-toolbar");
    contenedor.innerHTML = "";
    let cantPaginas = Math.ceil(cantComentarios / 5);
    for (let i = 0; i < cantPaginas; i++) {
        let btn = document.createElement("button");
        btn.setAttribute("class", "btn btn-primary");
        btn.setAttribute("id", "page" + i);
        btn.setAttribute("type", "button");
        btn.innerHTML = i + 1;
        contenedor.appendChild(btn);
        document.getElementById("page" + i).addEventListener("click", function (e) {
            showComments(i * 5, (i + 1) * 5);
        });
    }
}