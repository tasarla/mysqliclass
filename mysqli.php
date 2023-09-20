class Database {
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($hostname, $username, $password, $database) {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Bağlantı hatası: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Sorgu hatası: " . $this->connection->error);
        }

        return $result;
    }

    public function fetch($result) {
        return $result->fetch_assoc();
    }

    public function escape($value) {
        return $this->connection->real_escape_string($value);
    }

    public function close() {
        $this->connection->close();
    }
}
