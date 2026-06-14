<?php
class ConnectDB {
    private static $host = "localhost";
    private static $db_name = "68pm34";
    private static $username = "root";
    private static $password = "";
    public $conn;

    public static function Connect() {
        /*
        Key changes:

Remove static keyword from public static function Connect() → public function Connect()
Change self::$host to $this->host (and similarly for other properties)
Properties remain as private instance properties (no need for static)
Usage difference:

Static method: ConnectDB::Connect() - call directly on the class
Instance method: $db = new ConnectDB(); $db->Connect(); - must create an object first
The static approach is better for database connection utilities since you don't need multiple instances. But if you prefer instance methods, this would work too.
    */
        $conn = null;
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
    }
}