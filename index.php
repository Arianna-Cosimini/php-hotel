<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => "10.4 Km",
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => "2 km"
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => "1 Km"
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => "5.5 Km"
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => "50 m"
    ],

];



$parking = isset($_GET['parking']);
$bestHotel = isset($_GET['bestHotel']);
$index = 1 ; // Variabile per contare il numero di righe


?>








<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <title>Hotels</title>
</head>

<body>


    <div class="container p-5">

        <form action="index.php" method="GET" class="d-flex flex-column justify-content-center align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" id="parking" name="parking">
                <label class="form-check-label" for="parking">
                    Hotel con parcheggio
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" id="bestHotel" name="bestHotel" <?php if ($bestHotel) echo 'checked'; ?>>
                <label class="form-check-label" for="bestHotel">
                    Miglior punteggio
                </label>
            </div>
            <button type="submit" class="btn btn-dark">Filtra</button>

        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Distanza dal centro</th>

                </tr>
            </thead>
            <tbody>
                <?php

                foreach($hotels as $hotel){
                    if((!$parking || $hotel['parking']) && (!$bestHotel || $hotel['vote'] >= 3)){

                        echo "<tr>";
                        echo "<th scope='row'>$index</th>";
                        echo "<td>{$hotel['name']}</td>";
                        echo "<td>{$hotel['vote']}</td>";
                        echo "<td>";
                        echo $hotel['parking'] ? "Disponibile" : "Non disponibile";
                        echo "</td>";
                        echo "<td>{$hotel['distance_to_center']}</td>";
                        echo "</tr>";
                        $index++; // Incremento il numero di righe
                    }
                }
                ?>
            </tbody>
        </table>



    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>