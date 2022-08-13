<?php
include("conexion.php");
$sql = "SELECT id, nombre, descripcion, precio FROM articulo";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each fila
while($row = $result->fetch_assoc()) {
echo "<br>"."Producto: " . $row["id"]."<br>".
" Id: " . $row["###"]."<br>".
" Nombre: " .$row["###"]."<br>".
" Calle: " .$row["###"]."<br>".
" Nro.Puertas: " .$row["###"]."<br>"."<br>";
" Esquina: " .$row["###"]."<br>"."<br>";
}
} else {
echo "0 resultados";
}
$connect->close();
?>