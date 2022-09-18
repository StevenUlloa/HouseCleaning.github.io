<!--autor:ULLOA ESPINOZA STEVEN-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=edit" method="POST" name="formProdNuevo" id="formProdNuevo">
        
        <input type="hidden" name="id" id="id" value="<?php echo $prod['id']; ?>"/>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">Id</label>
                    <input type="text" readonly=»readonly» name="id" id="id" value="<?php echo $prod['id']; ?>" class="form-control" placeholder="codigo del producto" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['nombre']; ?>" class="form-control" placeholder="nombre producto" required>
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
                    <label for="uso">Uso</label><br>
                    <input type="radio" name="uso" id="uso"  value= "interno" required> interno
                    <input type="radio" name="uso" id="uso"  value="externo" required>  externo 
                    
                </div> 
                <div class="form-group col-sm-6">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control" placeholder="stock producto" required>
                </div>     

                <div class="form-group col-sm-6">
                    <label for="stock">Serial</label>
                    <input type="text" name="serial" id="serial" class="form-control" placeholder="serial del producto" required>
                </div>     
                
                <div class="form-group col-sm-12"> <br>
                    <button type="submit" class="btn btn-primary"
                     onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;" >Guardar</button>
                    <a href="index.php?c=productos&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
