<?php

class DbContext
{
    public function __construct()
    {
        define('DBHOST', 'sql609.main-hosting.eu');
        define('DBUSER', 'u201888078_citizen');
        define('DBPASS', 'FAqkp5]v4');
        define('DBNAME', 'u201888078_master');

        $this->conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
        if (!$this->conn) {
            throw new Exception("Database connection error " . mysqli_connect_error());
        }
    }

    protected $conn = null;

    protected function Any($query = "", $params = [])
    {
        try {
            $state = $this->statement($query, $params);
            $state->execute();
            $state->store_result();
            $result = $state->num_rows;
            $state->close();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    protected function SaveChanges($query = "", $params = [])
    {
        try {
            $state = $this->statement($query, $params);
            $result = $state->execute();
            $state->close();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function statement($query = "", $params = [])
    {
        try {
            $result = $this->conn->prepare($query);
            if ($result === false)
                throw new Exception("failed prepare query " . $query);
            if ($params)
                $result->bind_param($params[0], $params[1]);
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    protected function ToList($table = "", $params = [])
    {
        try {
            $query = "SELECT * FROM {$table}";
            $state = $this->statement($query, $params);
            $state->execute();
            $result = $state->get_result()->fetch_all(MYSQLI_ASSOC);
            $state->close();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
