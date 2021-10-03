<?php
/* Smarty version 3.1.39, created on 2021-10-04 00:04:11
  from 'C:\xampp\htdocs\TPE\Trabajo Practico Especial\template\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615a28db55c878_04671970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e74042375fa3f0550205a0b656dfe0827a0b3658' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\Trabajo Practico Especial\\template\\detail.tpl',
      1 => 1633293935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_615a28db55c878_04671970 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <h1 class="mb-4"><?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
</h1>
    <h2>nombre: <?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</h2>
    <h2>Descripcion: <?php echo $_smarty_tpl->tpl_vars['producto']->value->Descripcion;?>
</h2>
    <h2>precio: <?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</h2>
    <h2>genero: <?php echo $_smarty_tpl->tpl_vars['producto']->value->id_genero;?>
</h2>

    <a href="home" > Volver </a>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
