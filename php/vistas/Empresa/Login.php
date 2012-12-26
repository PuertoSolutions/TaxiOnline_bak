<style type="text/css">
	body {
		 padding-top: 80px;
         padding-bottom: 40px;
     }

	.form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #0A6C9F;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	 .form-signin .form-signin-heading, .form-signin .checkbox { margin-bottom: 10px; }
	 .form-signin input[type="text"], .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
	}
</style>

<form class="form-signin" action="/Empresa/Login" method="post">
	<h2 class="form-signin-heading">Inicio sesión Empresas</h2>
	<input type="text" class="input-block-level" placeholder="Empresa" 
		name="nombreempresa" required="required">
	<input type="password" class="input-block-level" placeholder="Contraseña" 
		name="pass" required="required">
	<button class="btn btn-large btn-primary" type="submit">Iniciar</button>
	<a href="/Empresa/Registro" target="_self" class="btn btn-inverse">Formulario Registro &raquo;</a>
</form>