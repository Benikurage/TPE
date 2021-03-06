{include file='template/header.tpl'}
{if $admin==true}    
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <h1>Lista de Usuarios</h1>
            <table class="table">
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
                            {if $usuario->admin == true}
                                <td>Es Admin</td>  
                            {else}
                                <td>No es Admin</td>   
                            {/if}
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
{else}
    <h4 class="alert-danger">Usted no tiene permiso de admin.</h4>
    <a class="btn btn-dark" href="inicio">Inicio</a>
{/if}
{include file='template/footer.tpl'}