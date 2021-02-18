<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container">
    <div class="row">
        
    </div>
    <form method="POST" class="row flex justify-content-center my-5">
        <div class="col-12 text-center">
            <h1 >Register</h1>
        </div>
        
        <div class="col-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Repeat password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/auth" class="text-end">Sing In</a>
            </div>
        </div>
    </form>
</body>
</html>