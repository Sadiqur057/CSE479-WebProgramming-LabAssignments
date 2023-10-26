<!DOCTYPE html>
<html>
<head> <title> Jaccard Similarity </title></head>
<body>
<?php

$file1 = fopen("file1.txt","r");
$file2 = fopen("file2.txt","r");

$arr1 = array();
$arr2 = array();
$count1 = 0;
$count2 = 0;
$num = 0;


while (($line = fgets($file1)) !== false)
{  
  $words = explode(" ", $line);  
  $count1 = $count1 + count($words);  
}  
echo "Number of words in file 1: " . $count1;
echo "<br>";

rewind($file1);

while (($line = fgets($file2)) !== false)
{  
  $words = explode(" ", $line);  
  $count2 = $count2 + count($words);  
} 

rewind($file2); 

echo "Number of words in file 2: " . $count2;
echo "<br>";

//similar word count
$line1 = fgets($file1);
$line2 = fgets($file2);
$arr1 = explode(" ",$line1);
$arr2 = explode(" ",$line2);
$result = array_intersect($arr1 , $arr2); 
$num = count($result); 
echo "Similar word count: " . $num;
echo "<br>";


while(!feof($file1))
{
    $line = fgets($file1);
    $arr = explode(" ", $line);
    array_merge($arr1, $arr);
}

while(!feof($file2))
{
    $line = fgets($file2);
    $arr = explode(" ", $line);
    array_merge($arr2, $arr);
}

$union_count = count(array_merge($arr1, $arr2));
$intersection_count = count(array_intersect($arr1, $arr2));
$jaccard_similarity= $intersection_count/$union_count;
echo " Jaccard Similarity: ".$jaccard_similarity;



?>
</body>
</html>

