<?php
class CandidateRepository
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function searchAll()
    {
        $request = "SELECT * FROM candidats";
        $rq = $this->connection->prepare($request);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function checkIfEmailExist($_email)
    {
        $request = "SELECT mail_user FROM candidats WHERE mail_user = :email";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":email", $_email, PDO::PARAM_STR);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return empty($result);
    }
    public function checkPassword(string $_password, string $_confirmPassword)
    {
        return $_password == $_confirmPassword;
    }
    public function createCandidate(string $_name, string $_firstName, string $_email, string $_password, string $_confirmPassword, string $_depId, int $_age)
    {
        if (!$this->checkIfEmailExist($_email)) {
            return "un compte a déjà été créé avec cette email.";
        } elseif (!$this->checkPassword($_password, $_confirmPassword)) {
            return "Les deux mot de pase saisit ne sont pas identique.";
        }else{
            $password = password_hash($_password, PASSWORD_ARGON2I);
            $request = "INSERT INTO 'candidats' (lastname_user,firstname_user, mail_user, pass_user, departement_user, age_user) VALUE (:name, :firstName, :email, :password, :depId, :age)";
            $rq = $this->connection->prepare($request);
            $rq->bindParam(":name",$_name,PDO::PARAM_STR);
            $rq->bindParam(":firstName",$_firstName,PDO::PARAM_STR);
            $rq->bindParam(":email",$_email,PDO::PARAM_STR);
            $rq->bindParam(":email",$password ,PDO::PARAM_STR);
            $rq->bindParam(":age",$_age ,PDO::PARAM_INT);
            $rq->bindParam(":depId",$_depId ,PDO::PARAM_INT);
            $rq->execute();
            return "Inscription réussi !";
        }
    }
}
