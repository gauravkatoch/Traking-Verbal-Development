<?php
function countplus($issued)
{
	$len=strlen($issued);
	$i=0;
	$return=0;
	while($i<$len)
	{	
		
		if($issued[$i]=='+')
		$return++;
		$i++;
	}
	return $return;
}
function data($num,$issued)
{	
	$penaltyconstant=2;
	$len=strlen($issued);
	$i=0;
	
	while($num>1)
	{
		$num--;
		while($i<$len)
		{	
			if($issued[$i++]=='+')
			break;
			
		}
	}
	
	$bookid="";
	while($i<$len)
	{
		if($issued[$i]==" ")
		break;
		$bookid.=$issued[$i];
		$i++;
	}
	$i++;
	$issuedate="";
	while($i<$len)
	{
		if($issued[$i]=='+')
		break;
		$issuedate.=$issued[$i];
		$i++;
	}
	$returndate=$issuedate + 60*60*24*14;
	$now=mktime(0, 0, 0, date("m"), date("d"), date("y"));
	if($returndate>$now)
	$penalty=0;
	else
	$penalty=($now-$returndate)*$penaltyconstant/(60*60*24);
	$i=date("d/m/y", $issuedate);
	$r=date("d/m/y", $returndate);
	
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	$query="SELECT book_name from books where book_id = '$bookid'"; 
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);
	extract($row);
	
	$table=<<<EOD
	
	<tr>
	<td>$bookid</td>
	<td> $book_name</td>
	<td>$i</td>
	<td>$r</td>
EOD;
	
	echo $table;
	if($penalty>0)
	echo "<td style='background-color:red'> $penalty </td>";
	else
	echo "<td>$penalty</td>";
}

function find($issued,$num,$book_id)
{
	global $start;
	global $end;
	global $issuedate;
	
	$len=strlen($issued);
	$i=0;
	while($num>=0)
	{
		$start=$i;
		$match="";
		$issuedate="";
		$num--;
		while($i<$len)
		{	
			if($issued[$i]==" ")
			break;
			$match.=$issued[$i];
			$i++;
		}
		
		while($i<$len)
		{	
			if($issued[$i]=='+')
			break;
			$issuedate.=$issued[$i];
			$i++;
		}
		if($match==$book_id)
		{
			$end=$i;
			break;
		}
		$i++;
	}
}
function retreivebook($issued,$start,$end)
{
	$i=0;
	$len=strlen($issued);
	$new="";
	while($i<$start)
	{$new.=$issued[$i];
	$i++;
	}
	$i=$end+1;
	while($i<$len)
	{
		$new.=$issued[$i];
		$i++;
	}
	return $new;
}
function bookissued()
{
	//include("mysql_connect.php");
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	$query="SELECT issued from users where user_id = ".$_SESSION['user_id'].""; 
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);
	extract($row);
	
	if($issued==0)
	echo "<h2>You haven't issued any books yet</h2>";
	else
	{
		echo "<h2> <center>The following books are issued by you<center> </h2>";
		$movi=<<<EOD
		<table id="table">
		<tr>
		<th>Book Id</th>
		<th>Book Name</th>
		<th>Date of Issue</th>
		<th>Return Date</th>
		<th>Penalty</th>
		</tr>
		
EOD;
		echo $movi;
		$num=countplus($issued);//function to count number of + in coloumn issued
		
		$i=0;
		while($i<$num)
		{
			$i++;
			
			
			data($i,$issued);


		}
		echo "</table>";
		
		
	}
	mysql_close($link);	
}
//function for displaying table including all the defaultors facing penalties
function defaultor()
{
	include("mysql_connect.php");
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	$query1="SELECT * FROM users WHERE issued!=0";
	$result1=mysql_query($query1, $link);
	
	$form=<<<EOD
	<table id="table">
	<tr>
		<th><strong>User Name</strong></th>
		<th><strong>Category</strong></th>
		<th><strong>Penalty</strong></th>
		<th><strong>Warn Them</strong></th>
		
		</tr>
EOD;
	
	while($row1=mysql_fetch_array($result1))
	{
		extract($row1);
		$num=countplus($issued);//function to count number of + in coloumn issued
		
		$i=0;
		while($i<$num)
		{
			$i++;
			
			
			$penalty=dataDefaultor($i,$issued);
			if($penalty!=0)
			{
				$form.=<<<EOD
				<tr>
		<td><strong>$first_name $last_name</strong></td>
		<td><strong>$id_type</strong></td>
		<td style='background-color:red'><strong>$penalty</strong></td>
		<td><strong>Warn Them</strong></td>
		
		</tr>
EOD;
			}


		}
		
		
		
	}
	echo $form;
		echo "</table>";
	mysql_close($link);	
}

function dataDefaultor($num,$issued)
{	
	$penaltyconstant=2;
	$len=strlen($issued);
	$i=0;
	
	while($num>1)
	{
		$num--;
		while($i<$len)
		{	
			if($issued[$i++]=='+')
			break;
			
		}
	}
	
	$bookid="";
	while($i<$len)
	{
		if($issued[$i]==" ")
		break;
		$bookid.=$issued[$i];
		$i++;
	}
	$i++;
	$issuedate="";
	while($i<$len)
	{
		if($issued[$i]=='+')
		break;
		$issuedate.=$issued[$i];
		$i++;
	}
	$returndate=$issuedate + 60*60*24*14;
	$now=mktime(0, 0, 0, date("m"), date("d"), date("y"));
	if($returndate>$now)//ignoring this as we are interested only in defaultors
	$penalty=0;
	else
	{
	$penalty=($now-$returndate)*$penaltyconstant/(60*60*24);
	}
	return $penalty;
}

?>