<?php
include_once "./fmysql.php";
    $sql = "select * from information WHERE category_id = {$category} limit 0,5";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }
    $arr_info=array();
    while($row = mysqli_fetch_array($result)) {
        array_push($arr_info,$row);
    }

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
</head>
<body>
<form>
    <div>
        <table>
            <?php
            if($arr_info){
                foreach ($arr_info as $val)
                {
                    ?>
                    <table>
                        <table width="90%" style="font-size: 14px">
                            <td width="50%" location="center">
                                <?php
                                echo "<a href='r.php?id={$val['id']}'>{$val['title']}</a>";

                                ?>
                            </td>
                            <td width="25%" location="center">
                                <?php
                                echo "{$val['author']}";
                                ?>
                            </td>
                            <td width="25%">
                                <?php
                                echo "{$val['created_at']}";
                                ?>
                            </td>
                            <?



                            echo "<tr>","\n";
                            ?>
                        </table>
                    </table>
                    <?
                    echo "</br>";
                }
            }
            ?>

        </table>
    </div>
</form>
</body>
</html>
