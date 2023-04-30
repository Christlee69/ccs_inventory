<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ccs_inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve data from database
$sql = "SELECT id, name FROM locationlist";
$result = $conn->query($sql);

// Generate dropdown list HTML code
$options_html = '';
while ($row = $result->fetch_assoc()) {
    $options_html .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}
$options_html .= '<option value="add">Add new option</option>';

// Handle form submission
if (isset($_POST['submit'])) {
    $new_option = $_POST['new_option'];
    if ($_POST['selected_option'] == 'add' && !empty($new_option)) {
        $sql = "INSERT INTO locationlist (name) VALUES ('$new_option')";
        $result = $conn->query($sql);
    }
}

// Display dropdown list form
echo '<form method="post">';
echo '<select name="selected_option">' . $options_html . '</select>';
echo '<input type="text" name="new_option">';
echo '<input type="submit" name="submit" value="Submit">';
echo '</form>';

// Close database connection
$conn->close();
?>
