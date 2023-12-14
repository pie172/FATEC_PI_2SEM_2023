<?php

session_start();
require_once 'database.php';

if (!isset($_SESSION['usuario_autenticado']) || !$_SESSION['usuario_autenticado']) {
    // O usuário não está autenticado, redirecione para a página de login
    header('Location: login.html');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="./images/LOGOCERTA.png">
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <title> MHC </title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente">
            <div class="container">
                <a href="index.html" class="navbar-brand">
                    <img src="./images/LOGOCERTA.png" class="nav-logo">
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                    <i class="fas fa-bars text-white"></i>
                </button>
                <div class="collapse navbar-collapse ml-auto" id="nav-principal">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-auto">
                            <a href="pagina_principal.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link btn btn-color" style="color:#ffffff;">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="caixa">
        <div class="container capa">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/ansiedade2.png" class="img-fluid">
                        <h3>Ansiedade</h3>
                        <p>Ansiedade é um termo usado para definir um sentimento de apreensão, angústia, 
                            incerteza ou desconforto diante de algo desconhecido, estranho ou de uma situação que pode constituir uma ameaça.
                            A ansiedade, geralmente, é acompanhada de sintomas físicos, como taquicardia, dificuldade de respirar e sudorese.
                            A ansiedade pode estar presente em diferentes momentos da nossa vida. O início em um novo emprego ou problemas financeiros, 
                            por exemplo, podem servir de gatilhos para uma crise de ansiedade. Entretanto, 
                            é preciso estar atento a algumas situações, quando a ansiedade surge sem um motivo claro ou com uma magnitude desproporcional.</p>
                            <a href="https://vidasaudavel.einstein.br/ansiedade/" target="_blank" class="btn btn-lg btn-roxo1">
                                Ver mais
                            </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/trabaio2.png" class="img-fluid">
                        <h3>Estresse ocupacional</h3>
                        <p>Estresse ocupacional é uma doença crônica caracterizada por reações de desgaste físico e psicológico relacionadas ao trabalho. 
                            A patologia surge como um padrão de respostas intensas diante de agentes estressores, que aos poucos vão diminuindo a energia e 
                            a motivação do colaborador. A doença é caracterizada por três fases distintas: alarme, 
                            resistência e exaustão. Na primeira, o organismo ativa uma resposta aguda ao que percebe como ameaça, a exemplo de um prazo curto 
                            para entrega de um projeto importante. Contudo, a exposição crônica ao agente estressor impede essa restauração, abrindo espaço
                             para uma sensação permanente de desgaste e queda na imunidade.</p>
                            <a href="https://telemedicinamorsch.com.br/blog/estresse-ocupacional" target="_blank" class="btn btn-lg btn-roxo">
                                Ver mais
                            </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/insonia2.png" class="img-fluid">
                        <h3>Insônia</h3>
                        <p>Insônia é um sintoma que pode ser definido como dificuldade em iniciar e/ou manter o sono, presença de sono não 
                            reparador, ou seja, insuficiente para manter uma boa qualidade de alerta e bem-estar físico e mental durante o 
                            dia, com o comprometimento consequente do desempenho nas atividades diurnas. A insônia se associa habitualmente 
                            a um aumento do nível de alerta fisiológico e psicológico durante a noite, junto a um condicionamento negativo 
                            para dormir. A preocupação intensa e o mal-estar relacionados com a impossibilidade de dormir dão lugar a um 
                            círculo vicioso, pois quanto mais o paciente tenta dormir, mais frustrado e incomodado se sente, o que acaba 
                            dificultando o sono. Pode ser aguda ou crônica.</p>
                            <a href="https://drauziovarella.uol.com.br/doencas-e-sintomas/insonia/" target="_blank" class="btn btn-lg btn-roxo2">
                                Ver mais
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="servicos" class="caixa2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="./images/ideia.png" class="img-fluid">
                    <p>Lembre-se de uma escolha que precisou fazer recentemente e pergunte-se: você tomou essa decisão no <span class="yellow">piloto automático</span> ou de <span class="yellow">maneira consciente?</span>
                    Você se deixou levar pelos seus <span class="yellow">pensamentos,</span> <span class="yellow">emoções</span> e <span class="yellow">sensações</span> ou estava presente quando decidiu?</p>
                </div> 
                <div class="col-md-4">
                    <img src="./images/exercicio.png" class="img-fluid">
                    <p>Com a produção natural de <span class="yellow">serotonina</span> e <span class="yellow">endorfina</span> causadas pela prática de exercícios físicos, temos uma sensação 
                        de <span class="yellow">bem-estar</span> que ajuda a <span class="yellow">reduzir o estresse e a ansiedade.</span> Esse efeito também ajuda a memória e melhora nossa
                         capacidade de raciocínio.</p>
                </div>
                <div class="col-md-4">
                    <img src="./images/conversa.png" class="img-fluid">
                    <p>Fale com <span class="yellow">atenção</span> plena! Ao conversar com alguém, observe seu impulso de falar alguma coisa.
                        <span class="yellow">Como está sua ansiedade ao se expressar?</span> Respire e concentre-se na sua fala. Perceba o que acontece 
                        com sua mente, seu corpo e suas emoções.</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="./images/banho.png" class="img-fluid">
                    <p>Experimente <span class="yellow">tomar banho</span> com a luz apagada, coloque uma playlist que te agrade, <span class="yellow">relaxe profundamente. </span>
                        Use óleos naturais com essências para relaxamento, <span class="yellow">foque sua mente no seu banho,</span> no seu corpo e esqueça o 
                        mundo lá fora. Esse é o seu momento. <span class="yellow">A hora do seu autocuidado.</span></p>
                </div> 
                <div class="col-md-4">
                    <img src="./images/meditacao.png" class="img-fluid">
                    <p>A <span class="yellow">meditação</span> ajuda a pessoa a <span class="yellow">focar</span> no momento presente, ou seja, no aqui e no agora, ajudando a tirar da mente 
                        situações que provocam <span class="yellow">ansiedade,</span> além de proporcionar <span class="yellow">relaxamento e bem-estar.</span> A meditação pode ser uma grande 
                        aliada para a memória e a criatividade.</p>
                </div>
                <div class="col-md-4">
                    <img src="./images/alimentacao.png" class="img-fluid">
                    <p>As pessoas que se <span class="yellow">alimentam</span> de forma <span class="yellow">saudável e equilibrada</span> garantem uma melhor qualidade de vida, podendo <span class="yellow">prevenir</span>
                        doenças e fortalecer o sistema imunológico.
                        Existe uma relação direta entre <span class="yellow">nutrição, saúde e bem-estar físico e mental</span> do indivíduo.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="">
          <div class="row">
            <div class="col-md-3">
              <h4>Contatos</h4>
              <ul class="navbar-nav">
                <li><a href="">Telefone: (19) 9999-9999</a></li>
                <li><a href="">Endereço: Rua Fatec Araras, N° 833, José Ometto II, Araras/SP</a></li>
              </ul>
            </div>
    
            <div class="col-md-3">
              <h4>Sobre nós</h4>
              <ul class="navbar-nav">
                <li><a href="">Nossa história</a></li>
                <li><a href="">Atendimento ao paciente</a></li>
                <li><a href="">Consultas particulares</a></li>
              </ul>
            </div>
    
            <div class="col-md-3">
              <h4>Links úteis</h4>
              <ul class="navbar-nav">
                <li><a href="https://vidasaudavel.einstein.br/redes-sociais-e-saude-mental/" target="_blank">Impacto da Internet</a></li>
                <li><a href="https://www.youtube.com/watch?v=WJTSXf9bzQo" target="_blank">NeuroPsicologia</a></li>
                <li><a href=""></a></li>
              </ul>
            </div>
    
            <div class="col-md-3">
              <h4>Midias sociais</h4>
              <ul class="social-media">
                <a href="https://www.facebook.com/" target="_blank"> <i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
              </ul>
            </div>
          </div>
        </div>
          <hr>
          <div class="container">
            <div id="politicas">
              <div class="row">
                <p>Política de privacidade | Política de troca de produto | Termos de uso | Política de Cookies</p>
              </div>
            </div>
          </div>
      </footer>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    