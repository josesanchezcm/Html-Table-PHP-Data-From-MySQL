<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mySqlTest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Usuario";
$result = $conn->query($sql);


?>
<head>
   <!--- Basic Page Needs
      ================================================== -->
   <meta charset="utf-8">
   <title>Contenido</title>
   <meta name="description" content="">
   <meta name="author" content="Alejandro Uranga Reyes">
   <!-- Mobile Specific Metas
      ================================================== -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <!-- CSS
      ================================================== -->
   <link rel="stylesheet" href="css/default.css">

</head>
<html>
   <body class="blanco">
      <div class="row add-top">
         <h2 class="intro text-center">Lista De Usuarios Registados</h2>
         <table id="usuarios">
            <tbody>
               <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Email</th>
                  <th>Institución educativa</th>
                  <th>Fecha Registro</th>
               </tr>
               <?php
               if ($result->num_rows > 0) {// output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["Nombre"]."</td>";
                    echo "<td>".$row["Apellido"]."</td>";
                    echo "<td>".$row["Email"]."</td>";
                    echo "<td>".$row["NombreInsEdu"]."</td>";
                    echo "<td>".$row["FechaRegistro"]."</td></tr>";
                 }
                 } else {
                     echo "0 results";
                     }
                     $conn->close();
               ?>
            </tbody>
         </table>
      </div>
   </body>
</html>