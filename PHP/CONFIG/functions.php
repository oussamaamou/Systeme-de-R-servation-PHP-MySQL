<?php

// L'Ajout d'un client
function addClient($nom, $prenom, $email, $telephone, $mot_de_passe, $username, $role) {
    global $conn;
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (Nom_client, Prenom_client, Email_client, Telephone_client, Mot_de_passe, Username, Role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nom, $prenom, $email, $telephone, $mot_de_passe, $username, $role);
    return $stmt->execute();
}



// // Affichage des clients
// function getAllClients() {
//     global $conn;
//     $result = $conn->query("SELECT * FROM users");
//     return $result->fetch_all(MYSQLI_ASSOC);
// }


// // Suppression d'un client
// function deleteClient($id) {
//     global $conn;
//     $stmt = $conn->prepare("DELETE FROM users WHERE ID = ?");
//     $stmt->bind_param("i", $id);
//     return $stmt->execute();
// }



// // L'Ajout d'une réservation
// function addReservation($idActivite, $nom, $prenom, $telephone, $dateReservation) {
//     global $conn;
//     $stmt = $conn->prepare("INSERT INTO reservationsdata (ID_activite, Nom_reservant, Prenom_reservant, Telephone_reservant, Date_reservation, Statut) VALUES (?, ?, ?, ?, ?, ?)");
//     $statut = 'Confirmée';
//     $stmt->bind_param("isssss",$idActivite, $nom, $prenom, $telephone, $dateReservation, $statut);
//     return $stmt->execute();
// }







// // Affichage des activités
// function getAvailableActivities() {
//     global $conn;
//     $result = $conn->query("SELECT * FROM activitesdata WHERE Disponibilite = 1");
//     return $result->fetch_all(MYSQLI_ASSOC);
// }


?>
