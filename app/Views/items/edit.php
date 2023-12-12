<!-- app/Views/items/edit.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>

    <form action="<?= site_url('items/update/' . $item['id']) ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $item['name'] ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" required><?= $item['description'] ?></textarea>

        <button type="submit">Update Item</button>
    </form>

    <a href="<?= site_url('items') ?>">Back to List</a>
</body>
</html>
