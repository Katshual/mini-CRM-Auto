<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Campagnes</title>
    <!-- Inclusion des styles générés par Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">

    <!-- Section pour créer une nouvelle campagne -->
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-4">Créer une Campagne</h2>

        <!-- Formulaire pour ajouter une campagne -->
        <form action="{{ route('campaigns.store') }}" method="POST">
            @csrf <!-- Protection CSRF pour sécuriser le formulaire -->
            <!-- Champ pour le titre de la campagne -->
            <input type="text" name="title" placeholder="Titre" class="w-full p-2 border rounded mb-2">
            <!-- Champ pour le message de la campagne -->
            <textarea name="message" placeholder="Message" class="w-full p-2 border rounded mb-2"></textarea>
            <!-- Champ pour la date et l'heure d'envoi -->
            <input type="datetime-local" name="send_at" class="w-full p-2 border rounded mb-2">
            <!-- Bouton pour soumettre le formulaire -->
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Créer</button>
        </form>
    </div>

    <!-- Section pour afficher les campagnes existantes -->
    <div class="max-w-lg mx-auto mt-6">
        <h2 class="text-xl font-semibold">Campagnes Existantes</h2>
        @foreach($campaigns as $campaign) <!-- Boucle sur les campagnes -->
            <div class="bg-white p-4 rounded shadow mt-2">
                <!-- Affichage du titre de la campagne -->
                <h3 class="font-bold">{{ $campaign->title }}</h3>
                <!-- Affichage du message de la campagne -->
                <p>{{ $campaign->message }}</p>
                <!-- Affichage de la date d'envoi prévue -->
                <p class="text-gray-500 text-sm">Envoi prévu : {{ $campaign->send_at }}</p>
            </div>
        @endforeach
    </div>

</body>
</html>
