{include file="templates/head.tpl"}
{include file="templates/header.tpl"}
<h1>Detalles de juegos del genero : </h1>
{* {foreach from=$game item=$game_genre}
    <h1>{$game_genre->name_genre}  </h1>
{/foreach}<br><br> *}

<ul>
{foreach from=$game item=$game_genre}
    <li>Juego: {$game_genre->name_game}  </li>
    <li>Descripcion: {$game_genre->description_game}</li><br>
{/foreach}
</ul>

{include file="templates/footer.tpl"}