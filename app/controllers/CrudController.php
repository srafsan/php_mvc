<?php

namespace App\Controllers;

use App\Models\Database;

class CrudController
{
    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function handleRequest(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['create'])) {
                $data = [
                  "name" => $_POST["name"],
                  "mobile" => $_POST["mobile"],
                  "email" => $_POST["email"],
                  "password" => $_POST["password"],
                ];
                $this->createRecord($data);
            } elseif (isset($_POST['update'])) {
                $data = [
                  "name" => $_POST["name"],
                  "mobile" => $_POST["mobile"],
                  "email" => $_POST["email"],
                  "password" => $_POST["password"],
                ];
                $this->updateRecord($data, $_POST['record_id']);
            } elseif (isset($_POST['delete'])) {
                $this->deleteRecord($_POST['record_id']);
            }
        }
    }

    private function createRecord($data): void
    {
        $this->db->insert("crud", $data);
    }

    private function updateRecord($data, $record_id): void
    {
        $where = "id = " . $_POST['record_id'];
        $this->db->update("crud", $data, $where);
    }

    private function deleteRecord($record_id): void
    {
        $where = "id = " . $record_id;
        $this->db->delete("crud", $where);
    }

    public function getRecords(): array|false
    {
        return $this->db->select("crud");
    }
}