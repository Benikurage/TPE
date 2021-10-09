{include file='template/header.tpl'}
<div class='container'>
    <div class="row mt-4">
        <h2>Log In</h2>
        <form class="form-alta" action="verify" method="post">
            <input placeholder="user" type="text" name="user" id="user" required>
            <input placeholder="nombre" type="email " name="email" id="email" required>
            <input placeholder="password" type="password" name="password" id="password" required>
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
    </div>
    <h4 class="alert-danger">{$error}</h4>
</div>
{include file='template/footer.tpl'}