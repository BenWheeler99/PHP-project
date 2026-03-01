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

# This section makes sure required files are included and initializes the Shipment model
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Shipment.php';

# Initialize Shipment model and fetch all shipments
$shipmentModel = new Shipment($pdo);
$shipments = $shipmentModel->getAll();

# Display shipments and provide edit/delete links
echo "<h1>Shipments</h1>";

# Loop through shipments and display them with edit and delete options
foreach ($shipments as $shipment) {
    echo $shipment['origin'] . " → " . $shipment['destination'];
    echo " <a href='?edit=" . $shipment['id'] . "'>Edit</a>";
    echo " <a href='?delete=" . $shipment['id'] . "'>Delete</a>";
    echo "<br>";
}
# Handle delete action if 'delete' parameter is set in the URL
if (isset($_GET['delete'])) {
    $shipmentModel->delete($_GET['delete']);
}

?>
</body>
</html>
