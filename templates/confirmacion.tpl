{include file="templates/head.tpl"}
{include file="templates/header.tpl"}

<form class="update-form" action="{BASE_URL}borrar_genre/{$id}" method="POST">
   <p>¿Estás seguro de que deseas eliminar este género?</p>
   <input type="hidden" name="confirmacion" value="confirmado">
   <input type="submit" value="Confirmar">
   <a href= "{BASE_URL}generos">Cancelar</a>
</form>

{include file="templates/footer.tpl"}