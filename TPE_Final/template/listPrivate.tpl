{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8"> 
            <h1>{$titulo}</h1>
            <table class ="table">
                <tbody>
                    <tr class="list-group">
                        <tr>
                            <th>Juego</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Género</th>
                            {* {if isset($logged)} *}
                                <th>Borrar</th>
                                <th>Editar</th>
                                <th>Detalles</th>
                            {* {/if} *}
                        </tr>
                        {foreach from=$productos item=$producto}
                            <tr>
                                <td>{$producto->nombre}</td>
                                <td>{$producto->descripcion|truncate:30}</td>
                                <td>${$producto->precio}</td>
                                <td>{$producto->genre}</td>
                                {* {if isset($logged)} *}
                                    <td><a class="btn btn-danger" href="delete/{$producto->id_producto}">Borrar</a></td>
                                    <td><a class="btn btn-success" href="mostrareditar/{$producto->id_producto}">Edit</a></td>
                                    <td><a class="btn btn-dark" href="detail/{$producto->id_producto}">Detalles</a></td>
                                {* {/if} *}
                            </tr>
                        {/foreach}
                    </tr>
                </tbody>
           </table>
        </div>
        <div>
        {* {if isset($logged)} *}
            <h2>Crear Producto</h2>
            <form class ="form-groupaction" action="create" method="POST">
                <input placeholder="Nombre" type="text" name="nombre" id="nombre" required>
                <input placeholder="Descripción" type="text" name="descripcion" id="descripcion" required>
                <input placeholder="Precio" type="number" name="precio" id="precio" required>
                <select name="genero" id="genero" required>
                <option value="">Elija el género</option>
                {foreach from=$generos item=$genero}
                    <option class="mayusc" value="{$genero->id_genero}">{$genero->genre}</option>
                {/foreach}
                </select>

                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
            {* <a class="btn btn-danger" href="logout">Logout</a> *}
        {* {/if} *}
            <a class="btn btn-dark" href="inicio">Inicio</a>
            <a class="btn btn-dark" href="listCategory">Listdo de géneros</a>
        </div>
    </div>
</div>

{include file='template/footer.tpl'}