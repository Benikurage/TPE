"use strict"
const url = 'api/comentarios';


// funcion para agregar un comentario al hacer click en el boton de enviar
let btn = document.querySelector(".enviar").addEventListener("click", addComments);

 function addComments(e) {
    e.preventDefault();
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let producto_id = document.querySelector("#id_producto").value;
    let puntaje = document.querySelector("#puntuacion").value;
    let hoy = new Date();
   
    let nuevoComentario = {
        comentario: comentario,
        username: username,
        id_producto: producto_id,
        puntaje: puntaje,
        fecha: hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds(),
    }
    if ( comentario != "") {
        fetch(url, {
            method: "POST",
            headers: { 'Content-type': 'application/json' },
            body: JSON.stringify(nuevoComentario)
        })
        .then(resp => resp.json())
            .then(data => {
            console.log(data);
            document.querySelector("#comentario").value = "";
            showComments();    //actualizar la lista de comentarios
        })
        .catch(error => console.log(error));
        }
    else{
        console.log("no se puede agregar un comentario vacio");
    }
}
//funcion para borrar un comentario
async function deleteComments(id) {
    try {
        let resp = await fetch(url+"/"+id, {
            "method": "DELETE",
        });
        if (resp.ok) {
            showComments();
            console.log("comentario eliminado");
        }
    }
    catch (error) {
        console.log("error" + error);
    }
}
//
let app = new Vue({
    el: "#comentarios-detalle",
    data: {
        comentarios: [],
        puntos: 0.0,
    },
    methods: {
        eliminarCommets: function (id) {
            id = id.currentTarget.id;
            deleteComments(id);
        },
        filtrar: function (e) {
            filterCommentsByScore(e);
        },
        mostrarTodos: function (e) {
            e.preventDefault();
            showComments();
        }
    }, 

});

//funcion que asigna el puntaje total a la variable puntos y los comentarios a la variable comentarios de la clase Vue
async function showComments(inicio = 0) {
    try{
        let id = document.querySelector("#id_producto").value;
        let comments = await fetch(url+"/"+id+"/"+inicio);
        if(comments.ok) {
            let totalComentarios = await comments.json();
            app.comentarios = totalComentarios;
            app.puntos= totalPoints();
            paginacion(parseInt(totalComentarios[0].id_comentario));
        }
        else{
            app.comentarios = [];
            app.puntos= 0.0;
        }
    }
    catch (error) {
        console.log("ERROR CATCH " + error);
    }
}
showComments();


async function getCommentsCount (id) {
    try {
        let count = await fetch(url+"/"+id+"/COUNT");
        if (count.ok) {
            let cantidad = await count.json();
            return cantidad;
        }
        else {
            return 0;
        }
    } 
    catch (error) {
        console.log("error" + error);
    }
}

//funcion para calcular el puntaje total de los comentarios, por cada comentario se suma su puntaje
function totalPoints(){
    let puntos = 0.0;
    for (let i = 0; i < app.comentarios.length; i++) {
        puntos += Number(app.comentarios[i].puntaje);
    }
    return puntos;
}

async function paginacion(pos) {
    let contenedor = document.getElementById("btn-toolbar");
    contenedor.innerHTML = "";
    
    let btnAnt = document.createElement("button");
    btnAnt.setAttribute("class", "btn-primary");
    btnAnt.setAttribute("id", "atrasBtn");
    btnAnt.setAttribute("type", "button");
    btnAnt.innerHTML = "< anterior";
    let btnSig = document.createElement("button");
    btnSig.setAttribute("class", "btn-primary");
    btnSig.setAttribute("id", "adelanteBtn");
    btnSig.setAttribute("type", "button");
    btnSig.innerHTML = "siguiente >";
    contenedor.appendChild(btnAnt);
    document.getElementById("atrasBtn").addEventListener("click", function (e) {
        e.preventDefault();
        showComments(pos - 5);
    });
    contenedor.appendChild(btnSig);
    document.getElementById("adelanteBtn").addEventListener("click", function (e) {
        e.preventDefault();
        showComments(pos + 5);
    });
}

async function filterCommentsByScore(e) {
    e.preventDefault();
    let puntaje = document.querySelector("#estrellas").value;
    let id = document.querySelector("#id_producto").value;
    try{
        let estrellas = await fetch(url + "/" + id + "/" + puntaje);
        if (estrellas.ok) {
            let comentarios = await estrellas.json();
            app.comentarios = comentarios;
            app.puntos = totalPoints();
        }
    }
    catch (error) {
        console.log("error" + error);
    }
}


