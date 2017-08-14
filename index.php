<!DOCTYPE html>
<html lang="pt-BR" ng-app="brebotesApp">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Brebotes</title>
        <meta name="description" content="Um experimento gastronômico com comidas bem mais ou menos.">
        <meta name="keywords" content="recife, food truck recife, food cart recife, food bike recife, gourmet recife, coxinha recife, brownie recife, comida de rua recife, doces recife, salgados recife, encomenda recife, eventos recife">
        <meta name="author" content="brebotes.com.br">

        <meta name="language" content="pt-br" />
        <meta name="distribution" content="Global" />
        <meta name="rating" content="General" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="30 days" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">

        <!-- facebook -->
        <meta property="fb:app_id" content="622536467937550" />
        <meta property="og:title" content="Brebotes" />
        <meta property="og:url" content="http://brebotes.com.br" />
        <meta property="og:image" content="http://brebotes.com.br/img/square-icon.png" />
        <meta property="og:site_name" content="Brebotes" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Um experimento gastronômico com comidas bem mais ou menos." />

        <meta itemprop="url" content="http://www.brebotes.com.br"/>
        <meta itemprop="headline" content="Brebotes"/>
        <meta itemprop="image" content="img/square-icon.png"/>
        <meta itemprop="description" content="Um experimento gastronômico com comidas bem mais ou menos."/>

        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="author" type="text/plain" href="humans.txt" />
        <link rel="alternate" href="http://www.brebotes.com.br" hreflang="pt-BR" />
        <link href="https://fonts.googleapis.com/css?family=Bitter:400,400i,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <script type="text/javascript" src="js/modernizr.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.min.css" />

    </head>

    <body>

        <main class="main" role="main">

            <section class="container">

                <img src="img/logo.png" width="66" alt="Brebotes" class="logo">

                <span class="flag"></span>

                <article class="content-carousel">

                    <div id="main" ng-view></div>

                </article><!-- /content-carousel -->
            </section><!-- /container -->

            <aside class="content-button button-left">
                <div class="btn btn-box" id="btn_more">Saiba mais</div>
                <div class="box-aside" id="box_more">
                    <div class="content-aside">
                        <span class="close-box"><em></em><em></em></span>
                        <img src="img/logo-full.png" width="215" alt="Brebotes" class="logo-full">
                        <p class="descr-pattern">A Brebotes é um experimento gastronômico. Um novo food cart que está começando em Recife, ou seja, um daqueles carrinhos ambulantes que vendem comidas &#38; mais. Estamos levando a diversos pontos da cidade aqueles lanches bem mais ou menos que todo mundo encontra em todo canto. Só que tudo bem especial: com receitas incríveis, ingredientes frescos e nada de conservantes ou corantes artificiais. Tudo muito gostoso e pensado pra te oferecer um bom produto, por um preço justo, com uma clima agradável (coisa que parece ser tão escassa ultimamente).<br><br>
                        Ah, também aceitamos encomenda. Pra fazer orçamentos, é só clicar no botão “fale com a gente” que fica canto direito da tela e enviar. ;)</p>
                    </div>
                </div>
            </aside><!-- content-button -->

            <aside class="content-button button-right">
                <div class="btn btn-box" id="btn_contact">Fale com a gente</div>
                <div class="box-aside" id="box_contact">
                    <div class="content-aside content-form">
                        <span class="close-box"><em></em><em></em></span>
                        <p class="descr-pattern">Quer convidar a gente pra fazer uma visita à sua empresa, fazer encomendas ou dar um oi?</p>
                        <p class="descr-pattern">Fala aqui em baixo. A gente promete que responde rapidinho!</p>
                        <form action="mailer.php" method="post" accept-charset="utf-8" class="form" id="contact_form">
                            <input type="text" placeholder="Nome" maxlength="100" name="name" required id="name">
                            <input type="email" placeholder="E-mail" maxlength="100" name="email" required id="email">
                            <textarea placeholder="Mensagem" maxlength="255" name="message" required id="message"></textarea>
                            <button type="submit" class="btn-submit">Enviar</button>
                        </form>
                    </div>
                    <div id="form-message">
                        <h3>MENSAGEM ENVIADA!</h3>
                        <p class="descr-pattern">Em breve, você receberá nossa resposta no seu e-mail. Muito obrigado pelo contato! &#60;3</p>
                        <span class="btn-submit back-form">Ok</span>
                    </div>
                </div>
            </aside>

        </main><!-- /main -->


        <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.caroufredsel.js"></script>

        <!-- Angular -->
        <script src="//code.angularjs.org/1.2.20/angular.js"></script>
        <script src="//code.angularjs.org/1.2.20/angular-route.js"></script>
        <script src="//code.angularjs.org/1.2.13/angular-cookies.js"></script>

        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/auth.js"></script>
        <script type="text/javascript" src="js/controller.js"></script>
        <script type="text/javascript" src="js/script.min.js"></script>

        <!--<script async>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'IDAQUI', 'brebotes.com.br');
          ga('send', 'pageview');

        </script>-->
    </body>
</html>
