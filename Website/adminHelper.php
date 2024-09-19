<?php
    function isValidLogin($userName, $password)
    {
        $db = new SQLite3('Ultrakill.db');
    
        $queryString = "SELECT * FROM Details WHERE Username = '" . $userName . "';";
    
        $results = $db->query($queryString)->fetchArray();
    
        $db->close();
    
        return password_verify($password, $results["PassHash"]);
    }

    function generateRuns($userName, $password)
    {
        $db = new SQLite3('Ultrakill.db');
        $outputArray = array();

        $queryString = "";
        
        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $outputArray[] = $row["LevelCode"];
        }

        return $outputArray;
    }
?>