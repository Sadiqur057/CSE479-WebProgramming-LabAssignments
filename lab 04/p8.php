<!DOCTYPE html>
<html>

<head>
    <title>Number Table</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <table>
        <?php
        echo "<table >";
	    for ($row=1; $row <= 10; $row++) { 
		    echo "<tr> \n";
		    for ($col=1; $col <= 10; $col++) { 
		   $p = $col * $row;
		   echo "<td>$p</td> \n";
		   	}
	  	    echo "</tr>";
		}
		echo "</table>";
?>
    </table>
</body>

</html>