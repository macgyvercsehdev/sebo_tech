<?php

class Newsletter
{
    private $id;
    private $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    private function criarCon()
    {
        return new PDO("mysql:host=127.0.0.1;dbname=projectdb", 'root', '');
    }

    public function criar()
    {
        $pdo = $this->criarCon();
        // Prepared Statement -> Previne injeção SQL.
        $statement = $pdo->prepare("
        INSERT INTO newsletter (email) 
        VALUES (:email)");
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->execute();
    }
}