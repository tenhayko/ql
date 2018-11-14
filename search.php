<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '12';
$dbName = 'qts_dsvh_tb';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
//$searchTerm = ucwords($_GET['term']);
//get matched data from skills table

//$searchTerm = ucwords($_GET['term']);

$searchTerm = mb_strtolower($_GET['term'],'utf-8');
$query = $db->query("SELECT * FROM portal_vatthe WHERE tenditich_2 LIKE '%".ucwords($searchTerm)."%'  ORDER BY tenditich ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['tenditich'];
}
//return json data
echo json_encode($data);
?>