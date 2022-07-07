<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register People</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>

<body>
    <main class="container">
        <form method="POST">
            <label for="name">
                <span>Name</span>
                <input type="text" name="name" id="name">
            </label>

            <label for="age">
                <span>Age</span>
                <input type="number" name="age" id="age">
            </label>

            <div class="grid">
                <button id="add-person">Add Person</button>
                <span></span>
                <span></span>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="grid" style="align-items: center;">
            <button style="margin: 0" id="register-people">Register People</button>
            <a href="<?= $baseUrl ?>/list">Go to people list</a>
            <div></div>
        </div>
    </main>

    <script src="<?= $baseUrl ?>/assets/js/script.js"></script>
</body>

</html>