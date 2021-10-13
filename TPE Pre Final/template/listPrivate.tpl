{include file='template/header.tpl'}
<div class="container">

    <div class="row mt-4">
        <div class="col-md-8"> 
            <h1>{$titulo}</h1>
            <table class ="table">
                <tbody>
                    <tr class="list-group">
                        {foreach from=$productos item=$producto}
                                    <td>{$producto->nombre} | {$producto->descripcion|truncate:30} | {$producto->nombre} | {*genero*}
                                        <a class="btn btn-danger" href="delete/{$producto->id_producto}">Borrar</a>
                                        <a class="btn btn-success" href="mostrareditar/{$producto->id_producto}">Edit</a>
                                        <a class="btn btn-dark" href="detail/{$producto->id_producto}">Detalles</a>  
                                    </td>                      
                            </td>
                        {/foreach}
                    </tr>
                </tbody>
           </table>
        </div>
        <div>
            <h2>Crear Producto</h2>
            <form class ="form-groupaction" action="create" method="POST">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <input placeholder="descripcion" type="text" name="descripcion" id="descripcion">
                <input placeholder="precio" type="number" name="precio" id="precio">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
            <a class="btn btn-dark" href="inicio">Inicio</a>
            <a class="btn btn-dark" href="listCategory">Listdo de juegos por género</a>
            <a class="btn btn-danger" href="logout">Logout</a>
        </div>
    </div>

</div>

{include file='template/footer.tpl'}