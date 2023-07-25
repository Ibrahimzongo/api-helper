# APIClient

APIClient est une classe PHP conçue pour faciliter les opérations CRUD (Create, Read, Update, Delete) sur une API en utilisant des requêtes HTTP.

## Fonctionnalités

- Effectuer des requêtes HTTP POST, GET, PUT et DELETE vers une API.
- Faciliter la création, la lecture, la mise à jour et la suppression d'éléments via l'API.

## Exigences

- PHP 7.2.5 ou supérieur
- guzzlehttp/guzzle 7.7

## Installation

1. Clonez ce dépôt vers votre projet : https://github.com/Ibrahimzongo/api-helper.git

2. Incluez la classe APIClient dans votre code PHP :

```php
require_once 'chemin_vers_la_classe/APIClient.php';

// Utilisation de la classe ApiClient pour consommer l'API

$baseURL = 'http://localhost:8000'; // Remplacez cela par l'URL de votre API
$apiClient = new ApiClient($baseURL);

// Authentification
if ($apiClient->authenticate('nom_d_utilisateur', 'mot_de_passe')) {
    //Exemple d'utilisation des méthodes de la classe ApiClient
    $allUsers = $apiClient->getAllUsers();
    $userDetails = $apiClient->getOneUser('azongo');
    $newUserData = [
        'username' => 'nom_d_utilisateur',
        'password' => 'mot_de_passe',
    ];
    $createdUser = $apiClient->createUser($newUserData);
    $usernameToUpdate = 'nom_utilisateur_a_modifier';
    $updatedUserData = [
        'password' => 'nouveau_mot_de_passe',
    ];
    $updatedUser = $apiClient->updateUser($usernameToUpdate, $updatedUserData);
    $usernameToDelete = 'nom_utilisateur_a_supprimer';
    $deleteResult = $apiClient->deleteUser($usernameToDelete);
} else {
    echo 'Échec de l\'authentification.';
}

```
## Contributions
Les contributions sont les bienvenues ! Si vous souhaitez améliorer ce projet ou signaler des problèmes, n'hésitez pas à ouvrir une demande de pull ou un ticket d'issue.

## Licence
Ce projet est sous licence MIT.
