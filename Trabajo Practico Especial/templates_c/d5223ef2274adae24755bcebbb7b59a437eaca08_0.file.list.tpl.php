<?php
/* Smarty version 3.1.39, created on 2021-10-03 23:33:56
  from 'C:\xampp\htdocs\proyectos\web2\TPE\Trabajo Practico Especial\template\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615a21c40c9428_97213669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5223ef2274adae24755bcebbb7b59a437eaca08' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web2\\TPE\\Trabajo Practico Especial\\template\\list.tpl',
      1 => 1633296826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_615a21c40c9428_97213669 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\proyectos\\web2\\TPE\\TrabajoPracticoEspecial\\libs\\smarty-3.1.39\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender('file:template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Crear Tarea</h2>
            <form class="form-alta" action="create" method="post">
                <input placeholder="nombre" type="text" name="title" id="title" required>
                <textarea placeholder="descripcion" type="text" name="description" id="description"> </textarea>
                <input placeholder="precio" type="number" name="priority" id="priority">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
        <div class="col-md-8">
            <h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>

            <ul class="list-group">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
                    <li class="
                        list-group-item
                        <?php if ($_smarty_tpl->tpl_vars['producto']->value->nombre) {?> nombre <?php }?>
                        ">
                            <a href="view/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
"><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</a> | <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['producto']->value->descripcion,30);?>

                            <a class="btn btn-danger" href="delete/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
">Borrar</a>
                            <?php if (!$_smarty_tpl->tpl_vars['producto']->value->precio) {?>
                                <a class="btn btn-success" href="update/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
">Done</a>
                            <?php } else { ?>
                                <!-- <a class="btn btn-success" href="updateTask/<?php echo $_smarty_tpl->tpl_vars['task']->value->id_tarea;?>
">Restore</a> -->
                            <?php }?>
                            
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender('file:template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
