<?php
/**
 * Load user data by user IDs.
 *
 * @param   string  $user_ids  users IDs.
 *
 * @return array Associative array of user data.
 */
function load_users_data($user_ids, $conn)
{
    $user_ids = explode(',', $user_ids);

    $user_ids = array_filter($user_ids, function ($value) {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    });

    $idsString = implode(',', $user_ids);

    $sql = "SELECT * FROM users WHERE id IN ($idsString)";

    $result = $conn->query($sql);

    if ($result === false) {
        die("Error: ".$conn->error);
    }

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[$row['id']] = $row['name'];
    }

    return $data;
}

$user_ids = isset($_GET['user_ids']) ? $_GET['user_ids'] : '';

// DB parameters
$db_host     = "localhost";
$db_user     = "root";
$db_password = "root";
$db_name     = "sess";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$data = load_users_data($user_ids, $conn);

$conn->close();

foreach ($data as $user_id => $name) {
    echo "<a href=\"/show_user.php?id=".htmlspecialchars($user_id)."\">".htmlspecialchars($name)."</a>";
}