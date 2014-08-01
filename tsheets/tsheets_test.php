
<b> tSheets API Test</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);
$users = $tsheets->get(ObjectType::Users);
print("Display TSheets Users<br>");
print("<br>");
foreach($users['results']['users'] as $user) {
    print("User: {$user['first_name']} {$user['last_name']}<br>");
}


?>