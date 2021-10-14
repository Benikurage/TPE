{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <h1>{$titulo}</h1>
            <table class ="table">
                <tbody>
                    <tr class="list-group">
                        <tr>
                            <th>Género</th>
                            {if isset($logged)}
                                <th>Borrar</th>
                                <th>Editar</th>
                                <th>Juegos de este género</th>
                            {/if}
                        </tr>
                        {foreach from=$productos item=$producto}
                            <tr>
                                <td>{$producto->genre}</td>
                                {if isset($logged)}
                                    <td><a class="btn btn-danger" href="deleteGenre/{$producto->id_genero}">Borrar</a></td>
                                    <td><a class="btn btn-success" href="mostrarEditarGenre/{$producto->id_genero}">Edit</a></td>
                                    <td><a class="btn btn-dark" href="listaPorGenero/{$producto->id_genero}">Juegos de este género</a></td>
                                {/if}
                            </tr>
                        {/foreach}
                    </tr>
                </tbody>
           </table>
           </ul>
        </div>
    </div>

    {if isset($logged)}
    <h2>Crear Género</h2>
        <form class ="form-groupaction" action="CreateGenre" method="POST">
            <input placeholder="Posición" type="number" name="id_genero" id="id_genero" required>
            <input placeholder="Género" type="text" name="genre" id="genre" required>
            <input type="submit" class="btn btn-primary" value="Guardar">
         </form>
    {/if}
    <a class="btn btn-dark" href="inicio">Inicio</a>
    <a class="btn btn-success" href="lista">Volver al catálogo</a> 
</div>
{include file='template/footer.tpl'}