<?php
    include 'partials/header.tpl.php';
?>
<body>
    <form action="?url=logaction" method="POST">
        Email:<input type="email" name="email" id="" placeholder="email">
        Contraseña: <input type="password" name="password" id="" placeholder="password">
        <button type="submit">Login</button>
</body>
</html>