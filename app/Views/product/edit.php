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

<script>
$(document).ready(function() {
    $('#edit-product-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Update product details in list or any other relevant place
                    console.log(response.message);
                    // Example: update the corresponding row in the product list
                    // $('#product-row-' + response.id).find('.td-name').text(response.name);
                    // $('#product-row-' + response.id).find('.td-description').text(response.description);
                    // $('#product-row-' + response.id).find('.td-price').text(response.price);

                    // Close modal or any other container where the form is loaded
                } else {
                    // Show error message
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>
