

<form id="create-product-form" action="<?= site_url('product/create') ?>" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

<script>
$(document).ready(function() {
    $('#create-product-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    window.location.href = response.redirect;
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

