 <style>
         body{
            background-color: plum;
        }


        h1{
            text-align: center;
        }

        .container {
        display: flex;
        justify-content: center;
        justify-content: space-around;
        background-color: gray;
        margin: -9px;
        padding: 40px;
    }

    .container2{
         display: flex;
        justify-content: center;
        justify-content: space-around;
        background-color: gray;
        margin: -9px;
        padding: 40px;
    }

    button {
        padding: 20px;
        width: 300px;
        background-color: white;

    }

    button:hover {
        background-color: blueviolet;
        transition: background-color 0.3s;
    }


    button:not(:hover) {
        background-color: #f0f0f0;
        transition: background-color 2s;
    }
    </style>


</head>
<body>
    <h1>Menu</h1>

    <!-- ta tentando olhar aqui é? -->
    <button onclick="window.location.href='cadastro.php'">cadastrar usuario</button>
       <button onclick="window.location.href='table.php'">olhar tabela</button>
       <button onclick="window.location.href='login.php'">login</button>
    </body> 

    
</html>

<?php

?>