<?php
@session_start();
function checkData($x, $y, $r)
{
    $xValues = array( -3, -2, -1, 0, 1, 2, 3, 4,5);
    $rValues = array(1, 2,3,4,5);
    if (($y < -3.0001) or ($y > 3.0001)) {
        return false;
    }
    if ((!is_numeric($x)) or (!in_array($x, $xValues))) return false;
    if ((!is_numeric($r)) or (!in_array($r, $rValues))) return false;
    return true;
}
function checkHit($x, $y, $r)
{
    if (($x >= 0) and ($x <= $r) and ($y <= $r / 2 - $x / 2) and ($y >= 0)) return "YES";
    if (($x <= 0) and ($x >= -$r / 2) and ($y <= $r) and ($y >= 0)) return "YES";
    if (($x >= 0) and ($x <= $r) and ($y <= 0) and ($x * $x + $y * $y <= $r * $r)) return
        "YES";
    return "NO";
}
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    http_response_code(400);
    exit;
}
$startTime = microtime(true);
$x = $_GET['X'];
$y = $_GET['Y'];
$r = $_GET['R'];
if (!checkData($x, $y, $r)) {
    http_response_code(401);
    exit;
}
$result = checkHit($x, $y, $r);
date_default_timezone_set('Europe/Moscow');
$currentTime = date("d/m/Y H:i");
$executionTime = number_format((microtime(true) - $startTime) * 1000000, 1, ".", "");
if (!isset($_SESSION['dataHistory'])) {
    $_SESSION['dataHistory'] = array();
}
$columns = "<tr><th align='center'>Script result</th></tr><br/><tr>
<th id=\"xColumn\">X &nbsp&nbsp&nbsp&nbsp//</th>
 <th id=\"yColumn\"> Y &nbsp&nbsp&nbsp&nbsp//</th>
 <th id=\"rColumn\"> R &nbsp&nbsp&nbsp&nbsp//</th>
 <th id=\"currentTime\"> Cur. Time &nbsp&nbsp//</th>
 <th id=\"executionTime\"> EXC. Time(MKC) &nbsp&nbsp//</th>
 <th id=\"resultColumn\"> Results</th>
 </tr>";

$currentResponse = "<tr><br/>
        <td>$x&nbsp&nbsp&nbsp&nbsp//</td>
        <td>$y&nbsp&nbsp&nbsp&nbsp//</td>
        <td>$r&nbsp&nbsp&nbsp&nbsp//</td>
        <td>$currentTime&nbsp&nbsp&nbsp&nbsp//</td>
        <td>$executionTime&nbsp&nbsp//</td>
        <td>$result</td>
    </tr>";

$response = '';
array_push($_SESSION['dataHistory'], $currentResponse);
foreach ($_SESSION['dataHistory'] as $value) {
    $response = $response . $value;
}
echo $columns . $response;