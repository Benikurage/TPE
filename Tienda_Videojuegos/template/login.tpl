{include file='template/header.tpl'}
<div class='container'>
    <div class="inicio">
        <h2>Log In</h2>
        <div>
            <form action="verify" method="POST">
                <input placeholder="email" type="email" name="email" id="email">
                <input placeholder="password" type="password" name="password" id="password">
                <input type="submit" class="btn btn-primary" value="Login">
            </form>
            <a class="btn btn-dark" href="inicio">Inicio</a>
        </div>
    </div>
</div>
{include file='template/footer.tpl'}