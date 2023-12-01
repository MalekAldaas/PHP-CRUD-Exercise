<?php

require_once __DIR__ . "/mysql-reserved-words.php";
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/database-query-builder.php";

class Database
{
    private mysqli $connection;
    use QueryBuilder;

    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }
    public function insert(string $tableName, array $fields, array $values): void
    {
        $this->connection->query($this->prepareInsertString($tableName, $fields, $values));
    }

    public function update(string $tableName, string $idField, string $nameField, $newValue): void
    {
        if ($this->idExists($tableName, $idField) == true) {
            $idField = trim($idField, "'");
            $nameField = trim($nameField, "'");
            $newValue = "'$newValue'";
            $update_query = "UPDATE $tableName SET $nameField = $newValue WHERE id = $idField ;";
            $this->connection->query($update_query);
        } else {
            echo "No Record With Given ID.";
        }
    }
    public function delete(string $tableName, string $idField): void
    {
        if ($this->idExists($tableName, $idField)) {
            $delete_query = "DELETE FROM $tableName WHERE id = $idField; ";
            $this->connection->query($delete_query);
        } else {
            echo "No Record With Given ID.";
        }
    }


    public function select(string $tableName, array $fields = ["*"], array $conditions = null): array
    {
        $selectQuery = $this->prepareSelectString($tableName, $fields, $conditions);
        $result = $this->connection->query($selectQuery);
        $data = $this->fetch($result);

        return $data;
    }


    protected function fetch(mysqli_result $mysqliQueryResult): ?array
    {
        if ($mysqliQueryResult) {
            $data = array();

            while ($row = $mysqliQueryResult->fetch_assoc()) {
                $data[] = $row;
            }
            $mysqliQueryResult->free();

            return $data;

        } else {
            echo "Error Executin SELECT query: " . $this->connection->error;

            return null;
        }
    }
    protected function idExists(string $tableName, string $id): bool
    {
        $data = $this->select($tableName);
        $result = false;

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                if ($key == 'id' && $value == $id) {
                    $result = true;
                }
            }
        }

        return $result;
    }
    public function getExistingIds(string $tableName): array
    {
        $ids = [];
        $data = $this->select($tableName);

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                if ($key == 'id')
                    $ids[] = $value;
            }
        }
        return $ids;
    }

}

?>