{include file="templates/head.tpl"}
{include file="templates/header.tpl"}

<table>
    <tr class="table_genre">
        <th>Genero:</th>
        <th>Descripcion:</th>
        {foreach from=$genres item=$genre}
        <tr>
            <td>{$genre ->name_genre} </td>
            <td>{$genre ->description_genre}</td>
            {if $is_logged}
                <td><a href="{BASE_URL}modificar/{$genre ->id_genre}">EDITAR</a></td>
                <td><a href="{BASE_URL}borrar_genre/{$genre ->id_genre}">BORRAR</a></td>
            {/if}
            <td><a href="{BASE_URL}bygenero/{$genre ->id_genre}">Juegos de este genero</a></td>
        </tr>
    {/foreach}
    </tr>
</table>
{if $is_logged}
    {include file="templates/add_genre.tpl"}
{/if}
{include file="templates/footer.tpl"}