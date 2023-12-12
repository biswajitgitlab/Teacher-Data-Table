<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
</head>
<body>
    <h1>Create Item</h1>

    <form action="<?= site_url('product/update/' . $product['id']) ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value= "<?=$product['name'];?>" required>

        <label for="description">Description:</label>
        <textarea name="description"  required> <?=$product['description'];?></textarea>

        <label for="price">Price:</label>
        <input type="text" name ="price" value= "<?=$product['price'];?>" required>

        <button type="submit">Save Item</button>
    </form>

    <a href="<?= site_url('product') ?>">Back to List</a>
</body>
</html>