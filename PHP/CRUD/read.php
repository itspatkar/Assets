<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Display Employee</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div>
        <div class="container text-center">
            <h2 class="p-5">Employee Search</h2>

            <form method="post" action="PHP/read.php">
                <label for="name"><b>Email :</b> </label>
                <input type="email" name="email" autofocus required>
                <input class="m-3" type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>