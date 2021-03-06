{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <h1>{$titulo}</h1>
            <table class="table">
                <tbody>
                    <tr class="list-group">
                        <tr>
                            <th>Género</th>
                            {if $sessionCheck==true}
                                <th>Borrar</th>
                                <th>Editar</th>
                            {/if}
                            <th>Juegos de este género</th>
                        </tr>
                            {foreach from=$productos item=$producto}
                        <tr>
                            <td>{$producto->genre}</td>
                            {if $sessionCheck==true}
                                <td><a class="btn btn-danger" href="deleteGenre/{$producto->id_genero}">Borrar</a></td>
                                <td><a class="btn btn-success" href="mostrarEditarGenre/{$producto->id_genero}">Edit</a></td>
                            {/if}
                            <td><a class="btn btn-dark" href="listaPorGenero/{$producto->id_genero}">Juegos de este género</a></td>
                        </tr>
                    {/foreach}
                    </tr>
                </tbody>
            </table>
            </ul>
        </div>
    </div>
    {if $sessionCheck==true}
        <h4 class="alert-danger">{$error}</h4>
        <h2>Crear Género</h2>
        <form class="form-groupaction" action="createGenre" method="POST">
            <input placeholder="Género" type="text" name="genre" id="genre" required>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>
    {/if}
    <a class="btn btn-dark" href="inicio">Inicio</a>
    <a class="btn btn-success" href="lista">Volver al catálogo</a>
    {if $sessionCheck==true}
    <a class="btn btn-danger" href="logout">Logout</a>
    {/if}
</div>
{include file='template/footer.tpl'}