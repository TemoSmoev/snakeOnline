<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link rel="stylesheet" href="/snake/templates/css/snake2.css">
</head>
<body>

<div id="header">
    <a id="logout" href="/snake/logout">logout</a>
    <p id="hello-user" > hello <?php echo $userData['username']; ?></p>
    <p id="your-best">your best score is <?php echo $userData['score'] ?></p>
    <p class="current-score">current score: <p id="current-score" class="current-score">0</p></p>
</div>
<div id="box">
    <div class="snake"></div>
    <div class="food"></div>
    <div id="vertical-box">
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
        <div class="vertical"></div>
    </div>
    <div id="horizontal-box">
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
        <div class="horizontal"></div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/snake/templates/js/snake3.js"></script>
</body>
</html>
