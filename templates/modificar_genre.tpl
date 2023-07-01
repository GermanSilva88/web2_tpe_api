{include file="templates/head.tpl"}
{include file="templates/header.tpl"}

<form class="update-form" action="{BASE_URL}actualizar_genre/{$genre->id_genre}" method="POST">
    <label>Name Genre:</label>
    <input type="text" id="name_genre" name="name_genre" value="{$genre->name_genre}" required>
    <br>

    <label>Description Genre:</label>
    <textarea id="description_genre" name="description_genre" required>{$genre->description_genre}</textarea>
    <br>

    {* <label>GENERO:{$game->name_genre}</label> *}
    <br>
    <br>
    {* <select name="name_genre">
        <option>-- Seleccione --</option>
        {foreach from=$list_genre item=$genres}
            <option value="{$genres->name_genre}">{$genres->name_genre}</option>
        {/foreach}
    </select> *}

    <input type="submit" value="Actualizar">
</form>

{include file="templates/footer.tpl"}