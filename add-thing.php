<?php

require_once 'lib/utils.php';

//----------------------------------------------------------------------------

consoleLog($_POST, 'POST');
consoleLog($_FILES, 'FILES');

if(empty($_POST) && empty($_FILES)) die ('There was a problem uploading the file (probably too large)');

//----------------------------------------------------------------------------
// Get image data and type of uploaded file from the $_FILES super-global

[
    'data' => $imageData,
    'type' => $imageType
] = uploadedImageData($_FILES['image']);

//----------------------------------------------------------------------------
// Get other data from form via the $_POST super-global.

$name = $_POST['name'];
$description = $_POST['description'];


//----------------------------------------------------------------------------
// Insert the thing data and image into the database

$db = connectToDB();

$query = 'INSERT INTO things 
            (name, description, image_type, image_data) 
            VALUES (?, ?, ?, ?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $description, $imageType, $imageData]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Upload Picture', ERROR);
    die('There was an error adding picture to the database');
}

//----------------------------------------------------------------------------
// Back to see the new thing

header("Location: index.php");

