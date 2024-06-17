<?php
    require 'lib/utils.php';
    include 'partials/top.php';


    //--------------------------------------------------------------------------
    // Setup a query to get all thing info, BUT not the image data, 
    // since this would be a lot of data to add to the HTML page

    $db = connectToDB();

    $query = 'SELECT id, name, description 
                FROM things 
                ORDER BY name ASC';

    // Attempt to run the query
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        $things = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        consoleLog($e->getMessage(), 'DB Things Fetch', ERROR);
        die('There was an error getting thing data from the database');
    }

    // See what we got back
    consoleLog($things);

    //--------------------------------------------------------------------------
    // And show the results

    echo '<section id="thing-list">';

    foreach($things as $thing) {
        echo '<article>';

        echo   '<h3>' . $thing['name'] . '</h3>';
        echo   '<p>' . $thing['description'] . '</p>';
        
        // NOTE: Load the image as a separate HTTP request
        echo   '<img src="load-thing-image.php?id=' . $thing['id'] . '">';

        echo '</article>';
    }

    echo '</section>';

    //--------------------------------------------------------------------------
    include 'partials/bottom.php';


?>