<?php

class User
{

    /** @var string */
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $emailAddress;
    protected $password;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public static function findById(PDO $database, $id)
    {
        $user = new static();


        $stmt = $database->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute(array($id));
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($users !== false) {
            $user->setFirstName($users['first_name']);
            $user->setLastName($users['last_name']);
            $user->setUsername($users['username']);
            $user->setEmailAddress($users['email_address']);
            $user->setPassword($users['password']);
            $user->setId($users['id']);

            return $user;
        }
        return null;
    }

    public static function findByUsername(PDO $database, $username)
    {
        $user = new static();

        $stmt = $database->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute(array($username));
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($users !== false) {
            $user->setFirstName($users['first_name']);
            $user->setLastName($users['last_name']);
            $user->setUsername($users['username']);
            $user->setEmailAddress($users['email_address']);
            $user->setPassword($users['password']);

            return $user;
        }
        return null;
    }

    public function delete(PDO $database)
    {
        if ($this->getId() !== null) {
            $stmt = $database->prepare("DELETE FROM user WHERE id = ?");
            $stmt->execute(array($this->getId()));
            if (self::findById($database, $this->getId()) === null) {
                $this->setId(null);
            } else {
                echo "That didn't go as planned";
            }
        }
    }

    public function passwordHasher($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function save(PDO $database)
    {
        if ($this->getId() !== null) {
            $statement = $database->prepare(
                "UPDATE user SET username = ?, first_name = ?, last_name =?, email_address = ? where id =?"
            );
            $statement->execute(
                array(
                    $this->getUsername(),
                    $this->getVorname(),
                    $this->getNachname(),
                    $this->getEMail(),
                    $this->getId()
                )
            );
        } else {
            $statement = $database->prepare(
                "insert into user (username, first_name, last_name, email_address, password) values(?, ?, ?, ?, ?)"
            );
            $hashPassword = $this->passwordHasher($this->getPassword());
            $statement->execute(
                array($this->getUsername(), $this->getFirstName(), $this->getLastName(), $this->getEmailAddress(), $hashPassword)
            );
            $this->setId($database->lastInsertId("username"));
        }
    }


}