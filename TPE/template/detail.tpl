{include file='template/header.tpl'}

<div class="container">
    <h1>Detalles del producto</h1>
    <table class="table">
        <thead>
            <tr>
                <th>nombre</th>
                <th>Descripcion</th>
                <th>precio</th>
            </tr>
        </thead>
        <tbody>       
            <tr>
                <td>{$producto->nombre}</td>
                <td>{$producto->descripcion}</td>
                <td>{$producto->precio}</td>
            </tr>
        </tbody>
    
    </table>

    <a href="home" class="btn btn-dark"> Regresar al inicio </a>
</div>

{include file='template/footer.tpl'}