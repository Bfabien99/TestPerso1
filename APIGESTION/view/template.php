<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Testperso1/APIGESTION/assets/css/style.css">
    <title>Document</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    width: 100%;
    min-height: 100%;
}

div.container {
    padding: 2em;
    display: flex;
    flex-direction: column;
    gap: 1em;
    flex-wrap: wrap;
}

div.content {
    padding: 2em;
    display: flex;
    flex-direction: row;
    gap: 1em;
    justify-content:space-around;
    flex-wrap: wrap;
}

div.box{
    display: flex;
    flex-direction: column;
    gap: 0.5em;
    align-items:center;
    padding: 5px;
    width: 30%;
    border: 1px solid black;
    background-color:rgb(218, 243, 211);
}

div.group {
    width: 90%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 5px;
}

div.group a{
    color: white;
    width:25%;
    padding: 10px;
    border: none;
    text-decoration: none;
    text-align: center;
}

a.delete{
    background-color:tomato; 
 }

a.update{
    background-color: #5c8df9;
}

a.show{
    background-color:orangered;
}

img{
    height:120px;
    border: 1px solid rgb(173, 173, 173);
}
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/TestPerso1/APIGESTION/">Accueil</a></li>
            <li><a href="/TestPerso1/APIGESTION/property">Toutes les propriétés</a></li>
        </ul>
    </nav>

    <div class="container">
        <?= $content; ?>
    </div>
</body>
</html>