
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>easyDo | Home</title>
    
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
        }


a{
    text-decoration: none;
}
.logo {
    font-size: 2em;
    color: #fff;
    user-select: none;  
}

.navigation a {
    position: relative;
    font-size: 1.1em;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}

.navigation a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 5px;
    transform-origin: right;
    transform: scale(0);
    transition: transform .5s;
}

.navigation a:hover::after {
    transform-origin: left;
    transform: scale(1);
}
.header{
    background: #162938;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px 100px;
    border: 2px solid #fff;
    backdrop-filter: blur(20px);
    border-radius: 2cm;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;

}

.logo{
    font-size: 2em;
    color: #fff;
    user-select: none;  
}
.navigation a{
    position: relative;
    font-size: 1.1em;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}
.navigation a::after {
    content:'';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 5px;
    transform-origin: right;
    transform: scale(0);
    transition: transform .5s;
}
.navigation a:hover::after{
    transform-origin: left;
    transform: scale(1);

}


    </style>
</head>
<body>
    <div class="header">
    <a href="index.php"><h2 class ="logo">easyDo</h2></a>
        <nav class="navigation">
            <a href="about.php">About</a>
            <a href="service.php">Service</a>
            <a href="contact.php">Contact</a>
            <a href="logout.php">Logout</a>
            <!--Drop down menu-->
           
        </nav>
    </div>