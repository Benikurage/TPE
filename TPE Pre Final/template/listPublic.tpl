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
                            <th>Detalles</th>
                        </tr>
                        {foreach from=$productos item=$producto}
                            <tr>
                                <td>{$producto->nombre}</td>
                                <td>{$producto->descripcion|truncate:30}</td>
                                <td>${$producto->precio}</td>
                                <td>{$producto->genre}</td>
                                <td><a class="btn btn-dark" href="detail/{$producto->id_producto}">Detalles</a></td>

                            </tr>
                        {/foreach}
                    </tr>
                </tbody>
           </table>
        </div>
    </div>
    <a class="btn btn-dark" href="inicio">Inicio</a>
    <a class="btn btn-dark" href="listCategory">Listdo de géneros</a>
</div>
{include file='template/footer.tpl'}