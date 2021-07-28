<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="display-4 m-4">
            <form method="post" action='' enctype='multipart/form-data'>
                <p class="text-dark text-center">
                    Upload files to the Server
                    <input type="file" class="form-control file_input mt-4" id="inputFile" name="inputFile[]" multiple>
                </p>
                <input type="submit" class="btn btn-dark d-block" id="submit" name="submit" value="Upload">
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html>