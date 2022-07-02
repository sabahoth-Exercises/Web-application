<%--
  Created by IntelliJ IDEA.
  User: brune
  Date: 09/12/2021
  Time: 14:04
  To change this template use File | Settings | File Templates.
--%>
<%@ page import="java.util.List" %>
<%@ page import="com.example.pip2.Result" %>
<%@ page contentType="text/html;charset=UTF-8" %>

<html>
<head>
    <title>Результаты</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="${pageContext.request.contextPath}/css/main.css">
    <link rel="stylesheet" href="${pageContext.request.contextPath}/css/result.css">
</head>
<body>
<%!
    private String timeShortener(long millis) {
        long delta = System.currentTimeMillis() - millis;
        if (delta < 1000)
            return "Just now";
        if (delta < 1000*60)
            return delta/1000 + " sec. ago";
        if (delta < 1000*60*60)
            return delta/1000/60 + " min. ago";
        return delta/1000/60/60 + " hours ago";
    }
%>
<%
    String resultStatus = (String)session.getAttribute("last_result_status");
    @SuppressWarnings("unchecked")
    List<Result> results = (List<Result>) session.getAttribute("results");
    if (results != null) {
        while (results.size() > 10)
            results.remove(results.size() - 1);
    }
%>
<jsp:include page="/html/header.html"/>
<div class="content">
    <div class="container">
        <div class="graph-view-wr left">
            <div class="panel">
                <canvas id="graph-canvas" class="graph-view" width="1000" height="1000"></canvas>
            </div>
        </div>

        <div class="right">
            <% if (results != null && resultStatus != null) { %>
            <div class="panel">
                <div class="panel__title">Результат</div>
                <div class="panel__content">
                    <% if ("ok".equals(resultStatus)) { %>
                    <div class="result_hit"><%= results.get(0).hit ? "Hit" : "Out" %></div>
                    <a href="${pageContext.request.contextPath}/" class="result_again">Try again</a>
                    <% } else if ("wrong_data".equals(resultStatus)) { %>
                    <div class="result_error">Your entered data are incorrect!!</div>
                    <% } %>
                </div>
            </div>
            <% } %>

            <div class="panel">
                <div class="panel__title">History</div>
                <div class="panel__content">
                    <table class="results">
                        <tr>
                            <th>X</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Hit result</th>
                            <th>Time</th>
                        </tr>
                        <% if (results != null) {%>
                        <% for (Result result : results) { %>
                        <tr>
                            <td><%= result.x %></td>
                            <td><%= result.y %></td>
                            <td><%= result.r %></td>
                            <td><%= result.hit ? "Greaat" : "Sooorry" %></td>
                            <td><%= timeShortener(result.timestamp) %></td>
                        </tr>
                        <% }} %>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="${pageContext.request.contextPath}/js/graphpicker.js"></script>
<script src="${pageContext.request.contextPath}/js/results.js"></script>
<jsp:include page="/html/footer.html"/>
</body>
</html>