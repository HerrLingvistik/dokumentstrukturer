<?php include 'prefix.php';?>


<title>Training Routine</title>

<form action="" method="get">
Bench 1repmax: <input type="integer" name="bench"><br>
Deadlift 1repmax: <input type="integer" name="deadlift"><br>
Squat 1repmax: <input type="integer" name="squat"><br>
<input type="submit">
</form>

<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns="http://purl.org/rss/1.0/"
xmlns:dc="http://purl.org/dc/elements/1.1/">

<?php



$link = mysqli_connect("localhost", "root", "", "routine")
        or die("Could not connect");
		
		 mysqli_select_db($link, "routine")
        or die("Could not select database");
    $returnstring ="";
	
    /*link, title, description,*/
    // en sql-fråga som väljer ut alla rader sorterade fallande på år och vecka
    $query = "SELECT *
            FROM bench_press
            ORDER BY comment DESC";

    // utför själva frågan. Om du har fel syntax får du felmeddelandet query failed
    $result = mysqli_query($link, $query)
        or die("Query failed");
    // loopa över alla resultatrader och skriv ut en motsvarande tabellrad
    while ($line = mysqli_fetch_object($result)) {
		printf($line->Weight);
		echo "<br>";
	}
	
	$query = "SELECT *
            FROM deadlift
            ORDER BY comment DESC";

    // utför själva frågan. Om du har fel syntax får du felmeddelandet query failed
    $result = mysqli_query($link, $query)
        or die("Query failed");
    // loopa över alla resultatrader och skriv ut en motsvarande tabellrad
    while ($line = mysqli_fetch_object($result)) {
		printf($line->Weight);
		echo "<br>";
	}
	
	$query = "SELECT *
            FROM squat
            ORDER BY comment DESC";

    // utför själva frågan. Om du har fel syntax får du felmeddelandet query failed
    $result = mysqli_query($link, $query)
        or die("Query failed");
    // loopa över alla resultatrader och skriv ut en motsvarande tabellrad
    while ($line = mysqli_fetch_object($result)) {
		printf($line->Weight);
		echo "<br>";
	}
	
	mysqli_free_result($result);
	
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