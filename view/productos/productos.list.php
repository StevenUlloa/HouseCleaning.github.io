<!--autor:ULLOA ESPINOZA STEVEN-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=productos&f=search" method="POST">
                <input type="text" name="b" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=productos&f=view_new"> 
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> 
                   Nuevo</button>

            </a>
        </div>
    </div>
    
    <div class="row">
         <div class="col-sm-6">
             <h4>Buscar productos</h4>
           <input type="text" name="busquedaAjax" id="busquedaAjax"  placeholder="buscar..."/>
                  
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>Id</th>
            <th>Nombre </th>
            <th>Material</th>
            <th>Uso </th>
            <th>Stock </th>
            <th>Serial </th>
            <th>Acciones </th>
            </thead>
            <tbody class="tabladatos">
                <?php         
                foreach ($resultados as $fila) {
                  ?>
                <tr>
                    <td><?php echo $fila['id'];?></td>
                    <td><?php echo $fila['nombre'];?></td>
                    <td><?php echo $fila['material'];?></td>
                    <td><?php echo $fila['uso'];?></td>
                    <td><?php echo $fila['stock'];?></td>
                    <td><?php echo $fila['serial'];?></td>

                    <td>
                        <a class="btn btn-primary" 
                    href="index.php?c=productos&f=view_edit&id=<?php echo  $fila['id']; ?>">
                    <i class="fas fa-marker"></i></a>
                    <a class="btn btn-danger" 
                   onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;" 
                    href="index.php?c=productos&f=delete&id=<?php echo  $fila['id']; ?>">
                    <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
var txtBuscar = document.querySelector("#busquedaAjax");
txtBuscar.addEventListener('keyup', cargarProductos);

function cargarProductos() {
    // leer paramteros
    var bus = txtBuscar.value;
    // realizar la peticion
    var url = "index.php?c=productos&f=searchAjax&b=" + bus;

    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    // lectura de respuesta
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            //var respuesta = xmlh.responseText;

            var respuesta = ""; 
            respuesta = xmlh.responseText;
            
            actualizar(respuesta); //actualizar cierta parte de la pagina
        }
    };
}
function actualizar(respuesta) {
    // elemento a actualizar
    var tbody = document.querySelector('.tabladatos');
    var productos = JSON.parse(respuesta); // parse de respuesta aformato json
    console.log(productos);
    resultados = '';
    for (var i = 0; i < productos.length; i++) {
        resultados += '<tr>';
        resultados += '<td>' + productos[i].id + '</td>';
        resultados += '<td>' + productos[i].nombre + '</td>';
        resultados += '<td>' + productos[i].material + '</td>';
        resultados += '<td>' + productos[i].uso + '</td>';
        resultados += '<td>' + productos[i].stock + '</td>';
        resultados += '<td>' + productos[i].serial + '</td>';
        resultados += '<td>' +
            "<a href='index.php?c=Productos&a=editar&id=" + productos[i].nombre +
            "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>" +
            "<a href='index.php?c=Productos&a=eliminar&id=" + productos[i].nombre+ "'" +
            "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + productos[i].material
            + " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
        resultados += '</tr>';
    }
    tbody.innerHTML = resultados;

}


</script>

<?php  require_once FOOTER ?>