<?php
/* Smarty version 3.1.39, created on 2021-10-07 04:27:49
  from 'C:\xampp\htdocs\proyectos\web2\TPE\Trabajo Practico Especial\template\mostraridetarproducto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615e5b25c89591_19144537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0c1218723c7e03083ff75ec6999206e891c4379' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web2\\TPE\\Trabajo Practico Especial\\template\\mostraridetarproducto.tpl',
      1 => 1633573665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_615e5b25c89591_19144537 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>editar Tarea</h2>
            <form class="form-alta" action="update"  method="POST">
                <input type="hidden" name="idProducto" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value;?>
">
                <input type="hidden" name="id_producto" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value;?>
">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <textarea placeholder="descripcion" type="text" name="descripcion" id="descripcion"> </textarea>
                <input placeholder="precio" type="number" name="precio" id="precio">
                <input type="submit" class="btn btn-primary" value="editar">
            </form>
        </div>

    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender('file:template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php }
}
