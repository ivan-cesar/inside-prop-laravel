<html>
    <head></head>
    <title></title>
    <body>
        <img src="{{asset('public/dashboard/images/logo.svg')}}" alt="logo" style="width: 50%;position: relative;left: -5%;"/>
        <div style="width:600px">
            <h3>Bonjour, {{$name}} {{$prenoms}}</h3>
            <p>Votre compte a étè crée veuillez trouver ci-dessous les détails de votre connexion </p>
            <p> email: {{$email}}</p>
            <p>Pour valider votre compte veuillez  <a href="{{route('users.validation',$urlMailValidation)}}"> cliquer ici</a></p>
        </div>
    </body>
</html>