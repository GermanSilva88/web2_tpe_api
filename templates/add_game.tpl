<div>
    <form class="update-form" action="{BASE_URL}add_game/" method="POST">
        <br>
        <br>
        <h2>Agregar juego nuevo</h2>

        <label>Nombre:</label>
        <input type="text" id="name_game" name="name_game" required>
        <br>

        <label>Descripcion:</label>
        <textarea id="description_game" name="description_game" required></textarea>
        <br>

        <label>Genero:</label>
            <select name="name_genre" required>
                <option>-- Seleccione --</option>
                {foreach from=$list_genre item=$genres}
                    <option value="{$genres->id_genre}">{$genres->name_genre}</option>
                {/foreach}
            </select>
        <br>
        <br>

        <input type="submit" value="Agregar">
    </form>

</div>