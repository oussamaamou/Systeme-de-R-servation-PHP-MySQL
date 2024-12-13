<?php
include 'config.php';
include 'includes/functions.php';

$activityId = $_GET['id'];

if (deleteActivity($activityId)) {
    echo "Activité supprimée avec succès!";
} else {
    echo "Erreur lors de la suppression de l'activité.";
}
?>
