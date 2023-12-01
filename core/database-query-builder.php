<?php


require_once __DIR__ . '/connection.php';
require_once __DIR__ . '/mysql-reserved-words.php';

trait QueryBuilder
{
    
    protected function prepareInsertString(string $tableName, array $fields, array $values): string
    {
        $values = array_map(function (string $str) {
            if (in_array(strtolower($str), ReservedWords::getReservedWords()))
                return $str;
            else
                return "'$str'";
        }, $values);
        $create_query = "INSERT INTO $tableName (" . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ');';

        return $create_query;
    }
    protected function prepareSelectString(string $tableName, array $fields = ["*"], array $conditions = null): string
    {
        $selectQuery = "SELECT " . implode(', ', $fields) . " FROM $tableName ";
        if ($conditions != null) {
            $selectQuery = $selectQuery . implode(' AND ', $conditions);
        }
        $selectQuery .= ';';

        return $selectQuery;
    }

}