<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items List</title>
</head>
<body>
    <h1>Items List</h1>
    
    <a href="<?= site_url('product/create') ?>">Create New Item</a>

    <?php if (!empty($product)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $products) : ?>
                    <tr>
                        <td><?= $products['id'] ?></td>
                        <td><?= $products['name'] ?></td>
                        <td><?= $products['description'] ?></td>
                        <td><?= $products['price'] ?></td>
                        <td>
                            <a href="<?= site_url('product/edit/' . $products['id']) ?>">Edit</a>
                            <a href="<?= site_url('product/delete/' . $products['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No items found.</p>
    <?php endif; ?>
</body>
</html>
