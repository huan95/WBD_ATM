<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V4</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"-->
    <!--          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->

</head>
<body>
<style type="text/css">
    .login {
        height: 250px;
        width: 400px;
        margin: 0;
        padding: 10px;
        border: 3px red solid;
        border-radius: 15px;
    }
    .login input {
        padding: 5px;
        margin: 5px
    }
</style>
<div class="container">
    <div class="login">
        <form class="form validate-form" method="post">
            <div class="validate-input" data-validate="Name is required">
                <span style="color: green">User 1</span>
                <input type="text" name="user1" placeholder="Enter your name" size="25" style="margin-left: 15px">
            </div>

            <div class="validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <span style="color: green">User 2 </span>
                <input type="text" name="user2" placeholder="Id 1" size="25" style="margin-left: 15px">
            </div>

            <div class=" validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <span style="color: green">Content </span>
                <input type="text" name="content" placeholder="content" size="25">
            </div>

            <div class="validate-input" data-validate="Id 2">
                <span style="color: green">Amount</span>
                <input type="text" name="amount" placeholder="amount" size="25">
            </div>

            <div class="container-form-btn">
                <div class="wrap-form-btn">
                    <div class="form-bgbtn"></div>
                    <button class="form-btn">
							<span>
								Submit
								<i  aria-hidden="true"></i>
							</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<p>
    <a href="index.php?page=index" class="btn btn-primary">index</a>
</p>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</html>
