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
5337,
5374,
5202,
5358
];


if($_POST)
{
   $exp_avg =[];
   $avg = [];
   $post = $_POST['data'];//var_dump(count($post));
   for ($i = 1; $i <= 27; $i++)
   {
        if ($i = 2)
        {
            $exp_avg[$i] = $post[$i-1];
        }

        if ($i > 3)
        {
            $exp_avg[$i] = 0.1 * $post[$i-1] + 0.9 * $exp_avg[$i-1];
        }

        if ($i > 4)
        {
            $avg[$i] = ($post[$i-2] + $post[$i-1] + $post[$i])/3;
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
<form action="methods4.php" method="POST">
    <table width="100px">
        <tr>
            <td>
                <?php
                for($i=0; $i<27; $i++)
                {
                    // echo $data[$i];
                    echo "<input type='number' step='0.01' name='data[$i]' value='$data[$i]'>";
                    if($exp_avg && $avg)
                    {
                        echo "</td><td>$exp_avg[$i]</td><td>$avg[$i]</td>";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
    <input type="submit">
</form>
<script href="/js/bootstrap.min.js"></script>
<script href="/js/jquery.min.js"></script>
</body>
</html>