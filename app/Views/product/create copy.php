<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
</head>
<body>
    <h1>Create Item</h1>

    <form action="<?= base_url('product') ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="name">Price:</label>
        <input type="text" name="price" required>

        <button type="submit">Save Item</button>
    </form>

    <a href="<?= site_url('product') ?>">Back to List</a>
</body>
</html>
