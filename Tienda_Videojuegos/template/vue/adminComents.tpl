{if ($adminCheck == true)}
{literal}
<p>admin version</p>
        <h2>Opiniones:</h2>
        <table class="table" id="tabla">
            <th>Usuario</th>
            <th>Comentario</th>
            <th>Puntaje</th>
            <th>Borrar</th>
            <tr v-for="comentario in comentarios">
                <td>{{comentario.username}}</td>
                <td>{{comentario.comentario}}</td>
                <td>{{comentario.puntaje}}</td>
                <td><button class="btn btn-danger delete" v-bind:id="comentario.id_comentario" @click="eliminarCommets">Borrar</button></td>
            </tr>
        </table>
    <!--<div v-for="comentario in comentarios">
        {{comentario.username}}
    </div>-->

<!-- <section id="comentarios-detalle">
            <form >
                <input type="number" id="estrellas" placeholder="Estrellas ">
                <input type="submit" @click= "filtrar"value="Filtrar por Estrellas">
                <input type="submit" @click="mostrarTodos"value="Todos">
            </form>
    
        <h4 class="h4-puntaje"> <i class="far fa-star"></i>| {{puntos}}</h4>
        <div v-for="comentario in comentarios">
            <div class="comentarios-detalle">
                <h4>{{comentario.username}} • <span class="hora">{{comentario.fecha}}</span> | <i class="far fa-star" title="puntaje"></i> {{comentario.puntaje}} </h4>
                <p class="p_coment">{{comentario.comentario}}</p>
                <button class="btn_eliminar btn" v-bind:id="comentario.id_comentario" @click="eliminarCommets"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div> -->
{/literal}
{else}
{literal}
<p>user version</p>
        <h2>Opiniones:</h2>
        <table class="table" id="tabla">
            <th>Usuario</th>
            <th>Comentario</th>
            <th>Puntaje</th>
            <tr v-for="comentario in comentarios">
                <td>{{comentario.username}}</td>
                <td>{{comentario.comentario}}</td>
                <td>{{comentario.puntaje}}</td>
            </tr>
        </table>
    <!-- <section id="comentarios-detalle">
        <form >
        <input type="number" id="estrellas" placeholder="Estrellas ">
        <input type="submit" @click= "filtrar"value="Filtrar por Estrellas">
        <input type="submit" @click="mostrarTodos"value="Todos">
    </form>
    <h4 class="h4-puntaje"> <i class="far fa-star"></i>| {{puntos}}</h4>
        <div v-for="comentario in comentarios">
            <div class="comentarios-detalle">
                <h4>{{comentario.username}} • |  <i class="far fa-star" title="puntaje"></i> {{comentario.puntaje}}</h4>
                <p class="p_coment">{{comentario.comentario}}</p>
            </div>
        </div>
    </section>-->
{/literal}
{/if}

 