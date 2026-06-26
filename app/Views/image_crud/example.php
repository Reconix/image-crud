<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Image CRUD CI4 Examples</title>

    <?php foreach ($css_files ?? [] as $file): ?>
        <link rel="stylesheet" href="<?= esc($file) ?>">
    <?php endforeach; ?>

    <?php foreach ($js_files ?? [] as $file): ?>
        <script src="<?= esc($file) ?>"></script>
    <?php endforeach; ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 30px;
        }

        a {
            color: #1455d9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .example-nav {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="example-nav">
        <a href="<?= site_url('images-examples/example1') ?>">Example 1 - Simple</a> |
        <a href="<?= site_url('images-examples/example2') ?>">Example 2 - Ordering</a> |
        <a href="<?= site_url('images-examples/example3/22') ?>">Example 3 - With group id</a> |
        <a href="<?= site_url('images-examples/example4') ?>">Example 4 - Images with title</a> |
        <a href="<?= site_url('images-examples/simple-photo-gallery') ?>">Simple Photo Gallery</a>
    </div>

    <div>
        <?= $output ?? '' ?>
    </div>
</body>
</html>
