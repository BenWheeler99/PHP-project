<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Shipments</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Shipment.php';

$shipmentModel = new Shipment($pdo);
$shipments = $shipmentModel->getAll();

echo "<h1>Shipments</h1>";

foreach ($shipments as $shipment) {
    echo $shipment['origin'] . " → " . $shipment['destination'];
    echo " <a href='?edit=" . $shipment['id'] . "'>Edit</a>";
    echo " <a href='?delete=" . $shipment['id'] . "'>Delete</a>";
    echo "<br>";
}
if (isset($_GET['delete'])) {
    $shipmentModel->delete($_GET['delete']);
}

?>
</body>
</html>
