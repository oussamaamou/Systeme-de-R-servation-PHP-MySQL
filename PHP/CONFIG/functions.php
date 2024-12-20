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
function addReservation($idActivite, $nom, $prenom, $telephone, $dateReservation) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO reservationsdata (ID_activite, Nom_reservant, Prenom_reservant, Telephone_reservant, Date_reservation, Statut) VALUES (?, ?, ?, ?, ?, ?)");
    $statut = 'Confirmée';
    $stmt->bind_param("isssss",$idActivite, $nom, $prenom, $telephone, $dateReservation, $statut);
    return $stmt->execute();
}



// L'Ajout d'une activité
function addActivity($nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO activitesdata (Nom_activite, Description_activite, Capacite_activite, date_debut, date_fin, Disponibilite) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissi", $nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite);
    return $stmt->execute();
}



// Affichage des activités
function getAvailableActivities() {
    global $conn;
    $result = $conn->query("SELECT * FROM activitesdata WHERE Disponibilite = 1");
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>
