<?php
include 'config.php';
include 'includes/functions.php';

$reservationId = $_GET['id'];

if (deleteReservation($reservationId)) {
    echo "Réservation supprimée avec succès!";
} else {
    echo "Erreur lors de la suppression de la réservation.";
}
?>
