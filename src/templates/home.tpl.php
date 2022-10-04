<?php
include 'partials/header.tpl.php';
?>
<body>
    <hader>
        <h1><?=$title;?></h1>
</header>
<nav>
</nav>
<form action="?url=logaction" method="POST">
        Email:<input type="email" name="email" id="" placeholder="email"><br>
        Contraseña: <input type="password" name="password" id="" placeholder="password"><br>
        <button type="submit">Login</button><br>

<main>
    <?php
        foreach($alumnes as $alumne){
            echo $alumne.'<br>';
        }
    ?>
</main>
</body>
</html>