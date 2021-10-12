{include file='template/header.tpl'}

    <div class="container">

        <div class="row mt-4">
            <div class="col-md-8">
                
                <h1>Lista de genero</h1>
                <table class ="table " >
                    <thead>
                        <tr>
                            <th>{$categories->nombre} | {$categories->descripcion}</td>
                            <th>{$categories->nombre} | {$categories->descripcion}</td>  
                            <th>{$categories->nombre} | {$categories->descripcion}</td>                     
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

{include file='template/footer.tpl'}