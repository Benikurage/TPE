{include file='template/header.tpl'}
<div class="container">

    <div class="row mt-4">
        <div class="col-md-8">  
            <h1>Listado de Genero</h1>
            <table class ="table">
                {* <thead>
                    <tr>
                       <th>nombre</td>                   
                    </tr>
                </thead> *}
                <tbody>
                    <tr class="list-group">
                        {foreach from=$generos item=$genero}
                            <td class="
                                list-group-item
                                {if $genero->nombre} nombre {/if}
                                ">
                                    <td>{$genero->nombre} | {$genero->descripcion} 
                                        <a class="btn btn-danger" href="deleteGenre/{$genero->id_genero}">Borrar</a>
                                        <a class="btn btn-success" href="mostrarEditarGenre/{$genero->id_genero}">Edit</a>
                                    </td>                      
                            </td>
                        {/foreach}
                    </tr>
                </tbody>
           </table>
        </div>
        <div>
            <h2>Crear Genero</h2>
            <form class ="form-groupaction" action="CreateGenre" method="POST">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <textarea placeholder="descripcion" type="text" name="descripcion" id="descripcion"> </textarea>
                <input type="submit" class="btn btn-primary" value="Guardar Genero">
            </form>
            <a class="btn btn-dark" href="inicio">Inicio</a>
            <a class="btn btn-success" href="lista">Ver Catálogo</a>
        </div>
    </div>

</div>