# APIHelper

APIHelper est une classe PHP conçue pour faciliter les opérations CRUD (Create, Read, Update, Delete) sur une API en utilisant des requêtes HTTP à l'aide de cURL.

## Fonctionnalités

- Effectuer des requêtes HTTP POST, GET, PUT et DELETE vers une API.
- Faciliter la création, la lecture, la mise à jour et la suppression d'éléments via l'API.

## Exigences

- PHP 5.6 ou supérieur
- L'extension cURL doit être activée

## Installation

1. Clonez ce dépôt vers votre projet : https://github.com/Ibrahimzongo/api-helper.git

2. Incluez la classe APIHelper dans votre code PHP :

```php
require_once 'chemin_vers_la_classe/APIHelper.php';

// Créez une instance d'APIHelper en spécifiant l'URL de votre API
$apiUrl = 'https://example-api.com/items/';
$apiHelper = new APIHelper($apiUrl);

// Exemples d'utilisation

// Créer un nouvel élément
$newItemData = array('name' => 'Nouvel élément', 'description' => 'Ceci est un nouvel élément.');
$createdItem = $apiHelper->createItem($newItemData);

// Lire tous les éléments
$items = $apiHelper->readAllItems();

// Lire un élément par son ID
$itemId = 1;
$item = $apiHelper->readItemById($itemId);

// Mettre à jour un élément
$itemIdToUpdate = 1;
$updatedItemData = array('name' => 'Nom mis à jour', 'description' => 'Description mise à jour.');
$updatedItem = $apiHelper->updateItem($itemIdToUpdate, $updatedItemData);

// Supprimer un élément
$itemIdToDelete = 1;
$deletedItem = $apiHelper->deleteItem($itemIdToDelete);

```
## Contributions
Les contributions sont les bienvenues ! Si vous souhaitez améliorer ce projet ou signaler des problèmes, n'hésitez pas à ouvrir une demande de pull ou un ticket d'issue.

## Licence
Ce projet est sous licence MIT.
