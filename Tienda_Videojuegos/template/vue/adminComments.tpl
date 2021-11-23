{if ($adminCheck == true)}
{literal}
    <h2>Opiniones:</h2>
    <table class="table" id="tabla">
        <th>Usuario</th>
        <th>Comentario</th>
        <th>Puntaje</th>
        <th>Borrar</th>
        <tr v-for="comentario in comentarios" class="comentario.id_comentario">
            <td>{{comentario.username}}</td>
            <td>{{comentario.comentario}}</td>
            <td>{{comentario.puntaje}}</td>
            <td><button class="btn btn-danger delete" v-bind:id="comentario.id_comentario" @click="deleteComments">Borrar</button></td>
        </tr>
    </table>
{/literal}
{else}
{literal}
    <h2>Opiniones:</h2>
    <table class="table" id="tabla">
        <th>Usuario</th>
        <th>Comentario</th>
        <th>Puntaje</th>
        <tr v-for="comentario in comentarios" :class="comentario.id_comentario">
            <td>{{comentario.username}}</td>
            <td>{{comentario.comentario}}</td>
            <td>{{comentario.puntaje}}</td>
        </tr>
    </table>
{/literal}
{/if}

 