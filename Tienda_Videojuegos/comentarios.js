"use strict";
const url = 'api/comentarios';

// funcion para agregar un comentario al hacer click en el boton de enviar
let btn = document.querySelector(".enviar").addEventListener("click", addComment);

async function addComment(e){
    e.preventDefault();
    //hard coded data
    let comentario = "Testeo";
    let username = "Testeando";
    let id_producto = 60;
    let puntaje = 4;
    //object
    let innerData = {
        "comentario": comentario,
        "username": username,
        "id_producto": id_producto,
        "puntaje": puntaje
    }
    //comunication with api
    try {
        let res = await fetch(url, {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json"
            },
            "body": JSON.stringify(innerData)
        });
        if (res.status == 201) {
            console.log("success uwu");
            // mostrarDatos();
        } else {
            console.log("Failure");
        }
    } catch (error) {
        console.log(error);
    }

}

async function deleteComments(id){
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

async function showComments(){
    tabla.innerHTML = "";
    try {
        let res = await fetch(url);
        let json = await res.json();
        for (const iterador of json) {
            print(iterador);
            addData(iterador);
        }
    } catch (error) {
        console.log(error);
    }
}

// function addComments(e) {
//     e.preventDefault();
//     let comentario = "Testeo";
//     let username = "Testeando";
//     let id_producto = 60;
//     let puntaje = 4;
//     // let username = document.querySelector("#username").value;
//     // let comentario = document.querySelector("#comentario").value;
//     // let equipo_id = document.querySelector("#id_equipo").value;
//     // let puntaje = document.querySelector("#puntuacion").value;
//     // let hoy = new Date();

//     let newComment = {
//         comentario: comentario,
//         username: username,
//         id_producto: id_producto,
//         puntaje: puntaje,
//         // fecha: hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds(),
//     }

//     fetch(url, {
//             method: "POST",
//             headers: {
//                 'Content-type': 'application/json'
//             },
//             body: JSON.stringify(newComment)
//         })
//         .then(resp => resp.json())
//         .then(data => {
//             console.log(data);
//             document.querySelector("#comentario").value = "";
//             showComments(); //actualizar la lista de comentarios
//         })
//         .catch(error => console.log(error));
//     // if (comentario != "") {
//     // } else {
//     //     console.log("no se puede agregar un comentario vacio");
//     // }
// }
//funcion para borrar un comentario


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

//funcion que asigna el puntaje total a la variable puntos y los comentarios a la variable comentarios de la clase Vue
// async function showComments(inicio = 0, limite = 5) {
//     try {
//         let id = document.querySelector("#id_equipo").value;
//         let respuesta = await fetch(url + "/" + id);
//         if (respuesta.ok) {
//             let comentarios = await respuesta.json();
//             app.comentarios = comentarios.slice(inicio, limite);
//             app.puntos = totalPoints();
//             paginacion(comentarios.length);
//         } else {
//             app.comentarios = [];
//             app.puntos = 0.0;
//         }
//     } catch (error) {
//         console.log("error" + error);
//     }
// }
// showComments();

//funcion para calcular el puntaje total de los comentarios, por cada comentario se suma su puntaje
// function totalPoints() {
//     let puntos = 0.0;
//     for (let i = 0; i < app.comentarios.length; i++) {
//         puntos += Number(app.comentarios[i].puntaje);
//     }
//     return puntos;
// }

// async function paginacion(cantComentarios) {
//     let contenedor = document.getElementById("btn-toolbar");
//     contenedor.innerHTML = "";
//     let cantPaginas = Math.ceil(cantComentarios / 5);
//     for (let i = 0; i < cantPaginas; i++) {
//         let btn = document.createElement("button");
//         btn.setAttribute("class", "btn btn-primary");
//         btn.setAttribute("id", "page" + i);
//         btn.setAttribute("type", "button");
//         btn.innerHTML = i + 1;
//         contenedor.appendChild(btn);
//         document.getElementById("page" + i).addEventListener("click", function (e) {
//             showComments(i * 5, (i + 1) * 5);
//         });
//     }
// }