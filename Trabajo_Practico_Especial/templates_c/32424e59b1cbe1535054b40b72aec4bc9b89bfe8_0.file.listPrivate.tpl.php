<?php
/* Smarty version 3.1.39, created on 2021-10-09 21:24:23
  from 'C:\xampp\htdocs\proyectos\web2\TPE\Trabajo_Practico_Especial\template\listPrivate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6161ec676e27f7_80378742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32424e59b1cbe1535054b40b72aec4bc9b89bfe8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web2\\TPE\\Trabajo_Practico_Especial\\template\\listPrivate.tpl',
      1 => 1633807457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_6161ec676e27f7_80378742 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
//agregar opcion de log out
<div class="container">

    <div class="row mt-4">
        <div class="col-md-8">
            
            <h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
            <table class ="table " >
                <thead>
                    <tr>
                       <th>nombre</td>                   
                    </tr>
                </thead>
                <tbody>
                    <tr class="list-group">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
                            <td class="
                                list-group-item
                                <?php if ($_smarty_tpl->tpl_vars['producto']->value->nombre) {?> nombre <?php }?>
                                ">
                                    <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
 
                                        <a class="btn btn-danger" href="delete/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
">Borrar</a>
                                        <a class="btn btn-success" href="mostrareditar/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
">Edit</a>
                                        <a class="btn btn-dark" href="detail/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
">Detalles</a>  
                                    </td>                      
                            </td>
                                                     
                           
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tr>

                </tbody>
           </table>
        </div>
        <div>
            <h2>Crear Producto</h2>
            <form class ="form-groupaction"action="create"  method="POST">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <textarea placeholder="descripcion" type="text" name="descripcion" id="descripcion"> </textarea>
                <input placeholder="precio" type="number" name="precio" id="precio">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
            <a class="btn btn-dark" href="categoria">genero</a>
        </div>
    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender('file:template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
