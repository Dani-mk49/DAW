<!DOCTYPE html>
<html lang="es">
<head>
	<title>Función círculo</title>
	<meta charset="utf-8">
</head>

<body>
<?php
  define ("PI",3.141592);
  //Nueva versión de función circulo
  //Ahora recibe como parámetro de entrada el valor del radio y devuelve con return un array con los 2 resultados: la longitud y el area.
  function circulo($r)
  {
    $v[0]=2*PI*$r;        //Almacena en v[0] la longitud
	  $v[1]=PI*pow($r,2);   //Almacena en v[1] el area
	  return $v;
  }

  $radio=2;
  $res=circulo($radio);
  echo "El círculo de radio $radio tiene longitd $res[0] y área $res[1]<br/>";

  $res=circulo(4.5);
  echo "El círculo de radio 4.5 tiene longitd $res[0] y área $res[1]<br/>";

?>
</body>
</html>