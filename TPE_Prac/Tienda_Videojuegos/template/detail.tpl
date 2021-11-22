{include file="template/header.tpl"}
<h2 class="titulo-detalle"> detalle del producto</h2>
    <section  id="tabla"class="tabla-detalle detalles">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>precio</th>
                </tr>
            </thead>
           <tbody>
                <tr class="td-equipo">
                    <td >{$producto->nombre}</td>
                    <td >{$producto->descripcion}</td>
                    <td >{$producto->precio}</td>
                </tr>	   
			</tbody>
        </table>   
    </section>  
    <div class="comentarios">
        <h2>Comentarios</h2>
        <section >            
            <form class="form_comentarios" method="post" >
                <input type="text" id="comentario" class="input_coment"  placeholder="Comentario" >   
                <input type="number" id="id_producto"  value="{$producto->id_producto}" hidden >  
                <button type="submit" class="btn_coment enviar"value="addComments">Enviar comentario</button>   
                <label class="p_coment">Puntaje 1 • 5</label>
                <div  class= "div-puntaje">
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
        </section>
        <div id="btn-toolbar">
        </div>    
        {include "template/vue/adminComents.tpl"} 
        
    </div>
    </div>
    
   

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="comentarios.js"></script> 
</body>
</html>