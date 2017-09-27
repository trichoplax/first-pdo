<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=families', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT `children`.`name` FROM `children`
INNER JOIN `colors` ON `colors`.`id`=`children`.`f_color`
WHERE `colors`.`color`='red';");
$query->execute();
$result = $query->fetchAll();
var_dump($result);
echo '<br><br><br><br>';

$query = $db->prepare("SELECT `children`.`name` FROM `children`
INNER JOIN `adults` ON `adults`.`child1`=`children`.`id`
WHERE `adults`.`pet_name`='Syd'
GROUP BY `adults`.`pet_name`;");
$query->execute();
$result = $query->fetchAll();
var_dump($result);
echo '<br><br><br><br>';

$query = $db->prepare("SELECT `children`.`name`, `adults`.`pet_name` FROM `children`
INNER JOIN `adults` ON `adults`.`child1`=`children`.`id`
WHERE `adults`.`DOB`>'1985-01-01';");
$query->execute();
$result = $query->fetchAll();
var_dump($result);
echo '<br><br><br><br>';

$query = $db->prepare("SELECT `colors`.`color` FROM `children`
INNER JOIN `adults` ON `adults`.`child1`=`children`.`id`
INNER JOIN `colors` ON `colors`.`id`=`children`.`f_color`
WHERE `adults`.`DOB`>'1990-12-31'
GROUP BY `children`.`f_color`
ORDER BY COUNT(`children`.`id`) DESC
LIMIT 1;");
$query->execute();
$result = $query->fetchAll();
var_dump($result);
echo '<br><br><br><br>';
