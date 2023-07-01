  <nav>
    <ul class="navbar">
        <li class="barramenu"><a href="{$BASE_URL}home">Home</a></li>
        <li class="barramenu"><a href="{$BASE_URL}juegos">Juegos</a></li>
        <li class="barramenu"><a href="{$BASE_URL}generos">Generos</a></li>
        
        {if !$is_logged}
            <li class="barramenu"><a href="{$BASE_URL}login">LOGIN</a></li>
        {else}
            <li class="barramenu"><a href="{$BASE_URL}logout">LOGOUT</a></li>
        {/if}
          
    </ul>
</nav>

  