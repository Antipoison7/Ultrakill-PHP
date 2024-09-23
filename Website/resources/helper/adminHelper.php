<?php
    include_once './resources/helper/numberConversion.php';

    function isValidLogin($userName, $password)
    {
        $db = new SQLite3('./database/Ultrakill.db');
    
        $queryString = "SELECT * FROM Details WHERE Username = '" . $userName . "';";
    
        $results = $db->query($queryString)->fetchArray();
    
        $db->close();
    
        return password_verify($password, $results["PassHash"]);
    }

    function generateRuns($userName, $password)
    {
        $db = new SQLite3('./database/Ultrakill.db');
        $outputArray = array();

        $queryString = "";
        
        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $outputArray[] = $row["LevelCode"];
        }

        return $outputArray;
    }

    function adminGetAllRuns()
    {
        $db = new SQLite3('./database/Ultrakill.db');
        $outputString = "";

        $queryString = "SELECT Runs.RowID AS RunID, * FROM Runs LEFT JOIN Runners ON Runners.UserID = Runs.Runner ORDER BY RunID DESC;";

        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $outputString .= "
            <input type=\"radio\" name=\"deleteRadio\" id=\"level" . $row["RunID"] . "\" value=\"" . $row["RunID"] . "\" class = \"devRadioButton\" required>
            <label for=\"level" . $row["RunID"] . "\">
                <div class=\"devRunContainer\">
                    <h1>" . $row["LevelCode"] . " | " . $row["DisplayName"] . "</h1>
                    <h2>" . $row["Category"] . "</h2>
                    <h2>" . toDuration($row["Time"]) . "</h2>
                    <h2>Contains:</h2>";
                    if($row["Comment"] != null)
                    {
                        $outputString .= "<h3>Comment</h3>";
                    }
                    else
                    {
                        $outputString .= "<h3>No Comment</h3>";
                    }

                    if($row["Video"] != null)
                    {
                        $outputString .= "<h3>Video</h3>";
                    }
                    else
                    {
                        $outputString .= "<h3>No Video</h3>";
                    }
                    $outputString .= "
                </div>
            </label>
            ";
        }
        
        return $outputString;
    }

    function adminDeleteRun($runID)
    {
        $db = new SQLite3('./database/Ultrakill.db');

        $queryString = "DELETE FROM Runs WHERE RowID = " . $runID . ";";
        
        $db->exec($queryString);
    }

    function adminGetAllUsers()
    {
        $db = new SQLite3('./database/Ultrakill.db');
        $outputString = "";

        $queryString = "SELECT * FROM Runners;";

        $results = $db->query($queryString);

        while ($row = $results->fetchArray())
        {
            $outputString .= "
            <input type=\"radio\" name=\"deleteRadio\" id=\"level" . $row["UserID"] . "\" value=\"" . $row["UserID"] . "\" class = \"devRadioButton\" required>
            <label for=\"level" . $row["UserID"] . "\">
                <div class=\"devRunContainer\" style=\" height: 500px; width: 400px\">
                    <h1>" . $row["Name"] . "|" . $row["UserID"] . "</h1>
                    <h2>" . $row["DisplayName"] . "</h2>
                    <h2>SteamID:</h2>
                    <h3>" . $row["SteamId"] . "</h3>
                    <img src=\"./resources/images/" . $row["ProfilePicture"] . "\">
                </div>
            </label>
            ";
        }
        return $outputString;
    }

    function adminDeleteRunner($runnerID)
    {
        $db = new SQLite3('./database/Ultrakill.db');

        $queryString = "DELETE FROM Runners WHERE UserID = " . $runnerID . "; DELETE FROM Runs WHERE Runner = '" . $runnerID . "'";
        
        $db->exec($queryString);
    }
?>