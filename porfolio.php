<?php
/**
 * --- CONFIGURATION DE SÉCURITÉ (ENTÊTES HTTP) ---
 * Ces en-têtes indiquent au navigateur de bloquer plusieurs types d'attaques courantes.
 */

// 1. Protection contre le Clickjacking (empêche d'intégrer votre site dans une iframe malveillante)
header("X-Frame-Options: DENY");

// 2. Protection contre le reniflage de contenu (MIME-sniffing)
header("X-Content-Type-Options: nosniff");

// 3. Activation de la protection XSS intégrée aux navigateurs
header("X-XSS-Protection: 1; mode=block");

// 4. Politique de sécurité du contenu (CSP) stricte (Seules les ressources locales sont autorisées)
header("Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;");

// Exemple de fonction de nettoyage pour sécuriser les affichages futurs (Protection XSS)
function secure_escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio Sécurisé</title>
    <style>
        /* --- Styles de base et reset --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }

        /* --- Barre de navigation (Menu) --- */
        navbar {
            background-color: #1e293b;
            display: block;
        }

        .menu-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            list-style: none;
        }

        .menu-item {
            position: relative;
        }

        .menu-item a {
            display: block;
            color: #fff;
            padding: 20px 25px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .menu-item a:hover {
            background-color: #334155;
        }

        /* --- Menu Déroulant --- */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            min-width: 240px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.1);
            z-index: 100;
            list-style: none;
            border-radius: 0 0 4px 4px;
            overflow: hidden;
        }

        .dropdown-content li a {
            color: #334155;
            padding: 12px 20px;
            border-bottom: 1px solid #f1f5f9;
        }

        .dropdown-content li a:hover {
            background-color: #f8fafc;
            color: #0f172a;
        }

        /* Affichage du menu déroulant au survol */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Indicateur visuel pour le menu déroulant */
        .dropdown > a::after {
            content: ' ▾';
            font-size: 0.8rem;
        }

        /* --- Contenu Principal --- */
        .main-container {
            max-width: 800px;
            margin: 60px auto;
            padding: 40px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0f172a;
            margin-bottom: 20px;
            font-size: 2.2rem;
        }

        p {
            margin-bottom: 15px;
            color: #475569;
            font-size: 1.1rem;
        }

        .badge-grid {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .badge {
            background: #e2e8f0;
            color: #334155;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- Barre de navigation -->
    <navbar>
        <ul class="menu-container">
            <li class="menu-item"><a href="#presentation">Présentation</a></li>
            
            <!-- Menu Déroulant avec 7 sous-menus -->
            <li class="menu-item dropdown">
                <a href="#projets">Mes Réalisations</a>
                <ul class="dropdown-content">
                    <li><a href="#web">1. Développement Web Full-Stack</a></li>
                    <li><a href="#cloud">2. Infrastructures Cloud & AWS</a></li>
                    <li><a href="#nocode">3. Applications No-Code</a></li>
                    <li><a href="#hardware">4. Architecture & Matériel PC</a></li>
                    <li><a href="#academique">5. Projets Académiques</a></li>
                    <li><a href="#certifs">6. Certifications & Formations</a></li>
                    <li><a href="#stages">7. Expériences & Stages</a></li>
                </ul>
            </li>
        </ul>
    </navbar>

    <!-- Zone de présentation -->
    <main class="main-container" id="presentation">
        <h1>Bonjour et bienvenue sur mon portfolio</h1>
        <p>
            Passionné par le développement de solutions applicatives modernes et l'optimisation des infrastructures, 
            je conçois des architectures logicielles fiables, sécurisées et centrées sur l'expérience utilisateur.
        </p>
        <p>
            Ce site me sert de vitrine technologique pour regrouper mes différentes compétences acquises lors de mes 
            projets académiques, personnels et professionnels. Explorez les différents menus pour découvrir mes réalisations.
        </p>

        <div class="badge-grid">
            <span class="badge">Sécurisé</span>
            <span class="badge">PHP / HTML5</span>
            <span class="badge">CSS Flexbox</span>
        </div>
    </main>

</body>
</html>