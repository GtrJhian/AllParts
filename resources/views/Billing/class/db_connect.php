<?php
    class DBH{
        private $host;
        private $username;
        private $password;
        private $db_name;
        
        protected function connect(){
            $this->host = env("DB_HOST");
            $this->username = env("DB_USERNAME");
            $this->password = env("DB_PASSWORD");
            $this->db_name = env("DB_DATABASE");
            $db = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            $db->set_charset("utf8");
            return $db;
        }
    }
?>