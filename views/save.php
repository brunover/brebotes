<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "brebotes";
// $jsonPath = $_SERVER['DOCUMENT_ROOT']."/brebotes/conteudo/";

$servername = "localhost";
$username = "brebotes_user";
$password = "#brebotes2017";
$dbname = "brebotes_database";
$jsonPath = "/home/brebotes/public_html/conteudo/";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Connection OK
if ($conn) {
	// Change character set to utf8
	mysqli_set_charset($conn,"utf8");

    $paramDay			= $_POST['day_event'];
    $google_location	= array($_POST['location_map1'], $_POST['location_map2'], $_POST['location_map3']);
    $hour 				= array($_POST['hour1'], $_POST['hour2'], $_POST['hour3']);
	$local 				= array($_POST['local1'], $_POST['local2'], $_POST['local3']);

	// Transform day from "dd/MM/yyyy" to "yyyy-mm-dd"
	$day = date("Y-m-d", strtotime(str_replace("/", "-", $paramDay)));

	$i = 0;
	$success = true;

	while ($i < 3) {
		// Will save in DB only if hour and local are not empty
		if (!empty($hour[$i]) && !empty($local[$i])) {
			// Sql query
			$sql = "INSERT INTO eventos (DIA, LOCATION_MAP, HORA, LUGAR) VALUES ( '".$day."', '".$google_location[$i]."', '".$hour[$i]. "', '".$local[$i]."' )";

			// Runs the sql query on DB and checks the callback
			if (mysqli_query($conn, $sql)) {
			    $success = true;
			} else {
			    $success = false;
			}
		}

		$i++;
	}

	// If all lines were inserted correctly
	if ($success) {
		date_default_timezone_set('America/Recife');
	    $day = date('Y-m-d');

	    $sql = "SELECT * FROM eventos WHERE dia >= '". $day ."' ORDER BY dia ASC";
	    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

	    // Create local object with hour, link to google maps and place
	    class hourLocationPlace
	    {
	        public $HORA;
	        public $LOCATION_MAP;
	        public $LUGAR;
	    }

	    // Create object for json, with day and object with hour, link to google maps and place
	    class eventObj
	    {
	        public $DIA;
	        public $LOCATION_OBJ;
	    }

	    // Fetchs database rows and put it in an array
	    $tempEventsArray = array();
	    while($row = mysqli_fetch_assoc($result)) {
	        $tempEventsArray[] = $row;
	    }

	    // Transforms array with database's rows in to a object
	    $tempEventsObj = json_decode(json_encode($tempEventsArray), FALSE);

	    // Initialize lastDate to create objects with the same day
	    $lastDate = "";
	    if (sizeof($tempEventsObj) > 0) {
	        $lastDate = $tempEventsObj[0]->DIA;
	    }

	    // Variables to mount the json format
	    $localArray = array();
	    $events[] = new eventObj();
	    $k = 0;
	    
	    // Loop to mount json
	    for ($i = 0; $i < sizeof($tempEventsObj); $i++) {

	        // If the event actual date is equal to event last date, 
	        // increments the local array and push it to the same day
	        if ($tempEventsObj[$i]->DIA == $lastDate) {
	            $splitDate = explode("-", $tempEventsObj[$i]->DIA);
	            $events[$k]->DIA = $splitDate[2].'/'.$splitDate[1].'/'.$splitDate[0];
	            
	            $localObj = new hourLocationPlace();
	            $localObj->HORA = $tempEventsObj[$i]->HORA;
	            $localObj->LOCATION_MAP = $tempEventsObj[$i]->LOCATION_MAP;
	            $localObj->LUGAR = $tempEventsObj[$i]->LUGAR;

	            $localArray[] = $localObj;

	            $events[$k]->LOCATION_OBJ = $localArray;
	        
	        } else {
	            // If the day is different, creates a new object of event with the new day
	            $k++;

	            $events[] = new eventObj();
	            $splitDate = explode("-", $tempEventsObj[$i]->DIA);
	            $events[$k]->DIA = $splitDate[2].'/'.$splitDate[1].'/'.$splitDate[0];

	            $localObj = new hourLocationPlace();
	            $localObj->HORA = $tempEventsObj[$i]->HORA;
	            $localObj->LOCATION_MAP = $tempEventsObj[$i]->LOCATION_MAP;
	            $localObj->LUGAR = $tempEventsObj[$i]->LUGAR;

	            $localArray = array();
	            $localArray[] = $localObj;

	            $events[$k]->LOCATION_OBJ = $localArray;
	        }

	        // Stores the last day used to compare with the next day in the tempEventsObj
	        $lastDate = $tempEventsObj[$i]->DIA;
	    }

	    if (mysqli_query($conn, $sql)) {
	        $contentFolder = str_replace("//", "/", $jsonPath);

	        // Populates JSON with events
	        file_put_contents ( $contentFolder."programacao.json" , json_encode($events, JSON_UNESCAPED_UNICODE));

	        // Sleep awaits the json to be populated
	        sleep(1);

	        // Finished loading json
	        echo "ok";
	    } 
	    
	} else {
	    echo "SQL: " . $sql . ". Exception: " . mysqli_error($conn);
	}	

// Connection FAILED
} else {
	die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);
?>