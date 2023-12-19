<div class="auth-container">
    <h1><?= htmlspecialchars($data['seo']['title']) ?></h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email">Adresse email</label>
            <input type="email"id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div>