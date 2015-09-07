<?php

require "/Library/WebServer/Documents/mikesnews/api/database/DBHandler.php";

class MikesnewsModel 
{
    protected $db;
    protected $request;

    //Constructor -- setting up db connection and
    //taking in request
    public function __construct(Request $request)
    {
        $dbConnection = new DBHandler();
        $this->db = $dbConnection->dbConnect();
        $this->request = $request;
    }

}

