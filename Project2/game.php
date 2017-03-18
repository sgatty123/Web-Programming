<!DOCTYPE html >
<?php
@session_start();
$_SESSION["random0"] = "rollme";
$_SESSION["random1"] = "rollme";
$_SESSION["random2"] = "rollme";
?>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Chocolates Betting</title>
<link rel="stylesheet" type="text/css" href="bounty.css" title="style" />
</head>
<body>
<h1>Chocolates Betting</h1>
<br><br>
<a class="home" href="index.html">HOME</a>
<br>
<hr>
<div>
<div class="div1">

<div class="div2">

<?php

function generate()
{
$random0 = rand(0,5); 
$random1 = rand(0,5); 
$random2 = rand(0,5); 

$rvariable = array();
$rvariable[0]=$random0;
$rvariable[1]=$random1;
$rvariable[2]=$random2;

$_SESSION["random0"] = $random0;
$_SESSION["random1"] = $random1;
$_SESSION["random2"] = $random2;


return $rvariable;
}



if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	$keka = array();	
	$keka=generate();
	$selected_value= test_input($_POST["bet"]);
	$money=test_input($_POST["betmoney"]);
	$total=0;
	$to=0;
	$i=0;
	$bet_value="no selection";
	$status="LOST";
	while($i<3)
	{
		if($selected_value == $keka[$i])
		{
			$to=$to+1;
			$status="WIN";
		}
		else
		{
			$total=1;
		}
		$i=$i+1;
	
	}
	if($to>0)
	{
	    $total = $money * $to;	
	}
	else{ $total = $money * $total; }
	
	if( $selected_value == 0)
	{
		$bet_value="Kisses";
	}
	else if( $selected_value == 1)
	{
		$bet_value="Bounty";
	}
	else if( $selected_value == 2)
	{
		$bet_value="Hersheys";
	}
	else if( $selected_value == 3)
	{
		$bet_value="Snickers";
	}
	else if( $selected_value == 4)
	{
		$bet_value="Twixs";
	}else if( $selected_value == 5)
	{
		$bet_value="Ghiradelli";
	}
	echo "<p class=\"wong\"><b>Selection:</b>".$bet_value."<br><br><b>Money:</b>$".$total."<br><br><b>Status:</b>".$status."<br></p>";
	
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

</div>

<table>
<tr>
<td><img src="./4.png" height="60px" width="60px"/><br>Twix</td>
<td><img src="./1.png" height="60px" width="60px"/><br>Bounty</td>
<td><img src="./2.png" height="60px" width="60px"/><br>Hersheys</td>
</tr>
<tr>
<td><img src="./3.png" height="60px" width="60px"/><br>Snickers</td>
<td><img src="./0.png" height="60px" width="60px"/><br>Kisses</td>
<td><img src="5.png" height="60px" width="60px"/><br>Ghiradelli</td>
</tr>
</table>
<br>
<center>
<p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <b>Choice:</b>
 
  <input type="radio" name="bet" value="1" checked>Bounty
  <input type="radio" name="bet" value="2">Hersheys
  <input type="radio" name="bet" value="3">Snickers
   <input type="radio" name="bet" value="4"> Twix
  <input type="radio" name="bet" value="0">Kisses
  <input type="radio" name="bet" value="5">Ghiradelli<br>
  
  
  <br><br>
  <b>Stake Amount:</b>
  <input type="radio" name="betmoney" value="10" checked>$10
  <input type="radio" name="betmoney" value="20">$20
  <input type="radio" name="betmoney" value="40">$40
  <input type="radio" name="betmoney" value="80">$80
  <input type="radio" name="betmoney" value="100">$100
  <input type="radio" name="betmoney" value="500">$500<br>
  
  <br><br>

  <input type="submit" value="Roll">
</form>
</p> 
</center>
<table class="score">
<tr>
<td><img src="./<?php echo $_SESSION["random0"];?>.png" height="100" width="100" /></td>
<td><img src="./<?php echo $_SESSION["random1"];?>.png" height="100" width="100" /></td>
<td><img src="./<?php echo $_SESSION["random2"];?>.png" height="100" width="100" /></td>
</tr>
</table>
</div>
</div>
 <audio src="sweet.wav" loop autoplay></audio>
</body>
</html>
