<?php
    include 'partials/top.php';

    // NOTE: The form is a multi-part form.
    // This means that normal fields are sent via the $_POST superglobal,
    // whilst file uploads are sent via the $_FILES superglobal.
?>

    <form
        method="post"
        action="add-thing.php"
        enctype="multipart/form-data"
    >
        <h2>Add a New Thing</h2>

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Description</label>
        <textarea name="description" required></textarea>

        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Add">
    </form>

<?php
    include 'partials/bottom.php';
?>