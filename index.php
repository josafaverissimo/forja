<?php
    $baseUrl = "http://localhost/github/forja";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CSV</title>

    <script>
        const baseUrl = "<?php echo $baseUrl; ?>"
    </script>
</head>
<body>
    <form>
        <label for="input-csv">CSV: </label>
        <input id="input-csv" name="file" type="file">

        <button type="submit">Submit</button>
    </form>

    <hr>

    <div id="csv-files">
        <div class="csv-file-table-boilerplate" hidden>
            <h1></h1>

            <table border="1">
                <thead>
                    <tr></tr>
                </thead>  
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="<?php echo "$baseUrl/scripts/show_csv.js"; ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', event => {
            showCsvFiles()

            const mainForm = document.querySelector('form')

            mainForm.addEventListener('submit', event => {
                event.preventDefault()

                const formdata = new FormData(mainForm)

                fetch(`${baseUrl}/upload.php`, {
                    method: "POST",
                    body: formdata
                })

                showCsvFiles()
            })
        })
    </script>
</body>
</html>