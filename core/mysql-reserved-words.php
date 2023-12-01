<?php
class ReservedWords // singleton calss
{
    public static array $reservedWords = [];

    private function __construct() {
        // to prevent direct instantitation.
    }
    public static function getReservedWords()
    {
        if (self::$reservedWords == null) {
            $connection = new mysqli('localhost', 'root', '');

            // Retrieve the MySQL server version
            $serverVersion = $connection->get_server_info();

            // Query the information_schema to get the reserved words list
            $query = "SELECT WORD FROM information_schema.KEYWORDS";
            $result = $connection->query($query);

            // Store the reserved words in the class constant array
            while ($row = $result->fetch_assoc()) {
                self::$reservedWords[] = strtolower($row['WORD']);
            }
            $connection->close();
        }
        return static::$reservedWords ;
    }
   
}
?>