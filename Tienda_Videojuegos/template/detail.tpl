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
                <td>{$producto->precio}</td>
                <td>{$producto->descripcion}</td>
            </tr>
        </tbody>
    </table>
    
    {if $sessionCheck==true}    
        <form class="form-alta" method="POST">
            <input type="text" id="comentario" class="input_coment" placeholder="Comentario">   
            <input type="text" id="username" value="{$usuario}" hidden>
            <input type="number" id="id_producto" value="{$producto->id_producto}" hidden>
            <select name="puntaje" id="puntaje" required>
                <option value="1">Puntaje</option>
                <option class="mayusc" value="1">1</option>
                <option class="mayusc" value="2">2</option>
                <option class="mayusc" value="3">3</option>
                <option class="mayusc" value="4">4</option>
                <option class="mayusc" value="5">5</option>
            </select>
            <button type="submit" class="btn_coment enviar" value="addComment">Enviar comentario</button>
        </form>
    {/if}

    <div id="app">
        {include "./vue/adminComments.tpl"} 
    </div>
    <div>
        <a href="home" class="btn btn-dark">Inicio</a>
        <a class="btn btn-success" href="lista">Volver al catálogo</a>
    </div>
</div>
{include file='template/footer.tpl'}
