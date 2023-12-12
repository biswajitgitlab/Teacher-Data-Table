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

    <?php if (!empty($products)) : ?>
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
        <?php foreach ($products as $product): ?>
            <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td>
                            <a href="<?= site_url('product/edit/' . $product['id']) ?>">Edit</a>
                            <a href="<?= site_url('product/delete/' . $product['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else : ?>
        <p>No items found.</p>
    <?php endif; ?>

<script>
$(document).ready(function() {
    // Edit product
    $(document).on('click', '.edit-product-btn', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: '<?= site_url('product/edit/') ?>' + id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Load edit form in a modal or any other container
                    // You can use response.product data to populate the form
                    console.log(response.product);
                } else {
                    // Show error message
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Delete product
    $(document).on('click', '.delete-product-btn', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: '<?= site_url('product/delete/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {

                        // Remove product row from the table
                        $(this).closest('tr').remove();
                    } else {
                        // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});
</script>


</body>
    