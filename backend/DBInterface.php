<?php

include_once 'config.php';

class DBInterface
{
    private $database;

    function __construct()
    {
        global $CONFIG;
        $dsn = "mysql:host=" . $CONFIG['bdd_hostname'] . "; dbname=" . $CONFIG['bdd_dbname'] . ";";
        $this->database = new PDO($dsn, $CONFIG['bdd_user'], $CONFIG['bdd_password']);
    }

    function isUserValid($username = NULL, $password = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $req->execute(array($username, hash('whirlpool', $password)));

        return !($req->fetch() == NULL);
    }

    function isUserExist($username = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM users WHERE username = ?');
        $req->execute(array($username));

        return !($req->fetch() == NULL);
    }

    function isMailAlreadyTaken($mail = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM users WHERE mail = ?');
        $req->execute(array($mail));

        return !($req->fetch() == NULL);
    }

    function addUser($username = NULL, $password = NULL, $mail = NULL, $age = NULL, $sex = 0, $city = NULL)
    {
        $req = $this->database->prepare('INSERT INTO users(username, password, mail, genre, ville, age) VALUES(:username, :password, :mail, :genre, :ville, :age)');
        $req->execute(array(
            'username' => $username,
            'password' => hash('whirlpool', $password),
            'mail' => $mail,
            'genre' => $sex,
            'ville' => $city,
            'age' => $age,
        ));

    }

    function updateUserInfo($username = NULL, $age = NULL, $sex = 0, $city = NULL)
    {
        $req = $this->database->prepare('UPDATE users SET age = :age, ville = :ville, genre = :sex WHERE username = :username');
        $req->execute(array(
            'username' => $username,
            'age' => $age,
            'ville' => $ville,
            'genre' => $sex,
        ));
    }

    function getUser($username = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM users WHERE username = ?');
        $req->execute(array($username));

        return $req->fetch();
    }

    function getAssociation($id)
    {
        if(empty($id))
            return false;

        $req = $this->database->prepare('SELECT * FROM associations WHERE id = ?');
        $req->execute(array($id));

        return $req->fetch();
    }

    function getProject($id)
    {
        if(empty($id))
            return false;

        $req = $this->database->prepare('SELECT * FROM projects WHERE id = ?');
        $req->execute(array($id));

        return $req->fetch();
    }

    function getProjects($idAssoc)
    {
        if(empty($idAssoc))
            return false;

        $req = $this->database->prepare('SELECT * FROM projects WHERE id_owner = ?');
        $req->execute(array($idAssoc));

        return $req->fetchAll();
    }
}

?>
