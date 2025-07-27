<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .content { margin-bottom: 30px; }
        .button { 
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer { text-align: center; font-size: 0.9em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Bienvenido/a a {{ $appName }}! 📚</h1>
        </div>

        <div class="content">
            <p>Hola {{ $nombre }},</p>

            <p>¡Bienvenido/a a {{ $appName }}, tu nuevo espacio para descubrir, leer y disfrutar de los mejores libros en línea!</p>

            <p>Gracias por registrarte. Desde ahora puedes:</p>

            <ul>
                <li>✅ Explorar nuestro catálogo con muchos títulos.</li>
                <li>✅ Crear tu lista de favoritos.</li>
                <li>✅ Descargar libros.</li>
            </ul>

            <p><strong>¿Qué puedes hacer ahora?</strong></p>
            <p>
                <a href="{{ $catalogUrl }}" class="button">🔍 Ver catálogo de libros</a>
            </p>

            <p>Si tienes alguna duda o necesitas ayuda, no dudes en escribirnos a soporte@{{ str_replace(['http://', 'https://', 'www.'], '', config('app.url')) }}</p>

            <p>¡Nos alegra tenerte con nosotros!</p>
        </div>

        <div class="footer">
            <p>Un saludo cordial,<br>El equipo de {{ $appName }}</p>
        </div>
     </div>
    </body>
</html>