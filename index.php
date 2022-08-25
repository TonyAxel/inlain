<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div><input type="text" id="sr" class="srr"></div>
        <div>
        <input type="button" value="Поиск" id="search">
        </div>
    </div>
    <div id="count"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajax({
        method: 'get',
        url: 'https://jsonplaceholder.typicode.com/posts',
        success: function(data1){
            dataP = data1;
        }
        });
        $.ajax({
        method: 'get',
        url: 'https://jsonplaceholder.typicode.com/comments',
        success: function(data){
            dataC = data
            $.ajax({
                    method: 'post',
                    url: `add.php`,
                    data: {dataP:dataP, dataC:dataC},
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });

    $('#search').click(function(){
        var srr = $('#sr').val();
        console.log(srr);
        if(srr.length >= 3){
            $.ajax({
            method: 'get',
            url: 'search.php',
            data: {data: srr},
            success: function(data){
                let count = $.parseJSON(data);
                count.forEach(elems => elems.forEach(elem => $('<div class="cry"><p>'+ 'ЗАГОЛОВОК ЗАПИСИ:' + elem[0] + '</p>' + '<p>'+ 'Email-комментатора:' + elem[1] + '</p>' + '<p>'+ 'Комментарий:' + elem[2] + '</p></div>').appendTo('#count')
                    )
                );
            }
        })
        }
        
    })
    </script>
</body>
</html>
