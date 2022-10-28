<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap 4.1.3 link css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <title>Formulario</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Staatliches&display=swap" rel="stylesheet" />
    @vite(['resources/css/formulario.css', 'resources/js/formulario.js'])
</head>

<body>
    <!--PEN CONTENT     -->
    <div class="container">
        <!--content inner-->
        <div class="content__inner">
            <!--animations form-->
            <div class="content" hidden>
                <form class="pick-animation my-4">
                    <div class="form-row">
                        <div class="col-5 m-auto"><select class="pick-animation__select form-control">
                                <option value="scaleIn">ScaleIn</option>
                                <option value="scaleOut">ScaleOut</option>
                                <option value="slideHorz" selected="selected">SlideHorz</option>
                                <option value="slideVert">SlideVert</option>
                                <option value="fadeIn">FadeIn</option>
                            </select></div>
                    </div>
                </form>
            </div>
            <div class="container overflow-hidden">
                <!--content title-->
                <h2 class="content__title">Formulario</h2>
                <!--multisteps-form-->
                <div class="multisteps-form">
                    <!--progress bar-->
                    <div class="row">
                        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                            <div class="multisteps-form__progress"><button class="multisteps-form__progress-btn js-active" type="button" title="Empresa">Empresa</button><button class="multisteps-form__progress-btn" type="button" title="Administrativo">Administrativo</button><button class="multisteps-form__progress-btn" type="button" title="Tipo de Pago">Tipo de Pago</button><button class="multisteps-form__progress-btn" type="button" title="Confirmacion">Confirmacion </button></div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form class="multisteps-form__form">
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Informacion Empresa</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6"><input class="multisteps-form__input form-control" type="text" placeholder="Nombre" /></div>
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0"><input class="multisteps-form__input form-control" type="text" placeholder="Identificador" /></div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0"><input class="multisteps-form__input form-control" type="email" placeholder="Email" /></div>
                                            <div class="col-12 col-sm-6"><input class="multisteps-form__input form-control" type="password" placeholder="Password" /></div>
                                        </div>
                                        <div class="button-row d-flex mt-4"><button class="btn btn-primary ml-auto js-btn-next" type="button" title="Siguiente">Siguiente</button></div>
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Administrativo</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col"><input class="multisteps-form__input form-control" type="text" placeholder="Nombre Completo" /></div>
                                        </div>
                                        <div class="button-row d-flex mt-4"><button class="btn btn-primary js-btn-prev" type="button" title="Anterior">Anterior</button><button class="btn btn-primary ml-auto js-btn-next" type="button" title="Siguiente">Siguiente</button></div>
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Tarjeta de Credito o Debito</h3>
                                    <!-- <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Item Title</h5>
                                                        <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Item Title</h5>
                                                        <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12"><button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button><button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button></div>
                                        </div>
                                    </div> -->

                                    <!-- Credit Card -->
                                    <div class="credit-card-div">
                                        <div class="container-credit-card preload">
                                            <div class="creditcard">
                                                <div class="front">
                                                    <div id="ccsingle"></div>
                                                    <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                                        <g id="Front">
                                                            <g id="CardBackground">
                                                                <g id="Page-1_1_">
                                                                    <g id="amex_1_">
                                                                        <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                        17.9,0,40,0z" />
                                                                    </g>
                                                                </g>
                                                                <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                                                            </g>
                                                            <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">0123 4567 8910 1112</text>
                                                            <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">JOHN DOE</text>
                                                            <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                                                            <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                                                            <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                                                            <g>
                                                                <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/23</text>
                                                                <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                                                                <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                                                                <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		" />
                                                            </g>
                                                            <g id="cchip">
                                                                <g>
                                                                    <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                                        ,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                                                    </g>
                                                                    <g>
                                                                        <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                                                    </g>
                                                                    <g>
                                                                        <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                        8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                        22.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                        2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                        ,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                                                                    </g>
                                                                    <g>
                                                                        <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                                                    </g>
                                                                    <g>
                                                                        <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                                                    </g>
                                                                    <g>
                                                                        <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                                                    </g>
                                                                    <g>
                                                                        <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Back">
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="back">
                                                    <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                                        <g id="Front">
                                                            <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                                                        </g>
                                                        <g id="Back">
                                                            <g id="Page-1_2_">
                                                                <g id="amex_2_">
                                                                    <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                        ,0,40,0z" />
                                                                </g>
                                                            </g>
                                                            <rect y="61.6" class="st2" width="750" height="78" />
                                                            <g>
                                                                <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                                        .4,249.1,701.1,249.1z" />
                                                                <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                                                                <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                                                                <path class="st5" d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z" />
                                                            </g>
                                                            <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">985</text>
                                                            <g class="st8">
                                                                <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">security code</text>
                                                            </g>
                                                            <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                                                            <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                                                            <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">John Doe</text>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-container">
                                            <div class="field-container">
                                                <label for="name">Nombre</label>
                                                <input id="name" maxlength="20" type="text">
                                            </div>
                                            <div class="field-container">
                                                <label for="cardnumber">Numero Tarjeta</label><span id="generatecard">generate random</span>
                                                <input id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
                                                <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                </svg>
                                            </div>
                                            <div class="field-container">
                                                <label for="expirationdate">Expiracion (mm/yy)</label>
                                                <input id="expirationdate" type="text" pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                            <div class="field-container">
                                                <label for="securitycode">Codigo Seguridad</label>
                                                <input id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Credit Card -->
                                    <div class="row">
                                        <div class="button-row d-flex col-12"><button class="btn btn-primary js-btn-prev" type="button" title="Anterior">Anterior</button><button class="btn btn-primary ml-auto js-btn-next" type="button" title="Siguiente">Siguiente</button></div>
                                    </div>
                                </div>
                                <!--Confirmacion-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Terminos y condiciones</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4"><textarea class="multisteps-form__textarea form-control" placeholder="Additional Comments and Requirements"></textarea></div>
                                        <div class="button-row d-flex mt-4"><button class="btn btn-primary js-btn-prev" type="button" title="Anterior">Anterior</button><button class="btn btn-success ml-auto" type="button" title="Confirmar">Confirmar</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>
</body>

</html>