<?php include 'prefix.php';?>



<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns="http://purl.org/rss/1.0/"
xmlns:dc="http://purl.org/dc/elements/1.1/">

<?php $date = date(DATE_W3C);
		
   	$date = gmdate('Y-m-d\Th:i:s\Z', strtotime($date)+3660);?>
    <channel rdf:about="http://www.itn.liu.se/">
			<title>Gym Routine</title>
			<link>http://www.itn.liu.se/</link>
			<description>Get Swole</description>
			<dc:language>en</dc:language>
			<dc:date><?php print utf8_encode($date); ?></dc:date>
			<dc:publisher>LiU/ITN</dc:publisher>
			<dc:creator>Sebastian Alfredsson och Gustav Hallstr�m</dc:creator>
		</channel>
<?php


$link = mysqli_connect("localhost", "root", "", "routine")
        or die("Could not connect");
		
		 mysqli_select_db($link, "routine")
        or die("Could not select database");
    $returnstring ="";
	
    /*link, title, description,*/
    // en sql-fr�ga som v�ljer ut alla rader sorterade fallande p� �r och vecka
   
	
	$query = "SELECT *
            FROM Bicep_Curl
            ORDER BY Reps DESC";

    // utf�r sj�lva fr�gan. Om du har fel syntax f�r du felmeddelandet query failed
    $result = mysqli_query($link, $query)
        or die("Query failed");
    // loopa �ver alla resultatrader och skriv ut en motsvarande tabellrad
  while ($line = mysqli_fetch_object($result)) {
		$test = $line->Reps;
		$test = preg_replace("/&/","&amp;", $test);
		
		$returnstring = $returnstring . "<item>";
		$returnstring = $returnstring . "<title>$test</title>";
		$returnstring = $returnstring . "</item>";
		//$returnstring = $returnstring . "<link>http://xml.com/pub/2000/08/09/xslt/xslt.html</link>";
		//$returnstring = $returnstring . 
		
	}
	
	mysqli_free_result($result);
	print utf8_encode($returnstring);
	
	if(isset($_GET['bench']))
  {
		$maxbench = $_GET["bench"];
		$maxdeadlift = $_GET["deadlift"];
		$maxsquat = $_GET["squat"];
		
		$query = "INSERT INTO Biceps_Curl(Reps, Sets, Weight) 
		VALUES('1', '1', $maxbench, 'latt')";
		mysqli_query($link, $query)
			or die("Query failed");
			$query = "INSERT INTO Concentration_Curls(Reps, Sets, Weight, Comment) 
		VALUES('1', '1', $maxdeadlift, 'latt')";
		mysqli_query($link, $query)
			or die("Query failed");
/*<<<<<<< HEAD
			$query = "INSERT INTO Squat(Reps, Sets, Weight, Comment) 
		VALUES('1', '1', $maxsquat, 'latt')";
		mysqli_query($link, $query)
			or die("Query failed");

=======
>>>>>>> strut*/
		header("Location: http://localhost/tnm065/index.php");
  }

	
	mysqli_close($link);
	
?>


</rdf:RDF>

<?php include 'postfix.php';?>