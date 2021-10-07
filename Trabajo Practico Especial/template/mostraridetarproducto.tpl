{include file='template/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Crear Tarea</h2>
            <form class="form-alta" action="update"  method="POST">
                <input type="hidden" name="idProducto" value="{$producto}">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <textarea placeholder="descripcion" type="text" name="descripcion" id="descripcion"> </textarea>
                <input placeholder="precio" type="number" name="precio" id="precio">
                <input type="submit" class="btn btn-primary" value="editar">
            </form>
        </div>

    </div>

</div>

{include file='template/footer.tpl'}