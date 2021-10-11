{include file='template/header.tpl'}
<div class='container'>
    <div class="inicio">
        {* <h4>{$error}</h4> *}
        <h2>Crear usuario</h2>
        <form class="form-alta" action="register" method="POST">
            <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
            <input placeholder="email" type="email " name="email" id="email" required>
            <input placeholder="password" type="password" name="password" id="password" required>
            <input type="submit" class="btn btn-primary" value="Registrar">
        </form>
    </div>
</div>
{include file='template/footer.tpl'}