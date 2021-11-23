"use strict";
// const url = 'http://localhost/TPE/TPE/tienda_videojuegos/api/comentarios/';
const url = 'api/comentarios';

// funcion para agregar un comentario al hacer click en el boton de enviar
let btn = document.querySelector(".enviar").addEventListener("click", createComment);
console.log(id_producto);
let tabla = document.querySelector("#resumen");

async function createComment(e) {
    e.preventDefault();
    let data = getData();
    if (data.comentario!="") {
        try {
            let res = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            });
            if (res.ok) {
                console.log(JSON.stringify(data));
                console.log("Success");
                showComments();
            } else {
                console.log(JSON.stringify(data));
                console.log("Failure");
                console.log(res.status);
            }
        } catch (error) {
            console.log(error);
        }
    } else {
        console.log("No se puede agregar un comentario vacio");
    }
}

function getData() {
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let id_producto = document.querySelector("#id_producto").value;
    let puntaje = document.querySelector("#puntaje").value;

    let data = {
        comentario: comentario,
        username: username,
        id_producto: id_producto,
        puntaje: puntaje
    }

    return data;
}

async function showComments() {
    try {
        let res = await fetch(url);
    if (res.ok) {
        let comments = await res.json();
        let filteredComments = filterIdProduct(comments);
        app.comentarios = filteredComments;
    }
    } catch (error) {
        console.log(error);
    }
}

function filterIdProduct(comments){
    let id_producto = document.querySelector("#id_producto").value;
    let filteredComments = [];

    for (let i = 0; i < comments.length; i++) {
        if(id_producto==comments[i].id_producto)
            filteredComments.push(comments[i]);
    }

    return filteredComments;
}

let app = new Vue({
    el: "#app",
    data: {
        comentarios: [],
    },
    methods: {
        deleteComments: function (id) {
            id = id.currentTarget.id;
            deleteComment(id);
        },
    }
});

async function deleteComment(id){
    try {
        let res = await fetch(`${url}/${id}`, {
            "method": "DELETE",
        });
        if (res.ok) {
            showComments();
            console.log("Comentario eliminado");
        }
    } catch (error) {
        console.log("error" + error);
    }
}

showComments();