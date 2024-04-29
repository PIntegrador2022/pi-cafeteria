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
            <a href="#home">Home</a>
            <a href="#sobre">Sobre</a>
            <a href="#menu">Menu</a>
            <a href="#produtos">Produtos</a>
            <a href="#depoimentos">Depoimentos</a>
            <a href="#contato">Contato</a>
            <a href="#blogs">Blogs</a>
            <a href="admin/admin.php" style="color: rgb(255, 240, 128);">ADMIN DASHBOARD</a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="search-form">
            <input type="search" id="search-box" placeholder="Digite para pesquisar...">
            <label for="search-box" class="fas fa-search"></label>
        </div>

        <div class="cart-items-container">
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-1.png" alt="">
                <div class="content">
                    <h3>item do carrinho 01</h3>
                    <div class="price">R$ 4.99</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-2.png" alt="">
                <div class="content">
                    <h3>item do carrinho 02</h3>
                    <div class="price">R$ 8.99</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-3.png" alt="">
                <div class="content">
                    <h3>item do carrinho 03</h3>
                    <div class="price">R$ 5.99</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cart-item-4.png" alt="">
                <div class="content">
                    <h3>item do carrinho 04</h3>
                    <div class="price">R$ 10.99</div>
                </div>
            </div>

            <div class="cart-item">
                <div class="content total">
                    <h3>Total do carrinho</h3>
                    <div class="price-total"> R$ 10.99 </div>
                </div>
            </div>

            <div class="cart-item">
                <div class="content">
                    <input class="nome-pedido" type="text" name="nome-pedido" placeholder="Seu nome" required>
                    <input class="telefone-pedido" type="text" name="telefone-pedido" id="telefone" placeholder="Seu telefone" required>
                </div>
            </div>
            <a href="#" class="btn">finalizar pedido</a>
        </div>

    </header>

    <!-- fim da sessão cabeçalho -->

    <!-- inicio da sessão home  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Marchiatto Café</h3>
            <p>Bem vindo ao marchiatto café! A cada xícara, uma ideia.</p>
            <a href="#" class="btn">Peça agora</a>
        </div>

    </section>

    <!-- fim da sessão home -->

    <!-- inicio da sessão sobre  -->

    <section class="sobre" id="sobre">

        <h1 class="heading"> <span>Sobre</span> nós </h1>

        <div class="row">

            <div class="image">
                <img src="images/about-img.jpeg" alt="">
            </div>

            <div class="content">
                <h3>O que torna nosso café especial?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora
                    ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil
                    voluptas culpa! Neque consectetur obcaecati sapiente?</p>
                <a href="#" class="btn">Saiba mais</a>
            </div>

        </div>

    </section>

    <!-- fim da sessão sobre -->

    <!-- inicio da sessão menu  -->

    <section class="menu" id="menu">

        <h1 class="heading"> Nosso <span>Menu</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/menu-1.png" alt="">
                <h3>Fresco e saboroso</h3>
                <div class="price">R$ 8.99 <span>14.99</span></div>
                <a href="#" class="btn">adicionar no carrinho</a>
            </div>

            <div class="box">
                <img src="images/menu-2.png" alt="">
                <h3>Fresco e saboroso</h3>
                <div class="price">R$ 10.99 <span>15.99</span></div>
                <a href="#" class="btn">adicionar no carrinho</a>
            </div>

            <div class="box">
                <img src="images/menu-3.png" alt="">
                <h3>Fresco e saboroso</h3>
                <div class="price">R$ 13.99 <span>19.99</span></div>
                <a href="#" class="btn">adicionar no carrinho</a>
            </div>

            <div class="box">
                <img src="images/menu-4.png" alt="">
                <h3>Fresco e saboroso</h3>
                <div class="price">R$ 15.99 <span>20.99</span></div>
                <a href="#" class="btn">adicionar no carrinho</a>
            </div>

            <div class="box">
                <img src="images/menu-5.png" alt="">
                <h3>Fresco e saboroso</h3>
                <div class="price">R$ 15.99 <span>20.99</span></div>
                <a href="#" class="btn">adicionar no carrinho</a>
            </div>

            <div class="box">
                <img src="images/menu-6.png" alt="">
                <h3>Fresco e saboroso</h3>
                <div class="price">R$ 15.99 <span>20.99</span></div>
                <a href="#" class="btn">adicionar no carrinho</a>
            </div>

        </div>

    </section>

    <!-- fim da sessão menu -->

    <section class="produtos" id="produtos">

        <h1 class="heading"> Nossos <span>produtos</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/product-1.png" alt="">
                </div>
                <div class="content">
                    <h3>Café</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">R$ 6.99 <span>R$ 14.99</span></div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/product-2.png" alt="">
                </div>
                <div class="content">
                    <h3>Café importado</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">R$ 15.99 <span>R$ 20.99</span></div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/product-3.png" alt="">
                </div>
                <div class="content">
                    <h3>Café tradicional</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">R$ 15.99 <span>R$ 20.99</span></div>
                </div>
            </div>

        </div>

    </section>

    <!-- inicio da sessão depoientos  -->

    <section class="depoimentos" id="depoimentos">

        <h1 class="heading"> depoimentos dos <span>clientes</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga sequi
                    nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex aliquam minus
                    vel? Nemo.</p>
                <img src="images/pic-1.png" class="user" alt="">
                <h3>Rafael</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga sequi
                    nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex aliquam minus
                    vel? Nemo.</p>
                <img src="images/pic-2.png" class="user" alt="">
                <h3>Lorena</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga sequi
                    nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex aliquam minus
                    vel? Nemo.</p>
                <img src="images/pic-3.png" class="user" alt="">
                <h3>Fabrício</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </section>

    <!-- fim da sessão depoimentos -->

    <!-- inicio da sessão contato  -->

    <section class="contato" id="contato">

        <h1 class="heading"> <span>contate-</span> nos </h1>

        <div class="row">

        <!-- adicionado a localização  -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2188.4022910630515!2d-46.770884880117244!3d-22.711908259793994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c92152bb74609d%3A0x65ed9e14c9c4bdd9!2sMARCHIATTO%20CAF%C3%89!5e0!3m2!1spt-BR!2sbr!4v1713478033849!5m2!1spt-BR!2sbr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="">
                <h3>Entrar em contato</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="nome">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="e-mail">
                </div>
                <div class="inputBox">
                    <span class="fas fa-phone"></span>
                    <input type="number" placeholder="numero do telefone">
                </div>
                <input type="submit" value="contate agora" class="btn">
            </form>

        </div>

    </section>

    <!-- fim da sessão contato -->

    <!-- inicio da sessão blogs  -->

    <section class="blogs" id="blogs">

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

    </section>

    <!-- fim da sessão blogs -->

    <!-- inicio da sessão do footer -->

    <section class="footer">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="links">
            <a href="#">home</a>
            <a href="#">sobre</a>
            <a href="#">menu</a>
            <a href="#">produto</a>
            <a href="#">depoimentos</a>
            <a href="#">contato</a>
            <a href="#">blogs</a>
        </div>

        <div class="credit">criado por <span>estudantes da univesp</span> | trabalho de projeto integrador</div>

    </section>

    <!-- fim da sessão footer -->

    <!-- links de arquivo js para personalização  -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/mascaras.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
    <script src="js/script.js"></script>
 

</body>

</html>