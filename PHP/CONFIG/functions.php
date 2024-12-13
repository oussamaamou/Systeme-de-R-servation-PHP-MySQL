<?php

// L'Ajout d'un client
function addClient($nom, $prenom, $email, $telephone) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO clientsdata (Nom_client, Prenom_client, Email_client, Telephone_client) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $prenom, $email, $telephone);
    return $stmt->execute();
}

// Affichage des clients
function getAllClients() {
    global $conn;
    $result = $conn->query("SELECT * FROM clientsdata");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Suppression d'un client
function deleteClient($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM clientsdata WHERE ID = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}


// L'Ajout d'une réservation
function addReservation($idClient, $idActivite, $dateReservation) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO reservationsdata (ID_client, ID_activite, Date_reservation, Statut) VALUES (?, ?, ?, 'Confirmée')");
    $stmt->bind_param("iis", $idClient, $idActivite, $dateReservation);
    return $stmt->execute();
}

// L'Ajout d'une activité
function addActivity($nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO activitesdata (Nom_activite, Description_activite, Capacite_activite, date_debut, date_fin, Disponibilite) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisis", $nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite);
    return $stmt->execute();
}

// Affichage des activités
function getAvailableActivities() {
    global $conn;
    $result = $conn->query("SELECT * FROM activitesdata WHERE Disponibilite = 1");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Suppression d'une réservation
function deleteReservation($idReservation) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM reservationsdata WHERE ID = ?");
    $stmt->bind_param("i", $idReservation);
    return $stmt->execute();
}

// Suppression d'une activité
function deleteActivity($idActivity) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM activitesdata WHERE ID = ?");
    $stmt->bind_param("i", $idActivity);
    return $stmt->execute();
}
?>
