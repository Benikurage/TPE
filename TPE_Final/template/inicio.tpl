{include file='template/header.tpl'}
<div class="container">
    <div class="inicio">
        <h1>Bienvenido a Tienda Gamer&trade;</h1>
        <div class="botones-inicio">
            {if !isset($logged)}
               <a class="btn btn-success" href="login">Login</a>
            {/if}
            <a class="btn btn-success" href="registro">Crear Usuario</a>
            <a class="btn btn-success" href="lista">Ver Catálogo</a>
            {if isset($logged)}
                <a class="btn btn-danger"  href="logout">Logout</a>
            {/if}
        </div>
    </div>
</div>
<h4 class="alert-danger">{$error}</h4>
{include file='template/footer.tpl'}