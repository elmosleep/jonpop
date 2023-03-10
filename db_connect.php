<?php

  class db{

    private $host;
    private $dbname;
    private $user;
    private $pass;
    protected $connect;

    function __construct($host,$dbname,$user,$pass){
      $this->host = $host;
      $this->dbname = $dbname;
      $this->user = $user;
      $this->pass = $pass;
    }
    public function connectDB(){
      $this->connect = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
      if (!$this->connect) {
        echo "DB不可";
        die();
      }
    }
  }
