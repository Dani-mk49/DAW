<h1>Listado de Articulos</h1>
<table>
     <tr> <th>Fecha</th> <th>Titulo</th> </tr>
     <?php
     $articles = $data['articles'];
     foreach($articles as $article) {
        echo "<tr>
           <td>".$articles['fecha']."</td>
           <td>".$articles['titulo']."</td>
        </tr>";
     }
     ?>
</table>