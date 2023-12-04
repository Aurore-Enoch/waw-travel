<div class="container">
    <h1><?= $data['seo']['title'] ?></h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email">Adresse email</label>
            <input type="email"id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div>