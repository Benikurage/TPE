{include file='template/header.tpl'}
<div class="container">
    <h1>Detalles del producto</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="td-equipo">
                <td >{$producto->nombre}</td>
                <td >{$producto->precio}</td>
                <td >{$producto->descripcion}</td>
            </tr>
        </tbody>
    </table>
    
    <form class="form-alta" method="POST">
        <input type="text" id="comentario" class="input_coment" placeholder="Comentario">   
        <input type="text" id="username" value="{$usuario}" hidden>
        <input type="number" id="id_producto" value="{$producto->id_producto}" hidden>
        <select name="puntaje" id="puntaje" required>
            <option>Puntaje</option>
            <option class="mayusc" value="1">1</option>
            <option class="mayusc" value="2">2</option>
            <option class="mayusc" value="3">3</option>
            <option class="mayusc" value="4">4</option>
            <option class="mayusc" value="5">5</option>
        </select>

        <button type="submit" class="btn_coment enviar" value="addComment">Enviar comentario</button>
        {* <input type="submit" class="btn_coment enviar" value="Enviar comentario"> *}
    </form>

    <div>
        <h2>Opiniones:</h2>
        <table class="table" id="tabla">
            <tbody>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Puntaje</th>
                <th>ID</th>
                {* {if isset($admin)} *}
                    {* <th>Borrar</th> *}
                {* {/if} *}
                {* {foreach from=$comentarios item=$comentario}
                    <tr>
                        <td>{$comentario->username}</td>
                        <td>{$comentario->comentario}</td>
                        <td>{$comentario->puntaje}</td>
                        <td>{$comentario->id_comentario}</td>
                        <button type="submit" class="btn_coment enviar" value="deleteComment">Borrar</button> *}

                        {* <td><a class="btn btn-danger" href="deleteComment/{$comentario->id_comentario}">Borrar</a></td> *}
                        {* <td><a class="btn btn-dark" href="listaPorGenero/{$comentario->id_comentario}">Juegos de este género</a></td> *}

                        {* <td>{$comentario->descripcion|truncate:30}</td>
                        <td>{$comentario->puntaje}</td> *}
                        {* {if isset($admin)}
                            <td><a class="btn btn-danger" href="delete/{$comentario->id_comentario}">Borrar</a></td>
                        {/if} *}
                    {* </tr>
                {/foreach} *}
            </tbody>
        </table>

    {* <div class="comentarios">
        <h2>Comentarios</h2>
        <section>            
            {if $SESSION != null}
                <form class="form_comentarios" method="post" >
                    <input type="text" id="comentario" class="input_coment" placeholder="Comentario">   
                    <input type="hidden" id="nombre" value="{$usuario->nombre}">
                    <input type="text" id="nombre" value="{$usuario}">
                    <input type="hidden" id="id_equipo" value="{$producto->id_producto}">
                    <button type="submit" class="btn_coment enviar" value="insertComment">Enviar comentario</button>   
                    <label class="p_coment">Puntaje 1 • 5</label>
                    <div class= "div-puntaje">
                        <input id="puntuacion" type="range" min="1" max="5" step="1" value="5" >
                        <div>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>         
                </form>
            {else}
                <button class="hidden"></button>
                <input type="hidden" id="id_producto"  value="{$producto->id_producto}"  >  
            {/if}
        </section>
    <div>
    <a href="home" class="btn btn-dark">Inicio</a>
    <a class="btn btn-success" href="lista">Volver al catálogo</a>*}
</div>
{include file='template/footer.tpl'}
