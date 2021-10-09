{include file='template/header.tpl'}
<div class='container'>
    <div class="inicio">
    <div class="row mt-4">
        <h2>Log In</h2>
        <form class="form-alta" action="verify" method="post">
            <input placeholder="nombre" type="text" name="nombre" id="nombre">
            <input placeholder="email" type="email " name="email" id="email">
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
    </div>
    <h4 class="alert-danger">{$error}</h4>
    </div>
</div>
{include file='template/footer.tpl'}