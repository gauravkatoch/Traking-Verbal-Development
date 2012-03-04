<html>
<body>
<?php
$t= mktime(0, 0, 0, date("m"), date("d"), date("y"));
$t2= mktime(0, 0, 0, date("m"), date("d")-34, date("y"));
echo $t;
echo "sdf";
echo $t-$t2;
echo "      sdf  ";
for($i=0;$i<20;$i++)
{$t2= mktime(0, 0, 0, date("m"), date("d")-34-$i, date("y"));
	echo $t2;
echo "  : ";
}
?>
</body>
</html> 