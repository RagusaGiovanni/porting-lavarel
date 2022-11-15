
<html>
    <link  href="{{url('css/stile.css')}}" rel="stylesheet">
    <body>

        
<div id="login">
    <div id="titolologin">
        <label>Login</label>
    </div>
    @if($error== "campi_vuoti")
    <div class="mostraErrore">Compilare Tutti i campi
     </div>
     @elseif($error=="errato")
     <div class="mostraErrore">Compilare Tutti i campi
     </div>
     @endif
    <form action="login.php" class="formlogin" method="post">
        <div class="control">
            <label>Usename:</label>
            <input type="text" name="username" class="testo" value='{{old("username")}}' placeholder="Username" /><br>
        </div>
        <div class="control">
            <label>Password:</label>
            <input type="password" name="password" class="testo" value='{{old("password")}}' placeholder="Password" /><br>
        </div>
        <a href="register.php"><input type="button" class="button" id="register-button" name="Register" value="Register" /></a>
        <input type="submit" class="button" name="submit" value="Login" />
    </form>
</div>
</body>
</html>