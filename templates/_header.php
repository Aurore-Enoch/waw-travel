<header  id="main-header">
    <div class="container">
    <img src="img/logo-waw-travel.png" alt="Logo" id="logo">
    <nav class="navbar">
        <ul>
            <li><a href="?path=/" class="navbar-item">Accueil</a></li>
            <li><a href="?path=/roadtrips" class="navbar-item">Carnet de voyages</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="?path=/deconnexion" class="navbar-item">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="?path=/connexion" class="navbar-item">Connexion</a></li>
                <li><a href="?path=/inscription" class="navbar-item">Inscription</a></li>
            <?php endif ?>
        </ul>
    </nav>
    </div>
</header>