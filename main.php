<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Railway Tickets</title>

    <link  type='text/css' rel='stylesheet' href='css/pure-release-1.0.0/normalize.css'>

    <?php
        foreach (glob("css/pure-release-1.0.0/*.css") as $css) {
            echo "<link type='text/css' rel='stylesheet' href='$css'>\n";
        }
    ?>
    <script src="jquery/jquery-3.2.1.min.js"></script>

</head>
<body>
    <form id='uiForm' method="post" action="searchTickets.php" class="pure-form pure-form-aligned">
        <fieldset>
            
            日期:<input type="date" name="date"/>
        
        
            起站:
            
                <input type="radio" name="depStn" value="基隆"/>基隆
                <input type="radio" name="depStn" value="七堵"/>七堵
                <input type="radio" name="depStn" value="臺北"/>臺北
                <input type="radio" name="depStn" value="板橋"/>板橋
                <input type="radio" name="depStn" value="桃園"/>桃園
                <input type="radio" name="depStn" value="中壢"/>中壢
                <input type="radio" name="depStn" value="新竹"/>新竹
                <input type="radio" name="depStn" value="苗栗"/>苗栗
                <input type="radio" name="depStn" value="台中"/>台中
                <input type="radio" name="depStn" value="彰化"/>彰化
                <input type="radio" name="depStn" value="雲林"/>雲林
                <input type="radio" name="depStn" value="嘉義"/>嘉義
                <input type="radio" name="depStn" value="臺南"/>臺南
                <input type="radio" name="depStn" value="高雄"/>高雄
                <input type="radio" name="depStn" value="屏東"/>屏東
                <input type="radio" name="depStn" value="臺東"/>臺東
                <input type="radio" name="depStn" value="花蓮"/>花蓮
                <input type="radio" name="depStn" value="宜蘭"/>宜蘭
                <input type="radio" name="depStn" value="NoStn" hidden checked/>
            
        
        
            迄站:
            
                <input type="radio" name="arrStn" value="基隆"/>基隆
                <input type="radio" name="arrStn" value="七堵"/>七堵
                <input type="radio" name="arrStn" value="臺北"/>臺北
                <input type="radio" name="arrStn" value="板橋"/>板橋
                <input type="radio" name="arrStn" value="桃園"/>桃園
                <input type="radio" name="arrStn" value="中壢"/>中壢
                <input type="radio" name="arrStn" value="新竹"/>新竹
                <input type="radio" name="arrStn" value="苗栗"/>苗栗
                <input type="radio" name="arrStn" value="台中"/>台中
                <input type="radio" name="arrStn" value="彰化"/>彰化
                <input type="radio" name="arrStn" value="雲林"/>雲林
                <input type="radio" name="arrStn" value="嘉義"/>嘉義
                <input type="radio" name="arrStn" value="臺南"/>臺南
                <input type="radio" name="arrStn" value="高雄"/>高雄
                <input type="radio" name="arrStn" value="屏東"/>屏東
                <input type="radio" name="arrStn" value="臺東"/>臺東
                <input type="radio" name="arrStn" value="花蓮"/>花蓮
                <input type="radio" name="arrStn" value="宜蘭"/>宜蘭
                <input type="radio" name="arrStn" value="NoStn" hidden checked/>  
            
        
            對號列車車種:
            
                <input type="checkbox" name="carClass[]" value="TC" checked/>自強號
                <input type="checkbox" name="carClass[]" value="CK"/>莒光號
                <input type="checkbox" name="carClass[]" value="FX"/>復興號
            
        
        
            分段組合查詢: <a href="#">(說明)</a>
            
                <input type="radio" name="allowPieces" value="Yes" checked>是
                <input type="radio" name="allowPieces" value="No">否
            
        
            
            <!--<input type="submit" name="request" value="查詢"/>-->
            <input id='post-btn' type="button" name="lookup" value="查詢">
            
        </fieldset>
    </form>

    <hr>
    <div id='showResults'></div>

    <script>
    $("#post-btn").click( function() {
        $.post("searchTickets.php", $(uiForm).serialize(), function(data) {
            // alert(data);
            $("#showResults").html(data);
        });
    });
    </script>

</body>

</html>