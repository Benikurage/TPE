{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <h1>{$genero->genre}</h1>
            <table class ="table">
                <tbody>
                    <tr class="list-group">
                    <tr>
                        <th>Juego</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Detalles</th>
                    </tr>
                    {foreach from=$productos item=$producto}
                        <tr>
                            <td>{$producto->nombre}</td>
                            <td>{$producto->descripcion|truncate:30}</td>
                            <td>${$producto->precio}</td>
                            <td><a class="btn btn-dark" href="detail/{$producto->id_producto}">Detalles</a></td>

                        </tr>
                    {/foreach}
                </tbody>
           </table>
        </div>
    </div>
    <a class="btn btn-dark" href="inicio">Inicio</a>
    <a class="btn btn-dark" href="listCategory">Volver a géneros</a>
    <a class="btn btn-success" href="lista">Volver al catálogo</a>

</div>
{include file='template/footer.tpl'}