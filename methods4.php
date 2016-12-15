<?php
$data = [
3601,
3537,
3370,
3481,
3509,
3534,
4012,
3455,
3633,
3863,
3998,
4042,
4299,
4390,
4205,
4343,
4532,
4498,
5230,
4362,
4585,
4920,
4895,
4984,
5337
];


if($_POST)
{
   $exp_avg =[];
   $avg = [];
   $post = $_POST['data'];//var_dump(count($post));
   for ($i = 0; $i <= count($post); $i++)
   {
        if ($i == 1)
        {
            $exp_avg[$i] = $post[$i-1];
        }

        if ($i > 1)
        {
            $exp_avg[$i] = round(0.1 * $post[$i-1] + 0.9 * $exp_avg[$i-1],2);
//            $exp_avg[$i] = 0.1 * $post[$i-1] + 0.9 * $exp_avg[$i-1];
        }

        if ($i > 2)
        {
            $avg[$i] = round(($post[$i-3] + $post[$i-2] + $post[$i-1])/3 , 2);
//            $avg[$i] = ($post[$i-2] + $post[$i-1] + $post[$i])/3;
        }
   }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Наївні методи</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Наївні методи</h1>
        <form action="methods4.php" method="POST">
            <table class="table">   
                <?php
                if($_POST){
                    for($i=0; $i<count($post); $i++)
                    {
                        echo "<td>$data[$i]</td>";

                        if(isset($avg[$i]))
                        {
                            echo "<td>$avg[$i]</td>";
                        } else {
                            echo "<td></td>";
                        }

                        if(isset($exp_avg[$i]) ){
                            echo "<td>$exp_avg[$i]</td>";
                        } else {
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }

                } else {
                    for($i=0; $i<25; $i++)
                    echo "<tr><td><input required class='form-control' type='number' step='0.01' name='data[$i]' value='$data[$i]'> </td></tr>";
                    echo "<tr><td><input class='btn btn-primary' type='submit'></td></tr>";
                }

                ?>
            </table>

        </form>
    </div>
</div>
<script href="/js/bootstrap.min.js"></script>
<script href="/js/jquery.min.js"></script>
</body>
</html>