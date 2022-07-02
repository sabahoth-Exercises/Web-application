<%--
  Created by IntelliJ IDEA.
  User: brune
  Date: 09/12/2021
  Time: 14:03
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" %>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8" lang="RU-ru">
    <title>Web2</title>
    <link rel="stylesheet" href="${pageContext.request.contextPath}/css/main.css">
</head>
<body>
<jsp:include page="/html/header.html"/>
<div class="content">
    <div class="container">

        <div class="graph-view-wr">
            <div class="panel">
                <canvas id="graph-canvas" class="graph-view" width="1000" height="1000"></canvas>
            </div>
        </div>

        <div class="controls">

            <form method="post" action="${pageContext.request.contextPath}/control">

                <div class="panel">
                    <label for="x" class="panel__title">Coordinates X</label>
                    <input type="text" name="x" id="x" class="x_input" placeholder="(-5; 3)" autocomplete="off">
                </div>

                <div class="panel">
                    <label class="panel__title" for="y">Coordinates Y</label>
                    <div class="panel__content">
                        <select id="y">
                            <option value="-4.0">-4</option>
                            <option value="-3.0">-3</option>
                            <option value="-2.0">-2</option>
                            <option value="-1.0">-1</option>
                            <option value="0.0" selected>0</option>
                            <option value="1.0">1</option>
                            <option value="2.0">2</option>
                            <option value="3.0">3</option>
                            <option value="4.0">4</option>
                        </select>
                    </div>
                    <input type="hidden" name="y" value="0">
                </div>

                <div class="panel">
                    <p class="panel__title">R Values</p>
                    <div class="panel__content">
                        <button class="r_button" type="button" data-setter="r" data-value="1">1</button>
                        <button class="r_button" type="button" data-setter="r" data-value="2">2</button>
                        <button class="r_button" type="button" data-setter="r" data-value="3">3</button>
                        <button class="r_button" type="button" data-setter="r" data-value="4">4</button>
                        <button class="r_button" type="button" data-setter="r" data-value="5">5</button>
                    </div>
                    <input type="hidden" id="r" name="r" value="">
                </div>

                <div class="panel hidden err-msg" id="err-msg"></div>

                <button id="submit-btn" type="submit" class="submit-btn">Checking</button>

            </form>
        </div>

    </div>
</div>
<script src="${pageContext.request.contextPath}/js/graphpicker.js"></script>
<script src="${pageContext.request.contextPath}/js/main.js"></script>
<jsp:include page="/html/footer.html"/>
</body>
</html>