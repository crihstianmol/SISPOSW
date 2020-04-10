<html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //print_r($_POST);
    //Variables enviadas desde el formulario
    $buscaX = $_POST['buscarX'];
    $vrBusca = $_POST['vrBuscar'];
    function ProveedorXid($id)
    {
        require('../../../../datos/conexioncore.php');
        // $conexion=mysqli_connect("localhost", "root", "", "tps89") or
        // die("Problemas con la conexión");
        $consulta = "Select P.Id_Proveedor, P.Nombre_Prov,C.IdCiudad, C.Nombre Ciudad, C.Departamento, P.Direccion, P.Telefonos, P.Email
        from proveedores P Inner Join ciudad C On P.IdCiudad=C.IdCiudad Where P.Id_Proveedor like '%$id%' Order by P.Nombre_Prov";
        $datos = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
        mysqli_close($conexion);
        return $datos;
    }
    function ProveedorXnombre($nombre)
    {
        require('../../../../datos/conexioncore.php');
        // $conexion=mysqli_connect("localhost", "root", "", "tps89") or
        // die("Problemas con la conexión");
        $consulta = "Select P.Id_Proveedor, P.Nombre_Prov,C.IdCiudad, C.Nombre Ciudad, C.Departamento, P.Direccion, P.Telefonos, P.Email
        from proveedores P Inner Join ciudad C On P.IdCiudad=C.IdCiudad Where P.Nombre_Prov like '%$nombre%' Order by P.Nombre_Prov";
        $datos = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
        mysqli_close($conexion);
        return $datos;
    }
    function ProveedorXcorreo($correo)
    {
        require('../../../../datos/conexioncore.php');
        $consulta = "Select P.Id_Proveedor, P.Nombre_Prov,C.IdCiudad, C.Nombre Ciudad, C.Departamento, P.Direccion, P.Telefonos, P.Email
        from proveedores P Inner Join ciudad C On P.IdCiudad=C.IdCiudad Where P.Email like '%$correo%' Order by P.Nombre_Prov";
        $datos = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
        mysqli_close($conexion);
        return $datos;
    }
    function ProveedorXciudad($ciudad)
    {
        require('../../../../datos/conexioncore.php');
        $consulta = "Select P.Id_Proveedor, P.Nombre_Prov,C.IdCiudad, C.Nombre Ciudad, C.Departamento, P.Direccion, P.Telefonos, P.Email
        from proveedores P Inner Join ciudad C On P.IdCiudad=C.IdCiudad Where C.Nombre like '%$ciudad%' Order by P.Nombre_Prov";
        $datos = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
        mysqli_close($conexion);
        return $datos;
    }
    function ProveedorXdepartamento($departamento)
    {
        require('../../../../datos/conexioncore.php');
        $consulta = "Select P.Id_Proveedor, P.Nombre_Prov,C.IdCiudad, C.Nombre Ciudad, C.Departamento, P.Direccion, P.Telefonos, P.Email
        from proveedores P Inner Join ciudad C On P.IdCiudad=C.IdCiudad Where C.Departamento like '%$departamento%' Order by P.Nombre_Prov";
        $datos = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
        mysqli_close($conexion);
        return $datos;
    }
    //Arreglos asociativo para enviar respuesta json

    $resultado = [];
    switch ($buscaX) {
        case 'nombre':
            $resultado = ProveedorXnombre($vrBusca);
            break;
        case 'id':
            $resultado = ProveedorXid($vrBusca);
            break;
        case 'email':
            $resultado = ProveedorXcorreo($vrBusca);
            break;



        default:
            # code...
            break;
    }



    echo "
<div class='container mt-5'>
<div class='table-wrapper-scroll-y table-scrollbar'>
   <table class='table table-hover table-sm'>
    <thead class='thead-light'>
      <tr>
      <th class='th-sm'>NIT Proveedor</th>
      <th class='th-sm'>Nombre</th>
      <th class='th-sm'>Departamento</th>
      <th class='th-sm'>Ciudad</th>
      <th class='th-sm'>Direccion</th>
      <th class='th-sm'>Telefonos</th>
      <th class='th-sm'>Email</th>
      <th class='th-sm'>Acciones</th>
      </tr>
    </thead>
    <tbody>
    </div>
<div>";
    foreach ($resultado as $key => $dato) {
        echo " <tr>
            <td>$dato[Id_Proveedor]</td>
            <td>$dato[Nombre_Prov]</td>
            <td>$dato[Departamento]</td>
            <td>$dato[Ciudad]</td>
            <td>$dato[Direccion]</td>
            <td>$dato[Telefonos]</td>
            <td>$dato[Email]</td>
            <td><a onclick='edProv(" . $dato['Id_Proveedor'] . ");'>Editar</a></td>
            </tr>";
    }
}
?>
</html>
