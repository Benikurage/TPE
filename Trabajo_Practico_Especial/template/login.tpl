{include file='template/header.tpl'}
<div class='container'>
    <div class="inicio">
        <div class="row mt-4">
            <h2>Log In</h2>
            <form class="form-alta" action="verify" method="POST">
                <input placeholder="email" type="email" name="email" id="email">
                <input placeholder="password" type="password" name="password" id="password">
                <input type="submit" class="btn btn-primary" value="Login">
            </form>
        </div>
    </div>
</div>
{include file='template/footer.tpl'}