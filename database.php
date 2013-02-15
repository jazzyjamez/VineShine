<?php

class Database {
        private $mysqli = NULL;
        
		//Funktion som kopplar upp mot databasen med hjälp utav DBConfig.
        public function Connect(DBConfig $config)
        {
			// Create (connect to) SQLite database in file
			try
			{
				$this->sqlite3 = new \PDO("sqlite:".$config->DBName.".sqlite");
				$this->sqlite3->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				
				//Skapar tabellen om den inte redan existerar
				$sql = "CREATE TABLE IF NOT EXISTS tweet (
			                    id INTEGER PRIMARY KEY, 
			                    tweetID TEXT, 
			                    videoURL TEXT)";
								
			    $prepSql = $this->Prepare($sql);
				$this->runQuery($prepSql);
			}
			catch(PDOException $ex)
			{
            	die("Följande fel har inträffat" . $ex->getMessage());
			}
          
            return true;
		}
		
		//Funktion som hämtar antalet i tabellen.
		public function GetOne($sqlQuery) {
                
            if ($sqlQuery === FALSE)
            {
            	throw new \Exception($this->mysqli->error);
            }
            //execute the statement
           	if ($sqlQuery->execute() == FALSE)
           	{
            	throw new \Exception($this->mysqli->error);
            }
            $array = $sqlQuery->fetch(\PDO::FETCH_ASSOC);
            if($array == null)
            {
            	return false;
            }
            $tweet = new Tweet($array['tweetID']);
			$sqlQuery = null;
			return $tweet;
        }
		
		//Hämta allt i en vissa tabell.
		public function GetAll($sqlQuery) {
                
            if ($sqlQuery === FALSE)
            {
            	throw new \Exception($this->mysqli->error);
            }
            //execute the statement
           	if ($sqlQuery->execute() == FALSE)
           	{
            	throw new \Exception($this->mysqli->error);
            }
			
			$tweetArray = array();
            while ($array = $sqlQuery->fetch(\PDO::FETCH_ASSOC))
            {
                $tweet = new Tweet($array['tweetID'], $array['videoURL'], $array['id']);
                $tweetArray[] = $tweet;
            }
            return $tweetArray;
        }

		//Funktion som lägger till.
        public function runInsertQuery(\PDOStatement $stmt)
        {
        	try
        	{   
        		$stmt->execute();
			}
			catch (PDOException $ex)
			{
		        print $ex->getMessage();
		    }
			//Hämtar Id genererat ifrån det senaste insert och lägger i $ret variabeln.
       		$ret = $this->sqlite3->lastInsertId();
			//Stänger queryn.
        	$stmt = null;
            //Returnerar id från utförd operation.
        	return $ret;
        }
		
		//Funktion som tar bort.
        public function runQuery(\PDOStatement $stmt)
        { 
        	try
        	{   
        		$stmt->execute();
			}
			catch (PDOException $ex)
			{
		        print $ex->getMessage();
		    }
        	$stmt = null;
			
        	return true;
        }
		
		//Funktion som förbereder en sträng för execute.
        public function Prepare($sql)
        {
			try
        	{   
        		$stmt = $this->sqlite3->prepare($sql);
			}
			catch (PDOException $ex)
			{
		        print $ex->getMessage();
		    }
		    return $stmt;
        }
		
		//Funktion som stänger en databasanslutning.
        public function Close() 
        {
			// Close file db connection
		    $this->sqlite3 = null;
        }
}
