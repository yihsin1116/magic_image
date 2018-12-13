<?
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script>
    $(function()
    {
        $("#uploadPhoto").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#phpto').attr('src', e.target.result);
                    $_COOKIE["file"] =  "a.jpg";
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    }) ;

        $(document).ready(function(){
        $("#send").click(function(event) {
            console.log($("#model").val());
            $.ajax({
                url: "http://140.118.155.145/api/magicImage",
                method: "POST",
                contentType: "application/json",
                data: {
                    file: "q.jpg",
                    model: $("#model").val()
                },
            });
            
            event.preventDefault();
        });
    </script>




    <script>
    $(document).ready(function(){
        $("#send").click(function(event) {
            console.log($("#model").val());
            $.ajax({
                url: "http://140.118.155.145/api/magicImage",
                method: "POST",
                contentType: "application/json",
                data: {
                    file: $_COOKIE["file"];
                    model: $("#model").val()
                },
            });
            
            event.preventDefault();
        });
    </script>

</head>
<body>

    <form>
        <input type='file' id="uploadPhoto" accept="image/gif, image/jpeg, image/png" />
        <br>
        <label>Select a model:</label>
        <select name="model">
        　<option value="MODEL_CANDY">Candy</option>
        　<option value="MODEL_UDNIE">Udnie</option>
        　<option value="MODEL_MOSAIC">Mosaic</option>
        　<option value="MODEL_RAIN">Rain</option>
        </select>
        <br>
        <button type="submit" id="send">Send</button>
        <br>
        <img id="phpto" src="#"/>
    </form>

</body>
</html>