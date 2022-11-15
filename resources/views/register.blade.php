


<html>
    <link  href="{{url('css/stile.css')}}" rel="stylesheet">
    <script src="validation.js" defer="true"></script>
    <body>

<div id="register">
    <div id="titoloregister">
        <label>Register</label>
    </div>

    <form  action="" class="formregister" method="post">
        @csrf
        <div class="control">
            <label>Nome:</label>
            <input type="text" name="nome" class="testo" id="nome" value='{{old("nome")}}' placeholder="Nome" />
			<small class="hidden"></small>
        </div>
        <div class="control">
            <label>Cognome:</label>
            <input type="text" name="cognome" class="testo" id="cognome" value='{{old("cognome")}}' placeholder="Cognome" />
			<small class="hidden"></small>
        </div>
        <div class="control">
            <label>E-mail:</label>
            <input type="text" name="email" class="testo" id="email" value='{{old("email")}}' placeholder="E-mail" />
			<small class="hidden"></small>
        </div>
        <div class="control">
            <label>Usename:</label>
            <input type="text" name="username" class="testo" id="username" value='{{old("username")}}' placeholder="Username" />
			<small class="hidden"></small>
        </div>
        <div class="control">
            <label>Password:</label>
            <input type="password" name="password" class="testo" id="password" value='{{old("password")}}' placeholder="Password" />
			<small class="hidden"></small>
        </div>
        <div class="control">
            <label>Conferma Password:</label>
            <input type="password" name="confermaPassword" class="testo" id="confermaPassword" value='{{old("confermaPassword")}}' placeholder="Password" />
			<small class="hidden"></small>
        </div>

        <input type="submit" class="button" value="register" />
    </form>
</div>
</body>
</html> 