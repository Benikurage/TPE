{include file='templates/header.tpl'}

<div class="container">
    <h1 class="mb-4">{$producto->id_producto}</h1>
    <h2>nombre: {$producto->nombre}</h2>
    <h2>Descripcion: {$producto->Descripcion}</h2>
    <h2>precio: {$producto->precio}</h2>
    <h2>genero: {$producto->id_genero}</h2>

    <a href="home" > Volver </a>
</div>

{include file='templates/footer.tpl'}