<?php
    class Articles {
    public function getAll()
    {
        $db = new mysqli('mi-host', 'mi-usuario', 'mi-clave', 'mi-base-de-datos');
        $res=$db->query('SELECT fecha, titulo FROM articulo');

        $articles = array();
        while ($row = $res->fetch_array())  {
            $articles[] = $row;
        }
        $db->close();
        return $articles;
    }
    }
?>