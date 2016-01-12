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
			<dc:creator>Sebastian Alfredsson och Gustav Hallström</dc:creator>
		</channel>
<?php


$link = mysqli_connect("localhost", "root", "", "routine")
        or die("Could not connect");
		
		 mysqli_select_db($link, "routine")
        or die("Could not select database");
    $returnstring ="";
	
    /*link, title, description,*/
    // en sql-fråga som väljer ut alla rader sorterade fallande på år och vecka
   
	
	$query = "SELECT *
            FROM deadlift
            ORDER BY comment DESC";

    // utför själva frågan. Om du har fel syntax får du felmeddelandet query failed
    $result = mysqli_query($link, $query)
        or die("Query failed");
    // loopa över alla resultatrader och skriv ut en motsvarande tabellrad
  while ($line = mysqli_fetch_object($result)) {
		$test = $line->Comment;
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
		
		$query = "INSERT INTO Bench_Press(Reps, Sets, Weight, Comment) 
		VALUES('1', '1', $maxbench, 'latt')";
		mysqli_query($link, $query)
			or die("Query failed");
			$query = "INSERT INTO Deadlift(Reps, Sets, Weight, Comment) 
		VALUES('1', '1', $maxdeadlift, 'latt')";
		mysqli_query($link, $query)
			or die("Query failed");
			$query = "INSERT INTO Squat(Reps, Sets, Weight, Comment) 
		VALUES('1', '1', $maxsquat, 'latt')";
		mysqli_query($link, $query)
			or die("Query failed");

		header("Location: http://localhost/tnm065/index.php");
  }

	
	mysqli_close($link);
	
?>


</rdf:RDF>

<?php include 'postfix.php';?>