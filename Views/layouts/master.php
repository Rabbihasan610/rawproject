<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Home</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </nav>
    </header>


    <main>
        <?= isset($content) ? $content : ''; ?>
    </main>


    <footer>
        <p>&copy; 2023 Blog. All rights reserved.</p>
    </footer>
</body>
</html>