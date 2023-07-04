# API de Comentarios para Juegos E-Sports

## Introducción
La API de Comentarios para Juegos E-Sports proporciona funcionalidades para agregar, eliminar, modificar y obtener comentarios relacionados con juegos de E-Sports. Esta documentación detalla los endpoints disponibles, los parámetros aceptados y los ejemplos de uso.

## URL base
La URL base para acceder a la API es: `http://localhost/tpe_web2_api/tpe_web2/api
## Endpoints
A continuación se detallan los endpoints disponibles en la API de comments:

# 1. Obtener todos los comentarios (ordenados, filtrados, paginados o sin ningun tipo de orden/filtro)
- Método: GET
- URL: `/comment`
- Parámetros opcionales:
- ## Ordenado
  - `1er Parametro sort`: Elige una columna específica.
  - `2do Parametro order`: Ordena los comentarios de una columna específica.
  - Ejemplo de solicitud: `GET comment?sort=score_game&order=DESC`
- ## Filtrado
  - `1er Parametro filter`: Elige una columna específica. Ejemplo:
  - `2do Parametro dato`: Filtra segun el atributo.
  - Ejemplo de solicitud: `GET comment?filter=score_game&dato=3`
- ## Paginado
  - `1er Parametro page`: Elige a que pagina desea dirigirse.
  - `2do Parametro records`: Elige la cantidad de registros por pagina.
  - Ejemplo de solicitud: `GET comment?page=2&records=5`

### 2. Agregar un nuevo comentario
- Método: POST
- URL: `/comment`
- Cuerpo de la solicitud: Un objeto JSON que representa el nuevo comentario a agregar. El objeto debe contener los siguientes campos:
  - `comment_game`: Contenido del comentario
  - `score_game`: Puntaje del juego
  - `game_id`: ID del juego al que pertenece el comentario
- Ejemplo de solicitud:
  ```json
  POST /comment
  Content-Type: application/json
  
  {
    "comment_game": "Muy buen juego , la jugabilidad esta por encima del call of duty, solo la ultima temporada de agua no me agrada mucho.",
    "score_game": 5,
    "game_id": 7
  }

### 3. Obtener un comentario por ID
- Método: GET
- URL: `/comment/:ID`
- Parámetro de ruta:
  - `:ID`: ID del comentario que se desea obtener
- Ejemplo de solicitud: `GET /comment/7`

### 4. Eliminar un comentario por ID
- Método: DELETE
- URL: `/comment/:ID`
- Parámetro de ruta:
  - `:ID`: ID del comentario que se desea eliminar
- Ejemplo de solicitud: `DELETE /comment/7`

### 5. Modificar un comentario por ID
- Método: PUT
- URL: `/comment/:ID`
- Parámetro de ruta:
  - `:ID`: ID del comentario que se desea modificar
- Cuerpo de la solicitud: Un objeto JSON que representa los campos actualizados del comentario. Los campos que se pueden actualizar son:
  - `comment_game`: Contenido del comentario
  - `score_game`: Puntaje del juego
  - `game_id`: ID del juego al que pertenece el comentario
- Ejemplo de solicitud:
  ```json
  PUT /comment/12
  Content-Type: application/json
  
  {
    "id": 12,
    "comment_game": "No me gusto, muy aburrido",
    "score_game": 1,
    "game_id": 7
  }
