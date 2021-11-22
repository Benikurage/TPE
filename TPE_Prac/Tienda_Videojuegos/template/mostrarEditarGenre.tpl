{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Editar Género</h2>
            <form class="form-alta" action="updateGenre"  method="POST">
                <input type="hidden" name="id_genero" value="{$genre}">
                <input placeholder="Nuevo valor" type="text" name="genre" id="genre" required>
                <br>
                <input type="submit" class="btn btn-primary" value="Editar">
            </form>
        </div>
    </div>
    <a class="btn btn-success" href="lista">Volver al catálogo</a>
    <a class="btn btn-dark" href="listCategory">Volver a géneros</a>
</div>
{include file='template/footer.tpl'}