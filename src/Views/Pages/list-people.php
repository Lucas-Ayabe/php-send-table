<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List People</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>

<body>
    <main class="container">
        <a href="<?= $baseUrl ?>" role="button">Go back</a>

        <hr />

        <table>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person) : ?>
                    <tr>
                        <td><?= $person['name'] ?></td>
                        <td><?= $person['age'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <script src="<?= $baseUrl ?>/assets/js/script.js"></script>
</body>

</html>