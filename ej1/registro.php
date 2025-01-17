<body>
    <?php  if(isset($err)) echo($err);   ?>
    <form action="index.php?action=registrar" method="post">
        <label for="nom">Nombre</label>
        <input type="text" name="nom" >
        <br>
        <label for="psw">Contraseña</label>
        <input type="password" name="psw">
        <br>
        <label for="psw">Contraseña 2</label>
        <input type="password" name="psw2">
        <br>
        <input type="submit" value="Enviar" name="fReg">
        <p>¿Ya tienes cuenta? <a href='index.php'>Iniciar Sesion</a></p>

    </form>
</body>
