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
                <td>{$producto->nombre}</td>
                <td>{$producto->descripcion}</td>
                <td>${$producto->precio}</td>
            </tr>
        </tbody>
    </table>
    
    {if $sessionCheck==true}    
        <form class="form-alta" method="POST">
            <input type="text" id="comentario" class="input_coment" placeholder="Comentario">   
            <input type="text" id="username" value="{$username}" hidden>
            <input type="number" id="id_producto" value="{$producto->id_producto}" hidden>
            <select name="puntaje" id="puntaje" required>
                <option value="1">Puntaje</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit" class="btn_coment" id="enviar" value="addComment">Enviar comentario</button>
        </form>
    {/if}
    {if $sessionCheck==false}
        <input type="number" id="id_producto" value="{$producto->id_producto}" hidden>
    {/if}
    <div id="app">
        {include "./vue/adminComments.tpl"} 
    </div>
    
    <div>
        <select name="puntaje" id="puntajeFiltro">
            <option value="0">Filtrar comentarios por puntuación</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button class="btn btn-primary" id="filter">Filtrar!</button>
    </div>
    <div>
        <a href="home" class="btn btn-dark">Inicio</a>
        <a class="btn btn-success" href="lista">Volver al catálogo</a>
    </div>
</div>
{include file='template/footer.tpl'}
