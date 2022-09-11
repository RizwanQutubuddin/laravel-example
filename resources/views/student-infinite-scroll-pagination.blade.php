<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Student infinite strcoll</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Infinite scroll pagination</h2>
            </div>
            <div class="col-md-12" id="student-data">
                @include('data')
            </div>
        </div>
    </div>
    <div class="ajax-load text-center" style="display:none">
        <p><img src="{{asset('images/loader.gif')}}" alt="loading..."/>Loading more Student</p>
    </div>
    <script>
        function loadMoreData(page){
            $.ajax({
                url:'?page='+page,
                type:"get",
                beforeSend:function(){
                    $(".ajax-load").show();
                }
            })
            .done(function(data){
                if(data.html==""){
                    $('.ajax-load').html('No more record found');
                    return;
                }
                $(".ajax.load").hide();
                $("#student-data").append(data.html);
                console.log(data.html);
            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert('Server not responding...');
            });
        }

        var page=1;
        $(window).scroll(function(){
            if($(window).scrollTop()+$(window).height()>=$(document).height()){
                page++;
                loadMoreData(page);
            }
        })
    </script>
</body>
</html>