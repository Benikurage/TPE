{include file='template/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-8">
            <h1>{$titulo}</h1>

            <ul class="list-group">
                {foreach from=$productos item=$producto}
                    <li class="
                        list-group-item
                        {if $producto->nombre} nombre {/if}
                        ">
                            <a href="view/{$producto->id_producto}">{$producto->nombre}</a> | {$producto->descripcion|truncate:30}                          
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

</div>

{include file='template/footer.tpl'}