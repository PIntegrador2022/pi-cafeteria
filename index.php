<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <title>Marchiatto Café</title>

    <!-- link via cdn da fonte awesome (icone) depois deixarei fixo via offline -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- arquivo de estilização css  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- inicio da sessão cabeçalho  -->

    <header class="header">

        <a href="#" class="logo">
            <img src="images/logo.jpg" alt="">
        </a>

        <nav class="navbar">
            <a href="#home">Início</a>
            <a href="#sobre">Sobre</a>
            <a href="#menu">Menu</a>
            <a href="#mapa">Visite</a>
            <a href="#blogs">Blogs</a>
            <a href="admin/admin.php" style="font-weight: bold; color: rgb(255, 240, 128);">ADMIN DASHBOARD</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

    </header>

    <!-- fim da sessão cabeçalho -->

    <!-- inicio da sessão home  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Marchiatto Café</h3>
            <h2>A cada xícara, uma ideia.</h2>
            <p>Bem-vindo!</p>
            <a href="#sobre" class="btn">Saiba mais</a>
        </div>

    </section>

    <!-- fim da sessão home -->

    <!-- inicio da sessão sobre  -->

    <section class="sobre" id="sobre">

        <h1 class="heading"> <span>Sobre</span> nós </h1>

        <div class="row">

            <div class="image">
                <img src="images/foto-sobre.jpg" alt="">
            </div>

            <div class="content">
                <h3>Tradição e Cafeína!</h3>
                <p>O Marchiatto surgiu de uma tradição familiar de pai para filho. 
                    Mudando atualmente, apenas seu formato; um café. 
                    No mesmo prédio original da família, onde a história de imigrantes italianos, 
                    são transformadas em uma charmosa cidade do interior, 
                    Amparo; cidade histórica que liderou a produção cafeeira do país há anos atrás.
                </p>
                <p>Nosso nome é uma homenagem quase-que-direta a clássica bebida 
                    Caffè macchiato, que é um espresso finalizado com espuma de leite, 
                    dando aquele toque especial.</p>
                <p>E também, conta a história, de um menino chamado Caio Marcatto, 
                    que foi apelidado trabalhando na Starbucks de "Marchiatto", 
                    que depois de 10 anos, abriu sua cafeteria em sua cidade natal, no interior, 
                    fazendo uma mistura do que aprendeu na caminhada.</p>
                <p>E é essa história, repleta de café, criatividade e coisa boa, 
                que vamos conversar, contar e construir juntos a cada dia. 
                Em um palco movido a cafeína e inovação.</p>
                <p>Bateu aquela vontade?</p>
                <a href="#mapa" class="btn">Vem tomar um café!</a>
            </div>

        </div>

    </section>

    <!-- fim da sessão sobre -->

    <!-- inicio da sessão menu  -->

    <section class="menu" id="menu">

        <h1 class="heading"> Conheça o <span>Cardápio</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/foto-caramelo2.jpg" alt="">
                <h3>Caramelo Macchiato</h3>
                <div class="price">R$ 11.00</div>
            </div>

            <div class="box">
                <img src="images/foto-frapp.jpg" alt="">
                <h3>Frapp</h3>
                <div class="price">R$ 19.00</div>
            </div>

            <div class="box">
                <img src="images/foto-panini2.jpg" alt="">
                <h3>Panini</h3>
                <div class="price">R$ 11.00</div>
            </div>

            <div class="box">
                <img src="images/foto-brownie.jpg" alt="">
                <h3>Brownie</h3>
                <div class="price">R$ 11.00</div>
            </div>

            <div class="box">
                <img src="images/foto-waffle.jpg" alt="">
                <h3>Waffle</h3>
                <div class="price">R$ 09.00</div>
            </div>

            <div class="box">
                <img src="images/foto-toast.jpg" alt="">
                <h3>Toast</h3>
                <div class="price">R$ 09.00</div>
            </div>

        </div>

    </section>

    <!-- fim da sessão menu -->
    
    <h1 class="heading" style="font-size: 3rem;"> e muito <span>mais</span>!</h1>

    <!-- inicio da sessão do mapa  -->

    <section class="contato" id="mapa">

        <h1 class="heading"> <span>faça uma</span> visita</h1>

        <div class="row">

        <!-- adicionado a localização  -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2188.4022910630515!2d-46.770884880117244!3d-22.711908259793994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c92152bb74609d%3A0x65ed9e14c9c4bdd9!2sMARCHIATTO%20CAF%C3%89!5e0!3m2!1spt-BR!2sbr!4v1713478033849!5m2!1spt-BR!2sbr" width="1200" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>

    </section>

    <!-- fim da sessão do mapa -->

    <!-- 
        
        inicio da sessão blogs,
        o ideal seria incorporar o feed do Instagram do café,
        mas não tenho certeza de como fazer isso por enquanto.  -->
        

    <!-- <section class="blogs" id="blogs">

        <h1 class="heading"> Nossos <span>blogs</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/blog-1.jpeg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">Café Saboroso E Refrescante</a>
                    <span>Por Administrador / 21 De Maio De 2024</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dicta.</p>
                    <a href="#" class="btn">Saiba mais</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-2.jpeg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">Café Saboroso E Refrescante</a>
                    <span>Por Administrador / 21 De Maio De 2024</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dicta.</p>
                    <a href="#" class="btn">saiba mais</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/blog-3.jpeg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">Café Saboroso E Refrescante</a>
                    <span>Por Administrador / 21 De Maio De 2024</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dicta.</p>
                    <a href="#" class="btn">saiba mais</a>
                </div>
            </div>

        </div>

    </section> -->

    <!-- fim da sessão blogs -->

    <!-- inicio da sessão do footer -->

    <section class="footer">

        <div class="share">
            <a href="https://www.instagram.com/marchiatto_cafe/" target="_blank" class="fab fa-instagram"></a>
        </div>

        <div class="links">
            <a href="#">início</a>
            <a href="#sobre">sobre</a>
            <a href="#menu">menu</a>
            <a href="#mapa">visite</a>
            <a href="#blogs">blogs</a>
        </div>

        <div class="credit">desenvolvido por <span>alunos da Univesp</span> | como Projeto Integrador de Computação</div>

    </section>

    <!-- fim da sessão footer -->

    <!-- links de arquivo js para personalização  -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/mascaras.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
    <script src="js/script.js"></script>
 

</body>

</html>