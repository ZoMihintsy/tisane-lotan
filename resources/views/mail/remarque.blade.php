<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Commentaire / New Comment - TISAN LOTAN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px; /* Adjust logo size as needed */
            height: auto;
            margin-bottom: 10px;
        }
        .header h1 {
            color: #0056b3;
            font-size: 24px;
            margin: 0;
        }
        .content {
            padding-bottom: 20px;
        }
        .content p {
            margin-bottom: 10px;
        }
        .comment-details {
            background-color: #f9f9f9;
            border-left: 5px solid #0056b3;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .comment-details p {
            margin: 5px 0;
        }
        .comment-details strong {
            color: #0056b3;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eee;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .button-container {
            text-align: center;
            margin-top: 30px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff !important; /* Important for email clients */
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
        }
        a {
            color: #0056b3;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Nouveau Commentaire / New Comment</h1>
        </div>
        
        <div class="content">
            <p>Bonjour TISAN LOTAN,</p>
            <p>Un nouveau commentaire a été soumis sur votre site web. Voici les détails :</p>

            <div class="comment-details">
                <p><strong>Nom de l'auteur :</strong> {{ $nom }}</p>
                <p><strong>Email de l'auteur :</strong> <a href="mailto:{{$email}}">{{ $email }}</a></p>
                <p><strong>Commentaire :</strong></p>
                <p style="white-space: pre-wrap;">{{ $messages }}</p>
            </div>

            <div class="button-container">
                <a href="[Lien vers la section d'administration des commentaires]" class="button">Gérer les commentaires</a>
            </div>

            <p>Cordialement,</p>
            <p>L'équipe de TISAN LOTAN</p>
        
        <div class="footer">
            <p>&copy; 2025 TISAN LOTAN. Tous droits réservés. | All rights reserved.</p>
            <p>[Votre site web TISAN LOTAN] | <a href="https://policies.google.com/privacy?hl=fr-CA">Politique de confidentialité</a></p>
            <p>[Your TISAN LOTAN Website] | <a href="https://policies.google.com/privacy?hl=en-US">Privacy Policy</a></p>
        </div>
    </div>
</body>
</html>
