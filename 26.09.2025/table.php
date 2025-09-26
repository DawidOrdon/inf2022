<style>
    td{
        border:1px solid black;
    }
    table{
        border-collapse: collapse;
    }
</style>
<?php
echo"<table>";
$arr=['frytki','zapiekanka','burger','pizza','pyry'];
for($i=1;$i<=10;$i++){
    echo"<tr>";
    for($z=1;$z<=5;$z++){
        echo"<td>".$arr[array_rand($arr)]."</td>";
    }
    echo"</tr>";
}
echo"</table>";