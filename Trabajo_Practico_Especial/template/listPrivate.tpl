{include file='template/header.tpl'}
<div class="container">

    <div class="row mt-4">
        <div class="col-md-8">
            
            <h1>{$titulo}</h1>
            <table class ="table">
                {* <thead>
                    <tr>
                       <th>nombre</td>                   
                    </tr>
                </thead> *}
                <tbody>
                    <tr class="list-group">
                        {foreach from=$productos item=$producto}
                            <td class="
                                list-group-item
                                {if $producto->nombre} nombre {/if}
                                ">
                                    <td><a href="view/{$producto->id_genero}">{$producto->nombre}</a> 
                                        <a class="btn btn-danger" href="delete/{$producto->id_genero}">Borrar</a>
                                        <a class="btn btn-success" href="mostrareditar/{$producto->id_genero}">Edit</a>
                                        <a class="btn btn-dark" href="detail/{$producto->id_genero}">Detalles</a>  
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
                <textarea placeholder="descripcion" type="text" name="descripcion" id="descripcion"> </textarea>
                <input placeholder="precio" type="number" name="precio" id="precio">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
            <a class="btn btn-dark" href="inicio">Inicio</a>
            <a class="btn btn-dark" href="logout">Logout</a>
            <a class="btn btn-dark" href="genero">Listado de juegos por género</a>
        </div>
    </div>

</div>

{include file='template/footer.tpl'}