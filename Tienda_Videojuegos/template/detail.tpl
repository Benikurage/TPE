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

            <tr class="td-equipo">
                <td >{$producto->nombre}</td>
                <td >{$producto->precio}</td>
            </tr>
        </tbody>
    </table>
    {if $producto->descripcion != ""}
        <table class="descripcion">
            <thead>
                <tr>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td_descripcion" >{$producto->descripcion}</td>
                </tr>	
            </tbody>
        </table>
        {/if}
    </section>  
    <div class="comentarios">
        <h2>Comentarios</h2>
        <section>            
            {if $SESSION != null}
                <form class="form_comentarios" method="post" >
                    <input type="text" id="comentario" class="input_coment"  placeholder="Comentario" >   
                    <input type="text" id="username" value="{$usuario->username}" hidden >  
                    <input type="number" id="id_equipo"  value="{$producto->id_producto}" hidden >  
                    <button type="submit" class="btn_coment enviar"value="insertarComentario">Enviar comentario</button>   
                    <label class="p_coment">Puntaje 1 • 5</label>
                    <div class= "div-puntaje">
                        <input id="puntuacion" type="range"   min="1" max="5" step="1" value="5" >
                        <div>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>         
                </form>
            {else}
                    <button class="enviar" hidden></button>
                    <input type="number" id="id_producto"  value="{$producto->id_producto}" hidden >  
            {/if}        
            </section>    
        {include "vue/adminComents.tpl"} 
    <div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="scripts/comentarios.js"></script> 

    <a href="home" class="btn btn-dark">Inicio</a>
    <a class="btn btn-success" href="lista">Volver al catálogo</a> 
</div>
{include file='template/footer.tpl'}
