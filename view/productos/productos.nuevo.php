<!--autor:ULLOA ESPINOZA STEVEN-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=new" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
            
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre producto" required>
                </div>
                <div class="form-group col-sm-6">
                <label for="material">Material:</label><br>
                <select name="material">
                <option value = "madera" >madera</option>
                <option value ="metal">metal</option>
                <option value ="plastico">plastico</option>
                </select>
                <br>
                </div>
                <div class="form-group col-sm-6">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control" placeholder="stock producto" required>
                </div>     
                <div>
                <label>Uso:</label><br>
                <input type="radio" name="uso" value="interno" >interno<br>
                <input type="radio" name= "uso" value= "externo" >externo<br>
                </div>
                <div class="form-group col-sm-6">
                    <label for="serial">Serial</label>
                    <input type="text" name="serial" id="serial" class="form-control" placeholder="serial del producto" required>
                </div>     
                <div class="form-group  col-sm-12"><br>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=productos&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
