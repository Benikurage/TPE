{include file='template/header.tpl'}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <h1>Lista de Usuarios</h1>
            <table class ="table">
                <tbody>
                    <tr class="list-group">
                        <tr>
                            <th>Nombre</th>
                            <th>Admin</th>
                            <th>Borrar</th>
                            <th>Dar o Quitar Admin</th>
                        </tr>
                            {foreach from=$usuarios item=$usuario}
                            <tr>
                                <td>{$usuario->nombre}</td>
                                <td>{$usuario->admin}</td>
                                <td><a class="btn btn-danger" href="deleteUser/{$usuario->id_usuario}">Borrar</a></td>
                                <td><a class="btn btn-success" href="toggleAdmin/{$usuario->id_usuario}">Toggle Admin</a></td>
                            </tr>
                        {/foreach}
                    </tr>
                </tbody>
           </table>
            </ul>
        </div>
    </div>
    <a class="btn btn-dark" href="inicio">Inicio</a>
</div>
{include file='template/footer.tpl'}