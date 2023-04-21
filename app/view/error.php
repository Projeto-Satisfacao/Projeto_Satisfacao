<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .button-modal {
        width: 300px;
        height: 8vh;
        font-size: 23px;
        min-height: 14bh;
        min-width: 250px;
        background-color: #1070be;
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 10px;
        cursor: pointer;
        width: auto;
        border-style: outset;
        border-radius: 15px;border-color: #479be0;
    }
    
    .custom-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            text-align: center;
            padding-top: 100px;
        }
        .custom-modal-content {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px #000;
        }
</style>
</head>
<body>
<script>
function showModal()
{
    $('#customModal').fadeIn();
}

function hideModal() 
{
    window.location.replace("./pages/index-cadastros.php");
}

</script>
</body>
</html>

