<?php
$pagedivisor=$_REQUEST["divideinto"];
$rcount= $_REQUEST["resultcnt"];
$qrystrng= $_REQUEST["qrystrng"];
$maxpage=0;
if ($rcount % $pagedivisor ==0) {
	$maxpage=$rcount/$pagedivisor;
}
else{
	$maxpage=floor($rcount/$pagedivisor) +1;
}

for ($pgcntr=1; $pgcntr <= $maxpage; $pgcntr++) { 
	//echo "<p id='pgnum".$pgcntr."><u>".$pgcntr.".. ".$maxpage."</u></p>";
	$resultoffet= ($pgcntr*$pagedivisor) -$pagedivisor;
	echo "<button onclick='divideresults(".$pagedivisor.", ".$resultoffet.", \"".$qrystrng."\")' id='pgnum".$pgcntr."'><u>".$pgcntr."</u></button>";
}
echo "<script>
divideresults(".$pagedivisor.", ". 0 .", \"".$qrystrng."\");
</script>";
?>