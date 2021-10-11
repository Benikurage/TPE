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
                            {$producto->nombre} | {$producto->descripcion|truncate:30}                          
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>
</div>

{include file='template/footer.tpl'}