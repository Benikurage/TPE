<div class="container">

    <div class="row mt-4">
        <div class="col-md-8">
            
            <h1>{$titulo}</h1>
            <table class ="table " >
                <thead>
                    <tr>
                       <th>nombre</td>                   
                    </tr>
                </thead>
                <tbody>
                    <tr class="list-group">
                        {foreach from=$productos item=$producto}
                            <td class="
                                list-group-item
                                {if $producto->nombre} nombre {/if}
                                ">
                                    <td>{$producto->nombre} 
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
    </div>
</div>