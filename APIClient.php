<?php

require 'vendor/autoload.php'; // Inclure l'autoloader de GuzzleHTTP

use GuzzleHttp\Client;

class ApiClient
{
    private $baseURL;
    private $client;
    private $token;

    public function __construct($baseURL)
    {
        $this->baseURL = $baseURL;

        // Initialiser le client GuzzleHTTP
        $this->client = new Client([
            'base_uri' => $this->baseURL,
            'timeout' => 10,
        ]);
    }

    public function authenticate($endPointForAuth,$username,$password)
    {
        $loginEndpoint = $endPointForAuth; 

        try {
            $response = $this->client->post($loginEndpoint, [
                'json' => [
                    'username' => $username,
                    'password' => $password,
                ],
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);
            $this->token = $responseData["message"]["token"];

            $this->client = new Client([
                'base_uri' => $this->baseURL,
                'timeout' => 10,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept' => 'application/json',
                ],
            ]);

            return true;
        } catch (GuzzleHttp\Exception\RequestException $e) {
            echo 'Erreur de requête : ' . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public function getAllUsers($endPoint)
    {
        $getAllUsersEndpoint = $endPoint;

        try {
            $response = $this->client->get($getAllUsersEndpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            echo 'Erreur de requête : ' . $e->getMessage();
            return [];
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public function getOneUser($endPoint,$params)
    {
        $getOneUserEndpoint = $endPoint . $params;

        try {
            $response = $this->client->get($getOneUserEndpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            echo 'Erreur de requête : ' . $e->getMessage();
            return null;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return null;
        }
    }

    public function createUser($endPoint,$userData)
    {
        $createUserEndpoint = $endPoint;

        try {
            $response = $this->client->post($createUserEndpoint, [
                'json' => $userData,
            ]);

            return $response->getBody()->getContents();
        } catch (GuzzleHttp\Exception\RequestException $e) {
            echo 'Erreur de requête : ' . $e->getMessage();
            return null;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return null;
        }
    }

    public function updateUser($endPoint,$params,$userData)
    {
        $updateUserEndpoint = $endPoint . $params;

        try {
            $response = $this->client->put($updateUserEndpoint, [
                'json' => $userData,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            echo 'Erreur de requête : ' . $e->getMessage();
            return null;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return null;
        }
    }
      //Exemple endPoint : /users/
    public function deleteUser($enPoint,$params)
    {
        $deleteUserEndpoint = $enPoint . $params;

        try {
            $response = $this->client->delete($deleteUserEndpoint);
            return $response->getBody()->getContents();
        } catch (GuzzleHttp\Exception\RequestException $e) {
            echo 'Erreur de requête : ' . $e->getMessage();
            return null;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return null;
        }
    }
}
