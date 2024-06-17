<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Database Image Demo</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<body>

    <header>
        <h1>Database Image Demo</h1>

        <nav>
            <ul>
                <li><a href="index.php"      class="<?= $page=='index.php'      ? 'active' : '' ?>">Home</a></li>
                <li><a href="form-thing.php" class="<?= $page=='form-thing.php' ? 'active' : '' ?>">New Thing</a></li>
            </ul>
        </nav>
    </header>

    <main>



