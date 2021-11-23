"use strict";
// const url = 'http://localhost/TPE/TPE/tienda_videojuegos/api/comentarios/';
const url = 'api/comentarios';

// funcion para agregar un comentario al hacer click en el boton de enviar
let btn = document.querySelector(".enviar").addEventListener("click", createComment);
let tabla = document.querySelector("#resumen");

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
        console.log("No se puede agregar un comentario vacio");
    }
}

async function showComments() {
    try {
        let res = await fetch(url);
    if (res.ok) {
        let comments = await res.json();
        app.comentarios = comments;
        // listenDelete();
    }
    } catch (error) {
        console.log(error);
    }
    // console.log("uwu");
    // tabla.innerHTML = "";
    // try {
    //     let res = await fetch(url);
    //     let json = await res.json();
    //     for (const iterator of json) {
    //         print(iterator);
    //     }
    //     listenDelete();
    // } catch (error) {
    //     console.log(error);
    // }
}
let app = new Vue({
    el: "#app",
    data: {
        comentarios: [],
    },
    methods: {
        eliminarCommets: function (id) {
            id = id.currentTarget.id;


            deleteComment(id);
        },
    }
});
function print(element) {
    let id_producto = document.querySelector("#id_producto").value;

    if (id_producto==element.id_producto) {
        tabla.innerHTML +=
        `<tr>
            <td>${element.username}</td>
            <td>${element.comentario}</td>
            <td>${element.puntaje}</td>
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

async function deleteComment(id){
    // let id = this.dataset.id;
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

//vue.js

// let app = new Vue({
//     el: "#comentarios-detalle",
//     data: {
//         comentarios: [],
//         puntos: 0.0,
//     },
//     methods: {
//         Evento: function (id) {
//             id = id.currentTarget.id;
//             deleteComments(id);
//         }
//     },
// });

// let app = new Vue({
//     el: "#app",
//     data: {
//         titulo: "Lista de tareas CSR",
//         subtitulo: "Esta lista de tareas se renderiza desde JS usando Vue",

//         tareas: [], // this->smarty->assign("tareas",  $tareas)
//     },
// }); 
showComments(); 

