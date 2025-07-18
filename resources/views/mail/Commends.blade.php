<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Commande Reçue - TISAN LOTAN</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border: 1px solid #ddd;">
        <div style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #eee; margin-bottom: 20px;">
            <h1 style="color: #d9534f; font-size: 28px; margin: 0;">Nouvelle Commande Reçue !</h1>
        </div>

        <p style="margin-bottom: 10px;">Bonjour l'équipe TISAN LOTAN,</p>
        <p style="margin-bottom: 20px;">Une nouvelle commande a été enregistrée sur votre plateforme. Veuillez la consulter et la traiter rapidement.</p>

        @if($nom)
            <p style="margin-bottom: 15px; font-style: italic;"><strong>Message du client :</strong> <span style="background-color: #fffacd; padding: 5px 10px; border-radius: 4px; display: inline-block;">{{ $nom }}</span></p>
        @endif

        <h2 style="color: #007bff; font-size: 22px; margin-top: 25px; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Produit Commandé : {{ $produit->nom }}</h2>
        <ul style="list-style-type: none; padding: 0; margin: 0 0 20px 0;">
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Description : {{ str_replace('<br />','',$produit->description) }}</li>
            @if($category)
                <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Catégorie : {{ $category->type }}</li>
            @endif
        </ul>

        @if($place)
            <h3 style="color: #007bff; font-size: 18px; margin-top: 25px; margin-bottom: 10px;">Informations sur le Point de retrait :</h3>
            <ul style="list-style-type: none; padding: 0; margin: 0 0 20px 0;">
                <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Nom : {{ $place->nom }}</li>
                <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Ville : {{ $place->ville }}</li>
                <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Code postal : {{ $place->code_postale }}</li>
            </ul>
        @endif

        @if($date && $heure)
            <h3 style="color: #007bff; font-size: 18px; margin-top: 25px; margin-bottom: 10px;">Détails du Rendez-vous :</h3>
            <ul style="list-style-type: none; padding: 0; margin: 0 0 20px 0;">
                <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Date : {{ $date }}</li>
                <li style="margin-bottom: 8px; padding-left: 20px; position: relative;"><span style="position: absolute; left: 0; color: #007bff;">&#8227;</span> Heure : {{ $heure }}</li>
            </ul>
        @endif

        <p style="margin-top: 30px; margin-bottom: 10px; font-weight: bold;">Action requise : Veuillez traiter cette commande dès que possible.</p>

        <div style="text-align: center; margin-top: 30px;">
            <a href="#" style="display: inline-block; background-color: #28a745; color: #ffffff !important; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 16px;">Accéder aux Commandes</a>
        </div>

        <p style="margin-top: 30px; margin-bottom: 10px;">Cordialement,</p>
        <p style="margin-top: 10px; font-weight: bold;">Votre système de notification automatique TISAN LOTAN</p>

        <div style="text-align: center; padding-top: 20px; border-top: 1px solid #eee; margin-top: 30px; font-size: 12px; color: #777;">
            <p>&copy; {{date('Y')}} TISAN LOTAN. Tous droits réservés.</p>
            <p><a href="#" style="color: #0056b3; text-decoration: none;">Votre site web TISAN LOTAN</a></p>
        </div>
    </div>
</body>
</html>