{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Editar Producto</h2>
            <form class="form-alta" action="update" method="POST">
                <input type="hidden" name="id_producto" value="{$producto}">
                <input placeholder="Nombre" type="text" name="nombre" id="nombre" required>
                <input placeholder="Descripción" type="text" name="descripcion" id="descripcion">
                <input placeholder="Precio" type="number" name="precio" id="precio">
                <br>
                <select name="genero" id="genero" required>
                    <option value="">Elija el género</option>
                    {foreach from=$generos item=$genero}
                        <option class="mayusc" value="{$genero->id_genero}">{$genero->genre}</option>
                    {/foreach}
                </select>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" value="Editar">
            </form>
        </div>
    </div>
    <a class="btn btn-success" href="lista">Volver al catálogo</a>
</div>
{include file='template/footer.tpl'}