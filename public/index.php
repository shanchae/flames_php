<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FLAMES</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <h1>FLAMES</h1>
    <form id="flamesForm" method="get" onsubmit="flamesSubmit(event)">
        <input type="text" name="name1" id="name1" placeholder="Name 1" required="required">
        <input type="text" name="name2" id="name2" placeholder="Name 2" required="required">
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit"/>
    </form>
    <h2 id="result"></h2>
    <script>
        var xhttp = new XMLHttpRequest();

        function flamesSubmit(e){
            var url = "../src/php/flames.php";
            var data = $("#flamesForm").serialize();
            /*  This creates a URL Parameter list that will look like this: 
                name1=value_of_name1&name2=value_of_name2*/
            var urlData = url+"?"+data;
            /*  To pass data to your php in GET, concatenate url + "?" + data to create a url request like this: 
                ../src/php/flames.php?name1=value_of_name1&name2=value_of_name2*/
            xhttp.open("GET", urlData, true);
            xhttp.send();
            /*  To pass data to your php in POST, use the following instead:
                xhttp.open("POST", url, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
                xhttp.send(data);*/
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var res = JSON.parse(this.responseText);
                    if(res["status"] == 200){
                        $("#result").text(res["data"]);
                    }else{
                        alert(res["data"]);
                    }
                }
            };
            e.preventDefault();
        }
    </script>
</body>
</html>