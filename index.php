<!DOCTYPE html>
<html>
<head>
    <title>Ієрархії</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<form action="index.php" method="POST">
    <div class="container">
        <h1>ІЄРАРХІЇ</h1>
        <div class="col-xs-6">
            <h2>
                Батько
            </h2>
            <input name="person_priority[0]" class="form-control" placeholder="Вага">
            <hr>
            <input name="criteria[0][0]" class="form-control">
            <input name="criteria[1][0]" class="form-control">
            <input name="criteria[2][0]" class="form-control">
            <hr>
            <input name="obj[0][1]" class="form-control">
            <input name="obj[1][0]" class="form-control">
            <input name="obj[2][0]" class="form-control">
            <hr>
            <input name="obj[0][2]" class="form-control">
            <input name="obj[1][0]" class="form-control">
            <input name="obj[2][0]" class="form-control">
            <hr>
            <input name="obj[0][3]" class="form-control">
            <input name="obj[1][0]" class="form-control">
            <input name="obj[2][0]" class="form-control">
        </div>
        <div class="col-xs-6">
            <h2>
                Син
            </h2>
            <input name="person_priority[1]" class="form-control" placeholder="Вага">
            <hr>
            <input name="criteria[0][1]" class=" form-control">
            <input name="criteria[1][1]" class=" form-control">
            <input name="criteria[2][1]" class=" form-control">
            <hr>
            <input name="obj[0][1]" class=" form-control">
            <input name="obj[1][1]" class=" form-control">
            <input name="obj[2][1]" class=" form-control">
            <hr>
            <input name="obj[0][0]" class="form-control">
            <input name="obj[1][0]" class="form-control">
            <input name="obj[2][0]" class="form-control">
            <hr>
            <input name="obj[0][0]" class="form-control">
            <input name="obj[1][0]" class="form-control">
            <input name="obj[2][0]" class="form-control">
        </div>

    </div>
    <input type="submit" class="btn btn-primary">
</form>
<script href="/js/bootstrap.min.js"></script>
<script href="/js/jquery.min.js"></script>
</body>
</html>
<?php
var_dump($_POST);
if($_POST){
    if($_POST['person_priority'][0] + $_POST['person_priority'][1] == 1) {
        echo "success";
    } else {
        echo "check person priority";
    }
    if($_POST['criteria'][0][0] + $_POST['criteria'][0][1] == 1) {
        echo "success";
    } else {
        echo "check first criteria";
    }

    if($_POST['criteria'][1][0] + $_POST['criteria'][1][1] == 1) {
        echo "success";
    } else {
        echo "check second criteria";
    }

    if($_POST['criteria'][2][0] + $_POST['criteria'][2][1] == 1) {
        echo "success";
    } else {
        echo "check third criteria";
    }

    $priority[0][0] = $_POST['criteria'][0][0] * $_POST['obj'][0][0] + $_POST['criteria'][1][0] * $_POST['obj'][0][0] + $_POST['criteria'][2][0] * $_POST['obj'][0][0];
    $priority[0][1] = $_POST['criteria'][0][0] * $_POST['obj'][1][0] + $_POST['criteria'][1][0] * $_POST['obj'][1][0] + $_POST['criteria'][2][0] * $_POST['obj'][1][0];
    $priority[0][2] = $_POST['criteria'][0][0] * $_POST['obj'][2][0] + $_POST['criteria'][1][0] * $_POST['obj'][2][0] + $_POST['criteria'][2][0] * $_POST['obj'][2][0];

    $priority[1][0] = $_POST['criteria'][0][1] * $_POST['obj'][0][1] + $_POST['criteria'][1][1] * $_POST['obj'][0][1] + $_POST['criteria'][2][1] * $_POST['obj'][0][1];
    $priority[1][1] = $_POST['criteria'][0][1] * $_POST['obj'][1][1] + $_POST['criteria'][1][1] * $_POST['obj'][1][1] + $_POST['criteria'][2][1] * $_POST['obj'][1][1];
    $priority[1][2] = $_POST['criteria'][0][1] * $_POST['obj'][2][1] + $_POST['criteria'][1][1] * $_POST['obj'][2][1] + $_POST['criteria'][2][1] * $_POST['obj'][2][1];
}
    $tmp[0]= $priority[0][0] * $_POST['person_priority'][0] + $priority[1][0] * $_POST['person_priority'][1];
    $tmp[1]= $priority[0][1] * $_POST['person_priority'][0] + $priority[1][1] * $_POST['person_priority'][1];
    $tmp[2]= $priority[0][2] * $_POST['person_priority'][0] + $priority[1][2] * $_POST['person_priority'][1];
echo max($tmp[0],$tmp[1],$tmp[2]);