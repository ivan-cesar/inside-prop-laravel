<html>
    <head></head>
    <title></title>
    <body>
        <img src="{{asset('public/dashboard/images/logo.svg')}}" alt="logo" style="width: 50%;position: relative;left: -5%;"/>
        <div style="width:600px">
            <h3>Bonjour, {{$name}} {{$prenoms}}</h3>
            <p>Connecter pour valider les autorisations de vos collaborateurs </p>
            <!--<p> email: {{$email}}</p>
            <p>Pour valider votre compte veuillez  <a href="{{route('users.validation',$urlMailValidation)}}"> cliquer ici</a></p>-->
        </div>
    </body>
</html>