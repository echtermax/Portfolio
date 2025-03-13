<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Pawellek - Webentwickler & Softwareentwickler</title>
    <meta name="description" content="Willkommen auf meinem Portfolio! Ich bin Max Pawellek, ein leidenschaftlicher Webentwickler mit Fokus auf moderne Web-Technologien. Schau dir meine Projekte an!">
    <meta name="keywords" content="Webentwickler, Softwareentwickler, Portfolio, HTML, CSS, JavaScript, PHP, Vue.js, Node.js, Freelancer">
    <meta name="author" content="Max Pawellek">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Max Pawellek - Web- & Softwareentwickler">
    <meta property="og:description" content="Mein Portfolio mit Projekten aus Webentwicklung & Softwareentwicklung. Lass uns neues erschaffen!!">
    <meta property="og:url" content="https://www.maxpawellek.de">
    <meta property="og:type" content="website">
    <!--
        ToDo: Add preview image and icons
        <meta property="og:image" content="https://www.maxpawellek.de/assets/meta/preview.jpg">
        <link rel="icon" href="https://www.maxpawellek.de/assets/meta/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="https://www.maxpawellek.de/assets/meta/apple-touch-icon.png">
    -->

    <link rel="canonical" href="https://www.maxpawellek.de">

    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <!-- Matomo -->
    <script>
        let _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            let u="//analytics.maxpawellek.de/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '1']);
            let d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->
</head>
<body>
    <nav>
        <a class="nav-item" href="/experience">Erfahrung</a>
        <a class="nav-item" href="/projects">Projekte</a>
        <a class="nav-item" href="/skills">Skills</a>
        <a class="nav-item" href="/contact">Kontakt</a>
    </nav>
    
    <section id="experience">
        <div class="experience-ship">
            <!-- Uncomment after training is finished
            <div class="experience-box">
                <div class="experience-item">
                    <h3>KIWI. Werbeagentur GmbH</h3>
                    <h5>Auszubildender</h5>
                </div>
            </div> -->
            <div class="experience-container">
                <h2>KIWI. Werbeagentur GmbH</h2>
                <h4>Aug 2024 - <!-- Jul 2027 --> Jetzt</h4>
                <h4>Auszubildender zum Fachinformatiker für Anwendungsentwicklung</h4>
                <div class="experience-content">
                    <h3><span class="list-icon">&#9654;</span> Frontend-Entwicklung</h3>
                    <ul>
                        <li>Umsetzung von Weblayouts mit HTML, CSS (Sass/SCSS) und JavaScript</li>
                        <li>Einbau interaktiver Komponenten und Responsiveness</li>
                        <li>Verwendung moderner Frontend-Frameworks (Vue, Contao) und Libraries (jQuery)</li>
                    </ul>
                    <h3><span class="list-icon">&#9654;</span> Backend-Entwicklung</h3>
                    <ul>
                        <li>Konzeption und Implementierung von Serverfunktionen</li>
                        <li>Arbeiten mit Datenbanken (MySQL)</li>
                        <li>Einsatz von Frameworks wie Express (Node.js)</li>
                    </ul>
                    <h3><span class="list-icon">&#9654;</span> API-Erstellung</h3>
                    <ul>
                        <li>Entwicklung von REST-APIs mit Node.js und Express</li>
                        <li>Dokumentierung einer API-Schnittstelle mit Swagger (OpenAPI)</li>
                    </ul>
                    <h3><span class="list-icon">&#9654;</span> CMS</h3>
                    <ul>
                        <li>Anpassung von Templates und Modulen in Contao</li>
                        <li>Einspielen von Contao Updates über Trakked und den Contao Manager</li>
                    </ul>
                    <h3><span class="list-icon">&#9654;</span> Git(Hub)</h3>
                    <ul>
                        <li>Nutzung von Git und GitHub für die Zusammenarbeit im Team</li>
                        <li>Erstellen und Verwalten von GitHub-Tags und Releases</li>
                        <li>Branch-Strategien</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="projects">
        <div class="section-title">
            <h1>Projekte</h1>
            <h4>Hier findest du meine persönlichen Projekte, an denen ich in meiner Freizeit arbeite.</h4>
        </div>
        <div class="projects-container">
            <?php
                include "includes/projects.php";
            ?>
        </div>
    </section>
    <section id="skills">
        <div class="section-title">
            <h1>Skills</h1>
            <h4>Hier findest du die Technologien & Tools, mit denen ich arbeite</h4>
        </div>
        <div class="lang_container">
            <div class="lang_box">
                <h2>Frontend</h2>
                <div class="hex-grid">
                    <div class="hex" title="HTML5"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5"></div>
                    <div class="hex" title="CSS3"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3"></div>
                    <div class="hex" title="JavaScript"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript"></div>
                    <div class="hex" title="SASS"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg" alt="SASS"></div>
                    <div class="hex" title="Vue.js"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" alt="Vue.js"></div>
                </div>
            </div>
            <div class="lang_box">
                <h2>Backend</h2>
                <div class="hex-grid">
                    <div class="hex" title="PHP"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP"></div>
                    <div class="hex" title="Node.js"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" alt="Node.js"></div>
                    <div class="hex" title="Express"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg" alt="Express"></div>
                    <div class="hex" title="GitHub"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <form action="index.php" method="post">
            <h1>Kontakt</h1>
            <h4>Hast du eine coole Idee, ein spannendes Projekt oder einfach Lust auf einen Austausch? Schreib mir!</h4>

            <label for="name">Name<span class="required-star" title="required">*</span>:</label>
            <input type="text" id="name" name="name" placeholder="Max Mustermann" <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? "value='" . $_POST['name'] . "'" : "" ?> />
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $form_error = false;
                    if (empty($_POST["name"])) {
                        echo("<span class='form-error'>Der Name darf nicht leer sein.</span>");
                        $form_error = true;
                    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß\s-]+$/", $_POST["name"])) {
                        echo("<span class='form-error'>Der Name darf nur Buchstaben und Leerzeichen enthalten.</span>");
                        $form_error = true;
                    }
                }
            ?>

            <label for="email">E-Mail-Adresse<span class="required-star" title="required">*</span>:</label>
            <input type="email" id="email" name="email" placeholder="max@mustermann.de" <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? "value='" . $_POST['email'] . "'" : "" ?> />
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["email"])) {
                        echo("<span class='form-error'>Die E-Mail-Adresse darf nicht leer sein.</span>");
                        $form_error = true;
                    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        echo("<span class='form-error'>Bitte eine gültige E-Mail-Adresse eingeben.</span>");
                        $form_error = true;
                    }
                }
            ?>

            <label for="message">Nachricht<span class="required-star" title="required">*</span>:</label>
            <textarea id="message" name="message" placeholder=""><?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST['message'] : "" ?></textarea>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["message"])) {
                        echo("<span class='form-error'>Die Nachricht darf nicht leer sein.</span>");
                        $form_error = true;
                    } elseif (strlen($_POST["message"]) < 10) {
                        echo("<span class='form-error'>Die Nachricht muss mindestens 10 Zeichen lang sein.</span>");
                        $form_error = true;
                    }
                }
            ?>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!$form_error) {
                    echo "<p style='color: var(--secondary-color);'>Formular erfolgreich gesendet!</p>";

                    $to = "info@maxpawellek.de";
                    $subject = "Neue Nachricht von " . htmlspecialchars($_POST["name"]);
                    $message = htmlspecialchars($_POST["message"]);
                    $headers = "From: " . htmlspecialchars($_POST["email"]);

                    mail($to, $subject, $message, $headers);
                }
                header("Location: index.php#contact");
            }
            ?>

            <button type="submit">Absenden</button>
            <h4>Alternativ schreibe mir gerne direkt eine <a href="mailto:info@maxpawellek.de">Mail</a></h4>
        </form>
    </section>
</body>
</html>