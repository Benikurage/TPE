"use strict";
const url = 'api/comentarios';


function listen() {
    try {
        let btn = document.querySelector("#enviar").addEventListener("click", createComment);
    } catch (error) {
        console.log(error);
    }
    let btnShowComments = document.querySelector("#filter").addEventListener("click", filterCommentsByScore);
    let tabla = document.querySelector("#resumen");
}

async function createComment(e) {
    e.preventDefault();
    let data = getData();
    let showError = document.querySelector("#error");

    if (data.comentario != "") {
        try {
            let res = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            });
            if (res.ok) {
                // console.log(JSON.stringify(data));
                console.log("Success");
                app.error = "";
                showComments();
            } else {
                // console.log(JSON.stringify(data));
                console.log("Failure");
            }
        } catch (error) {
            console.log(error);
        }
    } else {
        app.error = "No se puede agregar un comentario vacío!";
    }
}

function getData() {
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let id_producto = document.querySelector("#id_producto").value;
    let puntaje = document.querySelector("#puntaje").value;

    let data = {
        comentario: comentario,
        nombre: username,
        id_producto: id_producto,
        puntaje: puntaje
    }

    return data;
}

async function showComments() {
    let id = document.querySelector("#id_producto").value;
    try {
        let res = await fetch(`${url}/${id}/`);
        if (res.status == 200) {
            console.log(res);
            let comments = await res.json();
            app.comentarios = comments;
        } else if (res.status == 204){
            app.comentarios = '';
        }
    } catch (error) {
        console.log(error);
    }
}

let app = new Vue({
    el: "#app",
    data: {
        comentarios: [],
        error: '',
    },
    methods: {
        deleteComments: function (id) {
            id = id.currentTarget.id;
            deleteComment(id);
        },
    }
});

async function deleteComment(id) {
    try {
        let res = await fetch(`${url}/${id}`, {
            "method": "DELETE",
        });
        if (res.status == 200) {
            console.log("Comentario eliminado");
            showComments();
        }
    } catch (error) {
        console.log("error" + error);
    }
}

async function filterCommentsByScore(e) {
    e.preventDefault();
    
    let id = document.querySelector("#id_producto").value;
    let score = document.querySelector("#score").value;
    
    if (score!=0) {
        try {
            let res = await fetch(`${url}/${id}/${score}/`);
            console.log(res);
            if (res.status == 200) {
                let comments = await res.json();
                app.comentarios = comments;
            } else if(res.status == 204){
                app.comentarios = "";
            }
        } catch (error) {
            console.log(error);
        }        
    } else {
        showComments();
    }
}

showComments();
listen();