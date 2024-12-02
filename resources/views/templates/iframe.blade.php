<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prévisualisation Responsive</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers les icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Styles globaux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #343a40;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .navbar-brand:hover {
            color: #ddd;
            text-decoration: none;
        }

        .nav-buttons button {
            margin: 0 5px;
            background-color: #495057;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .nav-buttons button:hover {
            background-color: #007bff;
        }

        /* Conteneur principal */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #preview-container {
            border: 1px solid #ccc;
            background: white;
            padding: 10px;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        iframe {
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Résolutions */
        .desktop {
            width: 1200px;
            height: 800px;
        }

        .tablet {
            width: 768px;
            height: 1024px;
        }

        .mobile {
            width: 375px;
            height: 667px;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar">
        <a href="{{url('/templates')}}" class="btn btn-secondary">Back to Templates</a>
        <div class="nav-buttons">
            <button onclick="changePreview('desktop')" title="Bureau">
                <i class="bi bi-display"></i>
            </button>
            <button onclick="changePreview('tablet')" title="Tablette">
                <i class="bi bi-tablet"></i>
            </button>
            <button onclick="changePreview('mobile')" title="Mobile">
                <i class="bi bi-phone"></i>
            </button>
        </div>
        <div>
            <a href="{{url('/builder')}}" class="btn btn-outline-warning">Start Your Design</a>
        </div>
    </nav>

    <!-- Conteneur principal -->
    <div class="main-content">
        <div id="preview-container">
            <iframe id="preview-frame" src="{{ url($template->file_path) }}" class="desktop" frameborder="0"></iframe>
        </div>
    </div>

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changePreview(mode) {
            const frame = document.getElementById("preview-frame");

            // Supprimer toutes les classes actuelles
            frame.className = "";

            // Ajouter la classe correspondant au mode
            switch (mode) {
                case "desktop":
                    frame.classList.add("desktop");
                    break;
                case "tablet":
                    frame.classList.add("tablet");
                    break;
                case "mobile":
                    frame.classList.add("mobile");
                    break;
                default:
                    console.error("Mode inconnu :", mode);
            }
        }
    </script>
</body>
</html>
