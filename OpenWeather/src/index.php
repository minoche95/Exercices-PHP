<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Météo</title>
</head>
<body>
    <h1>Consulter la météo</h1>
    <form method="GET" action="">
        <input type="text" name="city" placeholder="Entrez une ville..." required>
        <button type="submit">Voir la météo</button>
    </form>

    <?php
    // Charger dépendances de Composer
    require '../vendor/autoload.php';
    use GuzzleHttp\Client;

    // Vérifier si une ville a été soumise sinon utiliser 'Nice'
    $city = $_GET['city'] ?? 'Nice';

    if (isset($_GET['city'])) {
        $client = new Client();

        try {
            // Envoyer requête a l'API OpenWeather
            $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
                'query' => [
                    'q' => $city,
                    'appid' => '28f5002c5e3215de8717c819f46e701e',
                    'units' => 'metric',
                    'lang' => 'fr'
                ]
            ]);

            // Décodage JSON
            $data = json_decode($response->getBody(), true);

            // Affichage des infos météo
            echo "<h2>Résultat pour : " . htmlspecialchars($data['name']) . "</h2>";
            echo "<p><strong>Météo :</strong> " . htmlspecialchars($data['weather'][0]['description']) . "</p>";
            echo "<p><strong>Température :</strong> " . htmlspecialchars($data['main']['temp']) . " °C</p>";
            echo "<p><strong>Humidité :</strong> " . htmlspecialchars($data['main']['humidity']) . " %</p>";

        } catch (Exception $e) {
            // Erreurs
            echo "Erreur lors de la récupération des données : " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
</body>
</html>