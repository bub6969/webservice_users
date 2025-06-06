<?php
class users
{
    private $conn;
    private $table_name = "users";

    public $username;
    public $password;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

   public function register()
{
        $query = "INSERT INTO " . $this->table_name . " (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bind_param("sss", $this->username, $this->password, $this->email);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
	public function login() 
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bind_param("ss", $this->username, $this->password);

        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0){
            return true; 
        }
        return false;
    }
	
	public function logout()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		$_SESSION = array();
		session_destroy();
		return true;
	}
}
?>