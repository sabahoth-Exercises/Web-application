<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <title>Web1/BrunnotteP3230</title>
    <link rel="stylesheet" type="text/css" href="css.css" >
    <script type="text/javascript" src="js.js"></script>
</head>
<body>
<!-- header start -->
<div id="header" class="section">
    <span class="left"><h3><strong>Васаулюа Брюннотт Тази</strong></h3></span>
    <span class="right">Гр. P3230 / Вар. 30030</span>
    <p><span class="left"><h1><strong>Лабораторная работа №1</strong></h1></span></p>
</div>
<!-- header end -->
<!-- Задание -->
<div class="section" >
    <h1><span>задание</span></h1>
    <h1><p><img class="task_image" src="areas.png" alt="task_picture"
                width="350" height="350" ></p></h1>
    <div class="container form" align="center">
        <form method="get" class="form" action="script.php" target="_blank"
              onsubmit="return check(this);">
            <table class="data_table" >
                <tr>
                    <th>X values:</th>
                    <td>
                        <input type="radio" id="x1" name="X" value="-3">-3<br/>
                        <input type="radio" id="x2" name="X" value="-2">-2<br/>
                        <input type="radio" id="x3" name="X" value="-1">1<br/>
                        <input type="radio" id="x4" name="X" value="0" checked>0<br/>
                        <input type="radio" id="x5" name="X" value="1">1<br/>
                        <input type="radio" id="x6" name="X" value="2">2<br/>
                        <input type="radio" id="x7" name="X" value="3">3<br/>
                        <input type="radio" id="x8" name="X" value="4">4<br/>
                        <input type="radio" id="x9" name="X" value="5">5<br/>
                    </td>
                    <th>Y values:</th>
                    <td>
                        <label for="Y"></label>
                        <input class="input_Y" id="Y" type="text" name="Y" autocomplete="off" placeholder="[-3 ... 3]" required>
                    </td>
                    <th>R values:</th>
                    <td>
                        <input type="checkbox" id="r1" name="R" value="1">1<br/>
                        <input type="checkbox" id="r2" name="R" value="2">2<br/>
                        <input type="checkbox" id="r3" name="R" value="3">3<br/>
                        <input type="checkbox" id="r4" name="R" value="4" checked>4<br/>
                        <input type="checkbox" id="r5" name="R" value="5">5<br/>
                        <script>
                            let checkedCase = document.getElementsByName("R");
                            for(let i = 0; i < checkedCase.length; i++) checkedCase[i].onchange = checkboxHandler;

                            function checkboxHandler(e) {
                                for(let i = 0; i < checkedCase.length; i++)
                                    if(checkedCase[i].checked && checkedCase[i] !== this) checkedCase[i].checked = false;
                            }
                        </script>
                    </td>
                </tr>
            </table>
            <input class="submit" type="submit" name="submit" value=" ПРОВЕРИТЬ ">
        </form>
    </div>
</div>

</body>
</html>