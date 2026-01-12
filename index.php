<?php
# Define API URL
const API_URL = "https://whenisthenextmcufilm.com/api";
// Initialize cURL session | ch = cURL handle
$ch = curl_init(API_URL);
// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecute cURL req para obtener datos
$result = curl_exec($ch);
// Decodifica JSON response a array asociativo
$data = json_decode($result, true);
// Cierra cURL session
curl_close($ch);
// Debug: Muestra datos obtenidos
var_dump($data);

/* Alternativa para obtener datos sin cURL
$result = file_get_contents(API_URL);
 */
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta description="Find out when the next Marvel Cinematic Universe film is releasing with data from WhenIsTheNextMCUFilm.com" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>When is the Next MCU Film?</title>
</head>

<main>
    <pre style="font-size: 8px; overflow: scroll; height: 250px">
        <?php var_dump($data); ?>
    </pre>
    <section>
        <img src="<?= $data['poster_url'] ?>" width="300" alt="Image of <?= $data['title'] ?>" style="border-radius: 10px;" />
    </section>
    <hgroup>
        <h2><?= $data['title'] ?> se estrena en <?= $data['days_until'] ?></h2>
        <p>Proximamente en cines a partir del <?= $data['release_date'] ?></p>
        <p>La siguiente es: <?= $data['following_production']['title'] ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        align-items: center;
        place-content: center;
        height: 100vh;
        text-align: center;
    }
</style>