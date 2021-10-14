{include file='template/header.tpl'}
<div class="container">
    <h1>Detalles del producto</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>       
            <tr>
                <td>{$producto->nombre}</td>
                <td>{$producto->descripcion}</td>
                <td>${$producto->precio}</td>
            </tr>
        </tbody>
    </table>
    <a href="home" class="btn btn-dark">Inicio</a>
    <a class="btn btn-success" href="lista">Volver al catálogo</a> 
</div>
{include file='template/footer.tpl'}