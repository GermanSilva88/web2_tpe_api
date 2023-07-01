{include file="templates/head.tpl"}
{include file="templates/header.tpl"}

<div class="container">
    <form action="{BASE_URL}verify" method="POST" class="update-form">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario (email)</label>
            <input type="email" name="username" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        {* {if $error}
        <div class="alert alert-danger" role="alert">               
            {$error}
        </div>
        {/if} *}

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

</div>

{include file="templates/footer.tpl"}
