<?php

class APIHelper
{
    private $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    private function makeRequest($url, $method, $data = [])
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        if ($method === 'POST' || $method === 'PUT') {
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function createItem($data)
    {
        $createdItem = $this->makeRequest($this->apiUrl, 'POST', $data);
        return $createdItem;
    }

    public function readAllItems()
    {
        $items = $this->makeRequest($this->apiUrl, 'GET');
        return $items;
    }

    public function readItemById($itemId)
    {
        $item = $this->makeRequest($this->apiUrl . $itemId, 'GET');
        return $item;
    }

    public function updateItem($itemId, $data)
    {
        $updatedItem = $this->makeRequest($this->apiUrl . $itemId, 'PUT', $data);
        return $updatedItem;
    }

    public function deleteItem($itemId)
    {
        $deletedItem = $this->makeRequest($this->apiUrl . $itemId, 'DELETE');
        return $deletedItem;
    }
}