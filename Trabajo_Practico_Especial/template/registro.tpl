{include file='template/header.tpl'}
<div class='container'>
    <div class="inicio">
        <h2>Crear usuario</h2>
        <form class="form-alta" action="register"  method="POST">
            <input placeholder="nombre" type="text" name="nombre" id="nombre">
            <input placeholder="email" type="email " name="email" id="email">
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
    </div>
</div>
{include file='template/footer.tpl'}