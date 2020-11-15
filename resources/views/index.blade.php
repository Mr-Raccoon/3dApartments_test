<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <style>
        .preloader__image {
            display: block;
            width: 100px;
            border-radius: 50%;
            margin: 0 auto;
            margin-top: 100px;
            height: 100px;
            background: url('../preloader.gif') no-repeat 50% 50%; /*расположение (url) изображения gif и др. параметры*/
        }
    </style>
</head>
<body>


<div id="app">
    <div>
        <div class="container pt-5">
            <div class="header d-flex justify-content-between">
                <button type="button" class="btn btn-primary create-btn" data-toggle="modal" data-target="#exampleModalLong">
                    Create new
                </button>


            </div>

            <card-list></card-list>

            <create-article></create-article>
        </div>

    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous" defer></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous" defer></script>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
