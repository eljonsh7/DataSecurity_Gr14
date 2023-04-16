<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>This</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
    <h1>Simple Form</h1>
    <form id="my-form" method="POST">
        <div class="form-group">
        <label for="key">Key (8 digits):</label>
        <input type="number" class="form-control" id="key" name="key" value="<?= $_POST['key'] ?? '' ?>" required>
        </div>
        <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="5" required><?= $_POST['message'] ?? '' ?></textarea>
        <p id="hidden"></p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <script>
        $('#my-form').submit(function(event) {
            event.preventDefault();

            var message = document.getElementById("message").value;
            var key = document.getElementById("key").value;
            var iv = CryptoJS.enc.Hex.parse('0000000000000000');
            var encrypted = CryptoJS.DES.encrypt(message, key, { iv: iv }).toString();

            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: { 
                    key: key,
                    message: message,
                    encrypted: encrypted 
                },
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    console.log('Error sending encrypted message to server.');
                }
            });
            console.log('Encrypted message: ' + encrypted);
        });
    </script>
</body>
</html>
