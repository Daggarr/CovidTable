<?php

require_once 'vendor/autoload.php';

use App\CovidData;

$data = new CovidData();
$records = $data->getRecords();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Covid data</title>
</head>
<body>
    <form action="searchByCountry.php" method="get">
        <div class="form-group">
            <label for="countryInput">Search by country</label>
            <input type="text" class="form-control" id="countryInput" name="country" placeholder="Enter country name">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Datums</th>
            <th scope="col">Valsts</th>
            <th scope="col">14DienuIncidence</th>
            <th scope="col">Izcelošana</th>
            <th scope="col">Pašizolācija</th>
            <th scope="col">Vakc_PašizolācijaLV</th>
            <th scope="col">Vakc_TestsPirmsIebraukšanaLV</th>
            <th scope="col">Vakc_TestsPēcIebraukšanasLV</th>
            <th scope="col">Citi_PašizolācijaLV</th>
            <th scope="col">Citi_TestsPirmsIebraukšanasLV</th>
            <th scope="col">Citi_TestsPēcIebraukšanasLV</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>
                <th scope="row"><?php echo $record['Datums']; ?></th>
                <td><?php echo $record['Valsts']; ?></td>
                <td><?php echo $record['14DienuKumulativaIncidence']; ?></td>
                <td><?php echo $record['Izcelosana']; ?></td>
                <td><?php echo $record['Pasizolacija']; ?></td>
                <td><?php echo $record['PersIrVakcParslSert_PasizolacijaLatvija']; ?></td>
                <td><?php echo $record['PersIrVakcParslSert_TestsPirmsIebrauksanasLV']; ?></td>
                <td><?php echo $record['PersIrVakcParslSert_TestsPecIebrauksanasLV']; ?></td>
                <td><?php echo $record['CitasPersonas_PasizolacijaLatvija']; ?></td>
                <td><?php echo $record['CitasPersonas_TestsPirmsIebrauksanasLV']; ?></td>
                <td><?php echo $record['CitasPersonas_TestsPecIebrauksanasLV']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
