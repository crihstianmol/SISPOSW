<html>

    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST'){
//print_r($_POST);
    require_once('Funciones.php');
    //Variables enviadas desde el formulario
    $buscaX=$_POST['buscarX'];
    $vrBusca=$_POST['vrBuscar'];

    //Arreglos asociativo para enviar respuesta json

    $resultado=[];
        switch ($buscaX) {
            case 'nombre':
                $resultado=ProveedorXnombre($vrBusca);
                break;
                case 'id':
                    $resultado=ProveedorXid($vrBusca);
                    break;
                    case 'email':
                        $resultado=ProveedorXcorreo($vrBusca);
                        break;
                        case 'ciudad':
                            $resultado=ProveedorXciudad($vrBusca);
                            break;
                            case 'departamento':
                                $resultado=ProveedorXdepartamento($vrBusca);
                                break;


            default:
                # code...
                break;
        }



echo "
   <table class='table table-hover table-sm'>
    <thead  class='thead-light'>
      <tr>
        <th class='th-sm'>ID</th>
        <th class='th-sm'>NOMBRE</th>
        <th class='th-sm'>DEPARTAMENTO</th>
        <th class='th-sm'>CIUDAD</th>
        <th class='th-sm'>DIRECCION</th>
        <th class='th-sm'>TELEFONO</th>
        <th class='th-sm'>EMAIL</th>
      </tr>
    </thead>
    <tbody>";
    foreach ($resultado as $key => $dato) {
     echo" <tr>
            <td>$dato[Id_Proveedor]</td>
            <td>$dato[Nombre_Prov]</td>
            <td>$dato[Departamento]</td>
            <td>$dato[Ciudad]</td>
            <td>$dato[Direccion]</td>
            <td>$dato[Telefonos]</td>
            <td>$dato[Email]</td>
            <td><a href='ModificarProveedor.php?idProvee=$dato[Id_Proveedor]'target='_blank'>Editar</a></td>
            <td><a href='EliminarProveedor.php?idProvee=$dato[Id_Proveedor]'target='_blank'>Borrar</a></td>
            </tr>";
    }
}
   ?>
   <a href="ModificarProveedor.php"></a>

</html>
