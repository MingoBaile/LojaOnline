<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Listagem categoria</title>
    <link rel="stylesheet" href="../app/View/Details/style.css">
    <script src="../components/Navigation/index.js" defer></script>
    <script src="../components/Rating/index.js" defer></script>
</head>
<body>
    <navigation-top >
        <a href="../Home" slot="brand">
            <img src="../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <input type="search" placeholder="Pesquise o seu kit ou peça" slot="search" class="w-100"/>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>
    <div class="sub-catgoria">
        <ul>
            <li>
                <a href="#kits" class="active">KITS</a>
            </li>
            <li>
                <a href="#kits">RODAS</a>
            </li>
            <li>
                <a href="#kits">Peças customizadas</a>
            </li>
            <li>
                <a href="#kits">Faróis</a>
            </li>
            <li>
                <a href="#kits">Turbo</a>
            </li>
            <li>
                <a href="#kits">Pinturas</a>
            </li>
        </ul>
    </div>
    <main>
        <div class="wrapper-container">
            <section class="flex row  gap-3 justify-between">
                <button class="px-3"><i data-feather="home"></i></button>
            </section>
            <section class="details">
                <div class="product-images">
                    <img src="../assets/img-products/car-opala-principal.jpg" alt="">
                    <div class="galeria">
                        <img src="../assets/img-products/car-opala-1.jpg" alt="">
                        <img src="../assets/img-products/car-opala-2.jpg" alt="">
                        <img src="../assets/img-products/car-opala-3.jpg" alt="">
                    </div>
                </div>
                <aside class="product-detail">
                    <div class="header">
                        <h5>Kit Opala SS - 6 cilindros </h5>
                        <button class="px-3"><i data-feather="heart"></i></button>
                    </div>
                    <div class="values">
                        <span class="flex row  align-center gap-3">
                            <i data-feather="dollar-sign"></i>
                            <span class="flex column gap-1 align-start values">
                                <small class="desc">25% de desconto</small>
                                <span class="flex align-center gap-2">
                                    <strong class="price">345,00</strong>
                                    <small class="price-desc">500,00</small>
                                </span>
                            </span>
                        </span>
                    </div>
                    <div class="avaliable">
                        <label>Avaliação do produto</label>
                        <span class="flex gap-2 align-center">
                            <star-rater data-rating="4"></star-rater> 4,7
                        </span>
                        
                    </div>
                    <div class="actions">
                        <button class="primary w-100 flex justify-between align-center">
                            Adicionar ao carrinho
                            <i data-feather="shopping-cart"></i>
                        </button>
                        <button class="secondary w-100 flex justify-between align-center">
                            Finalizar compra
                            <i data-feather="chevron-right"></i>
                        </button>
                    </div>
                    <div class="extra">
                        <i data-feather="truck"></i>
                        <strong>Centro 11 de agosto - Perj. 13 de agosto</strong>
                        <p>Entrega rápida</p>
                        <strong>Gratuitamente*</strong>
                    </div>
                </aside>
            </section>
            <section class="descrition">
                <div class="carac">
                    <div class="tab-horizontal">
                        <div class="tab-head">
                            <a class="active" data-id="detalhes">Detalhes</a>
                            <a data-id="caracteristicas">Caracteristicas</a>
                            <a data-id="feedbacks">Feedbacks</a>
                        </div>
                        <div class="tab-body">
                            <div class="tab-content active" id="detalhes">
                                <p>Descrição do produto
                                </p>
                                <p>Opala SS 1979 Original 2.5, lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado.
                                </p>
                            </div>
                            <div class="tab-content" id="caracteristicas">
                                <table class="table-left radius">
                                    <tr>
                                        <th>Fabricante</th>
                                        <td>CHEVROLET</td>
                                    </tr>
                                    <tr>
                                        <th>Label</th>
                                        <td>Descrition</td>
                                    </tr>
                                    <tr>
                                        <th>Versão</th>
                                        <td>3.8</td>
                                    </tr>
                                    <tr>
                                        <th>Outras informações</th>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto obcaecati saepe placeat qui sit quae iste praesentium magni neque, reiciendis nihil eaque corrupti blanditiis voluptate. Esse soluta tenetur repudiandae pariatur!</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-content" id="feedbacks">
                                <star-rater data-rating="4"></star-rater>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments">
                    <h5>Comentários(1)</h5>
                    <span class="flex column gap-2">
                        <span><h4>4,7/5</h4></span>
                        <star-rater data-rating="4"></star-rater>
                    </span>
                    <div class="nps-rating">
                        <li>
                            <strong>5</strong>
                            <progress class="progress" value="89" max="100"></progress>
                        </li>
                        <li>
                            <strong>4</strong>
                            <progress class="progress" value="100" max="100"></progress>
                        </li>
                        <li>
                            <strong>3</strong>
                            <progress class="progress" value="0" max="100"></progress>
                        </li>
                        <li>
                            <strong>2</strong>
                            <progress class="progress" value="0" max="100"></progress>
                        </li>
                        <li>
                            <strong>1</strong>
                            <progress class="progress" value="0" max="100"></progress>
                        </li>
                    </div>
                    <button class="flex row justify-between align-center">Ver comentários <i data-feather="message-square"></i></button>
                </div>
            </section>
            <h4 class="heading">Produtos relacionados</h4>
            <section class="list-products">
                <div class="card-product">
                    <div class="picture">
                        <span class="flex row justify-end">
                            <button class="px-3"><i data-feather="heart"></i></button>
                        </span>
                        <img src="../assets/img-products/car-opala-principal.jpg" alt="">
                        <div class="galeria hover-only">
                            <span>
                                <img src="../assets/img-products/car-opala-1.jpg" alt="">
                            </span>
                            <span>
                                <img src="../assets/img-products/car-opala-2.jpg" alt="">
                            </span>
                            <span>
                                <img src="../assets/img-products/car-opala-3.jpg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="body">
                        <a class="information" href="#product">
                            <h5>Kit Opala SS - 6 cilindros </h5>
                            <p>Opala SS 1979 Original 2.5...</p>
                        </a>
                        <div class="value hover-only">
                            <span class="flex row  align-center gap-3">
                                <i data-feather="dollar-sign"></i>
                                <span class="flex column gap-1 align-start values">
                                    <small>500,00</small>
                                    <strong class="price">345,00</strong>
                                </span>
                            </span>
                            <div class="actions-card">
                                <button class="px-3 list-is-visible"><i data-feather="heart"></i></button>
                                <button class="px-3"><i data-feather="shopping-cart"></i></button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-product">
                    <div class="picture">
                        <span class="flex row justify-end">
                            <button class="px-3"><i data-feather="heart"></i></button>
                        </span>
                        <img src="../assets/img-products/car-lancer-principal.jpg" alt="">
                        <div class="galeria hover-only"></div>
                    </div>
                    <div class="body">
                        <a class="information" href="#product">
                            <h5>Kit Fiat 147 - 4 cilindros</h5>
                            <p>Kit Retifica Fiat 147....</p>
                        </a>
                        <div class="value hover-only">
                            <span class="flex row  align-center gap-3">
                                <i data-feather="dollar-sign"></i>
                                <span class="flex column gap-1 align-start values">
                                    <small>2.100,00</small>
                                    <strong class="price">1.899,00</strong>
                                </span>
                            </span>
                            <div class="actions-card">
                                <button class="px-3 list-is-visible"><i data-feather="heart"></i></button>
                                <button class="px-3"><i data-feather="shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-product">
                    <div class="picture">
                        <span class="flex row justify-end">
                            <button class="px-3"><i data-feather="heart"></i></button>
                        </span>
                        <img src="../assets/img-products/car-fiat147-principal.jpg" alt="">
                        <div class="galeria hover-only"></div>
                    </div>
                    <div class="body">
                        <a class="information" href="#product">
                            <h5>Kit Mitsubishi Lancer Gt 2016</h5>
                            <p>Kit completo Mitsubishi Lancer Gt 2016...</p>
                        </a>
                        <div class="value hover-only">
                            <span class="flex row  align-center gap-3">
                                <i data-feather="dollar-sign"></i>
                                <span class="flex column gap-1 align-start values">
                                    <small>4.000,00</small>
                                    <strong class="price">2.999,99</strong>
                                </span>
                            </span>
                            <div class="actions-card">
                                <button class="px-3 list-is-visible"><i data-feather="heart"></i></button>
                                <button class="px-3"><i data-feather="shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="w-100 pb-4">
            <button class="w-100">Ver mais items</button>
        </footer>
    </main>
    <nav class="navigation-bottom">
        <span>
            <a href="../Home"><i class="icon-1" data-feather="home"></i></a>
        </span>
        <span>
            <a href="../Search"><i class="icon-1" data-feather="search"></i></a>
        </span>
        <span>
            <a href="../Favorites"><i class="icon-1" data-feather="heart"></i></a>
        </span>
        <span>
            <a href="../Cartshopping"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </span>
        <span>
            <a href="../Login"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="../app/View/Details/script.js" defer></script>
<script src="../scripts/index.js" defer></script>
</body>
</html>