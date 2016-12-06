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
            <input required type="number" name="person_priority[0]" class="form-control" placeholder="Вага">
            <hr>
            <input required type="number" name="criteria[0][0]" class="form-control" placeholder="Ціна">
            <input required type="number" name="obj[0][0]" class="form-control" placeholder="GTX 1080">
            <input required type="number" name="obj[0][1]" class="form-control" placeholder="R9 295X2">
            <input required type="number" name="obj[0][2]" class="form-control" placeholder="GTX 980 TI">
            <hr>
            <input required type="number" name="criteria[0][1]" class="form-control" placeholder="Продуктивність">
            <input required type="number" name="obj[1][0]" class="form-control" placeholder="GTX 1080">
            <input required type="number" name="obj[1][1]" class="form-control" placeholder="R9 295X2">
            <input required type="number" name="obj[1][2]" class="form-control" placeholder="GTX 980 TI">
            <hr>
            <input required type="number" name="criteria[0][2]" class="form-control" placeholder="Вигляд">
            <input required type="number" name="obj[2][0]" class="form-control" placeholder="GTX 1080">
            <input required type="number" name="obj[2][1]" class="form-control" placeholder="R9 295X2">
            <input required type="number" name="obj[2][2]" class="form-control" placeholder="GTX 980 TI">
        </div>
        <div class="col-xs-6">
            <h2>
                Син
            </h2>
            <input required type="number" name="person_priority[1]" class="form-control" placeholder="Вага">
            <hr>
            <input required type="number" name="criteria[1][0]" class="form-control" placeholder="Ціна">
            <input required type="number" name="obj[3][0]" class="form-control" placeholder="GTX 1080">
            <input required type="number" name="obj[3][1]" class="form-control" placeholder="R9 295X2">
            <input required type="number" name="obj[3][2]" class="form-control" placeholder="GTX 980 TI">
            <hr>
            <input required type="number" name="criteria[1][1]" class="form-control" placeholder="Продуктивність">
            <input required type="number" name="obj[4][0]" class="form-control" placeholder="GTX 1080">
            <input required type="number" name="obj[4][1]" class="form-control" placeholder="R9 295X2">
            <input required type="number" name="obj[4][2]" class="form-control" placeholder="GTX 980 TI">
            <hr>
            <input required type="number" name="criteria[1][2]" class="form-control" placeholder="Вигляд">
            <input required type="number" name="obj[5][0]" class="form-control" placeholder="GTX 1080">
            <input required type="number" name="obj[5][1]" class="form-control" placeholder="R9 295X2">
            <input required type="number" name="obj[5][2]" class="form-control" placeholder="GTX 980 TI">
        </div>
    </div>
    <input type="submit" class="btn btn-primary">
</form>
<script href="/js/bootstrap.min.js"></script>
<script href="/js/jquery.min.js"></script>
</body>
</html>
<?php
if($_POST){
    if (round($_POST['person_priority'][0] + $_POST['person_priority'][1],2) == 1 &&
        round($_POST['criteria'][0][0] + $_POST['criteria'][0][1] + $_POST['criteria'][0][2] ,2) == 1 &&
        round($_POST['criteria'][1][0] + $_POST['criteria'][1][1] + $_POST['criteria'][1][2] ,2) == 1 &&
        round($_POST['obj'][0][0] + $_POST['obj'][0][1] + $_POST['obj'][0][2] ,3) == 1 &&
        round($_POST['obj'][1][0] + $_POST['obj'][1][1] + $_POST['obj'][1][2] ,2) == 1 &&
        round($_POST['obj'][2][0] + $_POST['obj'][2][1] + $_POST['obj'][2][2] ,2) == 1 &&
        round($_POST['obj'][3][0] + $_POST['obj'][3][1] + $_POST['obj'][3][2] ,2) == 1 &&
        round($_POST['obj'][4][0] + $_POST['obj'][4][1] + $_POST['obj'][4][2] ,2) == 1 &&
        round($_POST['obj'][5][0] + $_POST['obj'][5][1] + $_POST['obj'][5][2] ,2) == 1)
    {
        $priority[0][0] = $_POST['criteria'][0][0] * $_POST['obj'][0][0] + $_POST['criteria'][0][1] * $_POST['obj'][1][0] + $_POST['criteria'][0][2] * $_POST['obj'][2][0];
        $priority[0][1] = $_POST['criteria'][0][0] * $_POST['obj'][0][1] + $_POST['criteria'][0][1] * $_POST['obj'][1][1] + $_POST['criteria'][0][2] * $_POST['obj'][2][1];
        $priority[0][2] = $_POST['criteria'][0][0] * $_POST['obj'][0][2] + $_POST['criteria'][0][1] * $_POST['obj'][1][2] + $_POST['criteria'][0][2] * $_POST['obj'][2][2];

        $priority[1][0] = $_POST['criteria'][1][0] * $_POST['obj'][3][0] + $_POST['criteria'][1][1] * $_POST['obj'][4][0] + $_POST['criteria'][1][2] * $_POST['obj'][5][0];
        $priority[1][1] = $_POST['criteria'][1][0] * $_POST['obj'][3][1] + $_POST['criteria'][1][1] * $_POST['obj'][4][1] + $_POST['criteria'][1][2] * $_POST['obj'][5][1];
        $priority[1][2] = $_POST['criteria'][1][0] * $_POST['obj'][3][2] + $_POST['criteria'][1][1] * $_POST['obj'][4][2] + $_POST['criteria'][1][2] * $_POST['obj'][5][2];

        $tmp[0]= $priority[0][0] * $_POST['person_priority'][0] + $priority[1][0] * $_POST['person_priority'][1];
        $tmp[1]= $priority[0][1] * $_POST['person_priority'][0] + $priority[1][1] * $_POST['person_priority'][1];
        $tmp[2]= $priority[0][2] * $_POST['person_priority'][0] + $priority[1][2] * $_POST['person_priority'][1];

        if(max($tmp[0],$tmp[1],$tmp[2])==$tmp[0]){
            echo "Оптимальним вибором буде GTX 1080";
        } else if(max($tmp[0],$tmp[1],$tmp[2])==$tmp[1]){
            echo "Оптимальним вибором буде R9 295x2";
        } else{
        echo "Оптимальним вибором буде GTX 980 TI";
    }

    } else {
        echo "invalid data";
    }
}
