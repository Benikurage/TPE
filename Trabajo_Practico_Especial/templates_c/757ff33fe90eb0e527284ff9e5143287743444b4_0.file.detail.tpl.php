<?php
/* Smarty version 3.1.39, created on 2021-10-07 05:39:02
  from 'C:\xampp\htdocs\proyectos\web2\TPE\Trabajo_Practico_Especial\template\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615e6bd66b77f2_32378542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '757ff33fe90eb0e527284ff9e5143287743444b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web2\\TPE\\Trabajo_Practico_Especial\\template\\detail.tpl',
      1 => 1633577939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_615e6bd66b77f2_32378542 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->descripcion;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</td>
            </tr>
        </tbody>
    
    </table>

    <a href="home" class="btn btn-dark"> Regresar al inicio </a>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
