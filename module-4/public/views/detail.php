<?php

require_once __DIR__ . '/../../app/classes/VehicleManager.php';

$vehicleManager = new VehicleManager("", "", "", "");

$id = $_GET['id'] ?? null;

if ($id === null) {
    header("Location: ../index.php");
    exit;
}


$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

include './header.php';

?>


<div class="container my-4">
    <h1>Vehicle Details</h1>

    <div>
        <div class="mb-3">
            <img src="<?= htmlspecialchars($vehicle['image']) ?>" class="container-fluid">
        </div>

        <div class="mb-3">
            <p>Vehicle Name: <?= htmlspecialchars($vehicle['name']) ?></p>
        </div>

        <div class="mb-3">
            <p>Vehicle Type: <?= htmlspecialchars($vehicle['type']) ?></p>
        </div>

        <div class="mb-3">
            <p>Price: $<?= htmlspecialchars($vehicle['price']) ?></p>
        </div>

        <div class="mb-3">
            <a href="../index.php" class="btn btn-danger">Back to Home</a>
        </div>
    </div>
    </body>

    </html>