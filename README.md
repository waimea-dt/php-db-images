# PHP / MySQL Demo of Storing Images in a Database as BLOBs

## Database

The database needs to have fields for:
- The **MIME type**, e.g. *image/png*, or *image/jpeg* - varchar
- The **image data** - BLOB

## Retrieving Images

**DON'T**

The image data *could* be requested from the DB and directly inserted into the HTML page. However, this cretaes really *huge* HTML pages which take a *loooooooong* time to load. So...

**DO**

It's better to load the images from the database as **seperate HTTP requests**, meaning that the HTML page is small and quick to load, withe the images loading later.

See: [index.php](index.php) and [load-thing-image.php](load-thing-image.php)

## Uploading Images

You need to use a **multi-part form** for this. The data from the form then gets sent in different ways:

- Normal fields are uploaded via the **$_POST** super-global
- Files are uploaded into a temporary location on the server, wirth details available via the **$_FILES** super-global

A helper function, `uploadedImageData(...)`, is available to help manage this process, providing the MIME type of the uploaded file, and the binary file data.

See: [form-thing.php](form-thing.php) and [add-thing.php](add-thing.php)


