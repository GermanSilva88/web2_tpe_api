<?php

class api_comment_view {
    
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    private function _requestStatus($code){
        $status = array(
            200 => "La solicitud ha tenido exito.",
            201 => "La solicitud ha tenido exito y se ha creado un nuevo recurso.",
            400 => "El servidor no pudo interpretar la solicitud dada una sintaxis invalida.",
            404 => "El servidor no pudo encontrar el contenido solicitado.",
            500 => "El servidor encontro una condicion inesperada que le impidio cumplir con la solicitud."
          );
        return (isset($status[$code]))? $status[$code] : $status[500];
    
    }
}