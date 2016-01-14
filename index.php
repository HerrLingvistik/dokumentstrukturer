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

session_start();

if( empty($_SESSION['id']) ) {
     $_SESSION['id'] = "0";
}

echo $_SESSION['test'];

		
$link = mysqli_connect("localhost", "root", "", "routine")
        or die("Could not connect");
		
		 mysqli_select_db($link, "routine")
        or die("Could not select database");
    $returnstring ="";
		
    /*link, title, description,*/
    // en sql-fråga som väljer ut alla rader sorterade fallande på år och vecka

			
		$query = "SELECT *
							FROM bicep_curls WHERE ID = " . $_SESSION['id'];
				

			// utför själva frågan. Om du har fel syntax får du felmeddelandet query failed
			$result = mysqli_query($link, $query)
					or die("Query failed");
			// loopa över alla resultatrader och skriv ut en motsvarande tabellrad
		while ($line = mysqli_fetch_object($result)) {
			
			$id1 = $line->ID;
			$week = $line->Week;
			$rep = $line->Reps;
			$set = $line->Sets;
			$weight = $line->Weight;

			$test = preg_replace("/&/","&amp;", $test);
			
			$returnstring = $returnstring . "<bic>";
			$returnstring = $returnstring . "<id1>$id1</id1>";
			$returnstring = $returnstring . "<week>$week</week>";
			$returnstring = $returnstring . "<rep>$rep</rep>";
			$returnstring = $returnstring . "<set>$set</set>";
			$returnstring = $returnstring . "<weight>$weight</weight>";
			$returnstring = $returnstring . "</bic>";
			//$returnstring = $returnstring . "<link>http://xml.com/pub/2000/08/09/xslt/xslt.html</link>";
			//$returnstring = $returnstring . 
			
		}
	
$query = "SELECT *
            FROM concentration_curls WHERE ID = " . $_SESSION['id'];

    // utför själva frågan. Om du har fel syntax får du felmeddelandet query failed
    $result1 = mysqli_query($link, $query)
        or die("Query failed");
    // loopa över alla resultatrader och skriv ut en motsvarande tabellrad
  while ($line1 = mysqli_fetch_object($result1)) {
		
		$id2 = $line1->ID;
		$week2 = $line1->Week;
		$rep2 = $line1->Reps;
		$set2 = $line1->Sets;
		$weight2 = $line1->Weight;

		$test = preg_replace("/&/","&amp;", $test);
		
		$returnstring = $returnstring . "<con>";
		$returnstring = $returnstring . "<id2>$id2</id2>";
		$returnstring = $returnstring . "<week2>$week2</week2>";
		$returnstring = $returnstring . "<rep2>$rep2</rep2>";
		$returnstring = $returnstring . "<set2>$set2</set2>";
		$returnstring = $returnstring . "<weight2>$weight2</weight2>";
		$returnstring = $returnstring . "</con>"; 
		
	}
	
	
	mysqli_free_result($result);
	print utf8_encode($returnstring);	


	if(!empty($_GET['id']))
  {
	  $id = $_GET["id"];
	  $_SESSION["id"] = $id;	
	  if(!empty($_GET['size'])){
		
		$size = $_GET["size"];
		
		//$query = "SELECT COUNT(*) FROM Bicep_Curls WHERE ID = $id";
		$query = "SELECT reps FROM Bicep_Curls WHERE ID = $id";//select 1 else select 0
		$test = mysqli_query($link, $query);
		$reps = 5;
		if($test -> num_rows)
		{
			$query = "UPDATE Bicep_Curls SET Weight = $size*Week WHERE ID = $id";
			mysqli_query($link, $query);
			$query = "UPDATE Concentration_Curls SET Weight = $size*Week*0.5 WHERE ID = $id";
			mysqli_query($link, $query);
		}else{
			for($w = 1; $w <= 3; $w++)
			{
				$query = "INSERT INTO Bicep_Curls(ID, Week,Reps, Sets, Weight) VALUES('$id', $w, '$reps','$reps', $size*$w)";
				mysqli_query($link, $query)
				or die("Query failed");
				
				$query = "INSERT INTO Concentration_Curls(ID, Week,Reps, Sets, Weight) VALUES('$id', $w, '$reps', '$reps', $size*$w*0.5)";
				mysqli_query($link, $query)
				or die("Query failed");
				
				$reps -= 2;
			}
	/*	
<<<<<<< HEAD
		$query = "UPDATE Concentration_Curls SET Weight = $size*Week*0.5 WHERE ID = $id";
		mysqli_query($link, $query)
			or die("Query failed");
		

=======*/
		}
			//or die("Query failed");
		
			//or die("Query failed");
		mysqli_free_result($test);
		
		$_SESSION["id"] = $id;	
//>>>>>>> strut
		/*$query = "INSERT INTO Bicep_Curls(ID, Reps, Sets, Weight) 
		WHERE ID = '$id' VALUES('$id', '1', '1', '$max')";
		mysqli_query($link, $query)
			or die("Query failed");

			$query = "INSERT INTO Concentration_Curls(ID, Reps, Sets, Weight) 
		VALUES('$id', '1', '1', '100')";
		mysqli_query($link, $query)
			or die("Query failed");

<<<<<<< HEAD
		//header("Location: http://localhost/dokumentstrukturer/index.php");*/
		header('Location: '.$_SERVER['PHP_SELF']);
		die;
  }else{
	header('Location: '.$_SERVER['PHP_SELF']);
	die;
  }
  }
		
	 $_SESSION["id"]=NULL;
	mysqli_close($link);

	
?>


</rdf:RDF>

<?php include 'postfix.php';?>