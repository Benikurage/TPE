{include file='templates/header.tpl'}

<div class="container">
    <h1 class="mb-4">{$producto->nombre}</h1>
    <h2>Descripcion: {$producto->descripcion}</h2>
    <h2>Prioridad: {$producto->precio}</h2>
    <h2>Finalizada: {$producto->id_genero}</h2>

    <a href="home" > Volver </a>
</div>

{include file='templates/footer.tpl'}