<?php
 $arguments = $_POST["arguments"];

 $output = null;
 exec("bash ./experiment " . $arguments, $output);

echo "<pre>";
 foreach ($output as $value){
    echo $value . "\n";
 }
echo "</pre>";

?>
