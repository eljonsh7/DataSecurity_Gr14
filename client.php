<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Client Side</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Search Messages</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Search by Key</h2>
                <form>
                    <div class="form-group">
                        <label for="key">Key :</label>
                        <input type="number" class="form-control" id="key" name="key" placeholder="Enter key (8 digits)" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="mt-5">
            <h2>Results</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                function decryptMessages() {
                    var iv = CryptoJS.enc.Hex.parse('0000000000000000');
                    var key = document.getElementById("key").value;
                    $('table tbody tr').each(function() {
                        var message = $(this).find('td:eq(0)').text();
                        var decryptedMessage = CryptoJS.DES.decrypt(message, key, { iv: iv }).toString(CryptoJS.enc.Utf8);
                        $(this).find('td:eq(0)').text(decryptedMessage);
                    });
                }

                var buttonType = $(this).find('button[type="submit"]').text();
                var data = {};
                data = {
                    'search_type': 'key',
                    'key': $(this).find('input').val()
                };
                console.log(data);
                $.ajax({
                    type: 'POST',
                    url: 'get.php',
                    data: data,
                    success: function(response) {
                        console.log(response);
                        $('#table-body').html(response);
                        decryptMessages();
                    },
                    error: function() {
                        console.log('Error searching messages from server.');
                    }
                });
            });
        });
    </script>
</body>
</html>
