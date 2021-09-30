{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Crear Tarea</h2>
            <form class="form-alta" action="create" method="post">
                <input placeholder="nombre" type="text" name="title" id="title" required>
                <textarea placeholder="descripcion" type="text" name="description" id="description"> </textarea>
                <input placeholder="precio" type="number" name="priority" id="priority">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
        <div class="col-md-8">
            <h1>{$titulo}</h1>

            <ul class="list-group">
                {foreach from=$productos item=$producto}
                    <li class="
                        list-group-item
                        {if $producto->nombre} nombre {/if}
                        ">
                            <a href="viewTask/{$producto->id_producto}">{$producto->nombre}</a> | {$producto->descripcion|truncate:30}
                            <a class="btn btn-danger" href="deleteTask/{$producto->id_producto}">Borrar</a>
                            {if !$producto->precio}
                                <a class="btn btn-success" href="updateTask/{$producto->id_producto}">Done</a>
                            {else}
                                <!-- <a class="btn btn-success" href="updateTask/{$task->id_tarea}">Restore</a> -->
                            {/if}
                            
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

</div>

{include file='templates/footer.tpl'}