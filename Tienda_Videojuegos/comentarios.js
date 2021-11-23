"use strict";
const url = 'http://localhost/TPE/TPE/tienda_videojuegos/api/comentarios/';
// const url = 'api/comentarios';

// funcion para agregar un comentario al hacer click en el boton de enviar
let btn = document.querySelector(".enviar").addEventListener("click", createComment);
let tabla = document.querySelector("#tabla");

async function createComment(e) {
    e.preventDefault();

    //data
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let id_producto = document.querySelector("#id_producto").value;
    let puntaje = document.querySelector("#puntaje").value;

    //object
    let innerData = {
        comentario: comentario,
        username: username,
        id_producto: id_producto,
        puntaje: puntaje
    }

    // comunication with api
    if (comentario!="") {
        try {
            let res = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(innerData)
            });
            if (res.ok) {
                console.log(JSON.stringify(innerData));
                console.log("Success");
                showComments();
            } else {
                console.log("Failure");
                console.log(res.status);
                console.log(JSON.stringify(innerData));
            }
        } catch (error) {
            console.log(error);
        }
    } else {
        console.log("no se puede agregar un comentario vacio");
    }
}

async function showComments() {
    tabla.innerHTML = "";
    try {
        let res = await fetch(url);
        let json = await res.json();
        for (const iterator of json) {
            print(iterator);
        }
        listenDelete();
    } catch (error) {
        console.log(error);
    }
}

function print(element) {
    let id_producto = document.querySelector("#id_producto").value;

    if (id_producto==element.id_producto) {
        tabla.innerHTML +=
        `<tr>
            <td>${element.username}</td>
            <td>${element.comentario}</td>
            <td>${element.puntaje}</td>
            <td>${element.id_comentario}</td>
            <td><button class="btn btn-danger delete" data-id="${element.id_comentario}">Borrar</button></td>
        </tr>`;
    }
}
function listenDelete(){
    let listenDelete = document.querySelectorAll(".delete");
        listenDelete.forEach((listenDelete) => {
        listenDelete.addEventListener("click", deleteComment);
    });
}
showComments();

async function deleteComment() {
    try {
        let id = this.dataset.id;
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