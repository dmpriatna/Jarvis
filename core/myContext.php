<?php

require_once 'entityFramework.php';

class UserEntity extends DbContext
{
    public function Save($args)
    {
        $name = $args["name"];
        $email = $args["email"];
        $phone = $args["phone"];
        $check = "SELECT * FROM parakarsa_pengguna WHERE Email = '{$email}' OR Telepon = '{$phone}'";
        if ($this->Any($check) > 0)
            return true;
        $query = "INSERT INTO parakarsa_pengguna (Id, NamaLengkap, Email, Telepon, NamaUsaha, BidangUsaha)";
        $query .= "VALUES (UUID(), '{$name}', '{$email}', '{$phone}', '', '')";
        return $this->SaveChanges($query);
    }

    public function Users()
    {
        return $this->ToList("parakarsa_pengguna");
    }
}
