<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <title>Radio Button as Button with Color Change</title>
    <style>
        /* Custom CSS to style the radio button as a button */
        .custom-radio-button {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #007bff;
            cursor: pointer;
            border-radius: 4px;
        }

        .custom-radio-button input[type="radio"] {
            display: none;
			}

        /* Style the radio label */
        .custom-radio-button label {
            background-color: #fff;
            color: #000;
        }

        /* Style the radio label when it's checked */
        .custom-radio-button input[type="radio"]:checked + label {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="custom-control custom-radio custom-control-inline custom-radio-button">
            <input type="radio" id="radio1" name="radio" class="custom-control-input">
            <label for="radio1" class="custom-control-label">Option 1</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline custom-radio-button">
            <input type="radio" id="radio2" name="radio" class="custom-control-input">
            <label for="radio2" class="custom-control-label">Option 2</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline custom-radio-button">
            <input type="radio" id="radio3" name="radio" class="custom-control-input">
            <label for="radio3" class="custom-control-label">Option 3</label>
        </div>
    </div>
	
	 <div class="container mt-5">
        <div class="custom-control custom-radio custom-control-inline custom-radio-button">
            <input type="radio" id="radio12" name="radio1" class="custom-control-input">
            <label for="radio1" class="custom-control-label">Option 1</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline custom-radio-button">
            <input type="radio" id="radio22" name="radio1" class="custom-control-input">
            <label for="radio2" class="custom-control-label">Option 2</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline custom-radio-button">
            <input type="radio" id="radio32" name="radio1" class="custom-control-input">
            <label for="radio3" class="custom-control-label">Option 3</label>
        </div>
    </div>

    <script>
        const radioButtons = document.querySelectorAll('.custom-radio-button input[type="radio"]');

        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', (event) => {
                radioButtons.forEach(rb => {
                    const label = rb.nextElementSibling;
                    if (rb.checked) {
                        label.style.backgroundColor = '#007bff';
                        label.style.color = '#fff';
                    } else {
                        label.style.backgroundColor = '#fff';
                        label.style.color = '#000';
                    }
                });
            });
        });
    </script>
</body>
</html>
