<?php


// Retrieve data from database
$sql = "SELECT id, name FROM locationlist";
$result = mysqli_query($conn, $sql);

$options = array();

if (mysqli_num_rows($result) > 0) {
  // Generate array of options
  while ($row = mysqli_fetch_assoc($result)) {
    $options[$row['id']] = $row['name'];
  }
}

// Handle add option form submission
if (isset($_POST['add_option'])) {
  $new_option = $_POST['new_option'];
  
  // Insert new option into database
  $sql = "INSERT INTO locationlist (name) VALUES ('$new_option')";
  mysqli_query($conn, $sql);
  
  // Retrieve new option ID from database
  $new_option_id = mysqli_insert_id($conn);
  
  // Add new option to options array
  $options[$new_option_id] = $new_option;
}

// Handle remove option form submission
if (isset($_POST['remove_option'])) {
  $option_id = $_POST['option_id'];
  
  // Delete option from database
  $sql = "DELETE FROM locationlist WHERE id = '$option_id'";
  mysqli_query($conn, $sql);
  
  // Remove option from options array
  unset($options[$option_id]);
}

// Generate dropdown list with add and remove options
echo '<form method="post">';
echo '<select name="selected_option">';
foreach ($options as $id => $name) {
  echo "<option value=\"$id\">$name</option>";
}
echo '</select>';
echo '<input type="submit" name="remove_option" value="Remove Option">';
echo '<br>';
echo 'New Option: <input type="text" name="new_option">';
echo '<input type="submit" name="add_option" value="Add Option">';
echo '</form>';

// Close database connection
mysqli_close($conn);
?>