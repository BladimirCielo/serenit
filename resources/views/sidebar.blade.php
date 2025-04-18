<!DOCTYPE html>
<html lang="es">
<head>

    <!-- Características de HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos CSS -->   
    <link href="{!! asset('css/sidebar.css?v=2') !!}" rel="stylesheet"/>

    <!-- Otros enlaces y estilos para las vistas individuales que mandan a llamar al menú de navegación -->
    @yield('estilos_adicionales')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Icono de la pestaña -->
    <link rel="icon" href="{!! asset ('archivos/favicon.ico') !!}" type="image/x-icon">

    <!-- Títulos individuales de cada vista para la pestaña -->
    <title>@yield('title', 'NAVBAR')</title>

</head>
<body>

    <!-- Botón para mostrar/ocultar el menú cuando el tamaño de la ventana se reduzca (responsive design) -->
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <!-- Menú de navegación-->
    <div class="barra-lateral ">
        <div>
            <!-- SECCIÓN: Header -->
            <div class="nombre-pagina">
                <img src="{!! asset('archivos/logo-sidebar.png') !!}" id="logo" width="50px" alt="logo"></img>
                <span>SerenIT</span>
            </div>
            <!-- SECCIÓN: Usuario -->
            <div class="usuario" id="img-user">
                <img src="{!! asset('archivos/usuario.png') !!}" alt="">
                <div class="info-usuario">
                    @if (Session::has('sesionname'))
                        <div class="nombre-usuario">
                            <span class="mensaje">Bienvenido</span>
                            <span class="nombre">{{ Session::get('sesionname')}}</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="linea"></div>
        </div>
        <!-- SECCIÓN: Lista de navegación-->
        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inicio" href="{{ route('inicio') }}">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M2360 5084 c-73 -34 -102 -62 -1158 -1117 -596 -595 -1098 -1105 -1117 -1133 -76 -113 -98 -285 -55 -415 65 -193 219 -307 440 -325 l79 -7 3 -816 c3 -801 4 -817 24 -871 73 -192 187 -307 363 -367 65 -22 75 -22 551 -23 467 0 486 1 518 20 18 11 41 34 52 52 19 32 20 52 20 668 0 433 4 648 11 675 17 60 64 121 117 152 l47 28 316 0 316 0 49 -30 c55 -34 107 -111 118 -172 3
                            -21 6 -318 6 -661 0 -675 -2 -649 55 -702 l27 -25 481 -3 c322 -2 499 1 534 8 138 29 298 151 361 275 70 140 66 83 70 981 l3 812 82 7 c198 17 333 105 413 270 34 68 34 71 34 205 0 135 0 136 -36 210 -34 73 -61 101 -1132 1172 -1071 1071 -1099 1098 -1172 1132 -74 36 -75 36 -210 36 -135 0 -136 0 -210 -36z m277 -274 c36 -14 2148 -2124 2168 -2166 35 -74 9 -168 -58 -212 -39 -26 -48 -27 -207 -32 -180 -5 -201 -11 -237 -67 -17 -25 -18 -89 -23 -928 -5 -823 -6
                            -903 -22 -936 -27 -57 -66 -98 -122 -127 l-51 -27 -357 -3 -357 -4 -3 579 c-3 566 -4 579 -26 643 -59 173 -174 295 -342 359 -64 25 -70 25 -402 29 -283 3 -347 1 -400 -12 -207 -53 -370 -220 -414 -425 -11 -52 -14 -183 -14 -619 l0 -554 -357 4 -358 3 -55 30 c-67 37 -115 98 -129 165 -7 35 -11 329 -11 918 0 842 -1 868 -20 899 -37 61 -57 67 -240 73 -159 5 -168 6 -207 32 -67 44 -93 138 -58 212 19 39 2131 2152 2165 2165 34 13 102 13 137 1z"/> </g>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id="animo" href="{{ route('mood') }}">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M2489 4849 c-439 -46 -817 -352 -958 -775 -215 -644 159 -1320 822 -1485 118 -29 333 -36 456 -15 232 41 430 139 595 296 555 527 462 1420 -189 1821 -137 84 -306 141 -476 159 -106 11 -141 11 -250 -1z m301 -160 c219 -34 442 -165 597 -349 82 -98 165 -263 199 -395 32 -125 36 -314 10 -437 -87 -404 -407 -712 -815 -783 -434 -76 -878 161 -1067 571 -61 132 -86 248 -87 404 -1 160 17 252 72 386 96 229 263 406 486 515 199 96 380 123 605 88z"/> <path d="M2037 4019 c-63 -47 -73 -123 -29 -210 21 -43 45 -68 116 -122 49 -37 96 -67 103 -65 8 2 52 32 98 68 101 78 135 131 135 210 0 90 -48 140 -133 140 -34 0 -53 -6 -73 -24 l-28 -23 -34 23 c-45 31 -115 32 -155 3z"/> <path d="M2839 4026 c-42 -24 -62 -63 -61 -120 0 -28 5 -63 11 -78 15 -40 73 -100 152 -159 82 -60 75 -61 189 28 82 64 115 113 125 184 17 125 -105 205 -207 135 l-36 -24 -20 21 c-27 26 -116 34 -153 13z"/> <path d="M2305 3403 c24 -166 164 -282 325 -270 82 5 146 33 199 86 52 52 81 111 88 177 l6 54 -75 0 -75 0 -6 -36 c-13 -81 -103 -144 -184 -129 -49 9 -108 68 -122 123 l-12 42 -76 0 -75 0 7 -47z"/>
                            <path d="M696 4006 c-41 -64 -78 -101 -129 -127 -72 -37 -71 -91 1 -128 50 -26 87 -63 128 -127 29 -45 39 -54 64 -54 21 0 34 8 46 28 51 82 73 107 130 143 93 60 93 88 0 148 -57 36 -79 61 -130 144 -12 19 -25 27 -46 27 -25 0 -35 -9 -64 -54z"/> <path d="M4432 3967 c-37 -58 -62 -80 -145 -131 -23 -14 -28 -23 -25 -49 2 -25 14 -38 63 -71 32 -23 74 -61 92 -86 67 -93 68 -94 95 -87 16 4 36 22 49 44 33 56 77 101 137 139 73 48 70 71 -18 134 -41 29 -80 68 -106 106 -32 47 -46 60 -70 62 -28 3 -35 -3 -72 -61z"/> <path d="M945 2535 c-443 -83 -798 -411 -912 -842 -31 -120 -42 -336 -23 -465 87 -598 645 -1030 1249 -968 590 61 1032 547 1033 1135 0 66 -5 152 -12 190 -70 437 -391 800 -815 921 -153 44 -373 56 -520 29z m445 -168 c362 -94 623 -360 727 -737 27 -99 24 -367 -5 -472 -47 -171 -139 -331 -258 -452 -172 -174 -378 -273 -615 -294 -231 -21 -452 35 -643 162 -371 248 -532 704 -399 1131 104 336 396 597 753 674 130 28 305 24 440 -12z"/>
                            <path d="M674 1743 c-8 -10 -29 -37 -45 -61 -16 -23 -52 -56 -79 -73 -41 -25 -50 -36 -50 -59 0 -22 10 -34 53 -61 30 -20 66 -55 85 -84 19 -27 40 -54 48 -58 24 -14 53 3 74 42 21 41 73 92 120 116 42 22 42 68 0 90 -47 24 -99 75 -120 115 -26 52 -58 63 -86 33z"/> <path d="M1538 1748 c-8 -7 -29 -34 -47 -60 -18 -27 -52 -59 -77 -74 -80 -47 -80 -81 1 -128 28 -17 60 -49 85 -86 26 -39 48 -60 60 -60 12 0 35 21 58 53 45 59 73 86 120 113 40 23 42 56 6 81 -59 42 -88 69 -125 120 -41 55 -54 62 -81 41z"/> <path d="M1125 1305 c-5 -2 -22 -6 -37 -9 -34 -8 -84 -50 -113 -96 -85 -134 -67 -356 36 -459 151 -151 359 -6 359 250 0 126 -60 253 -139 293 -28 14 -90 27 -106 21z"/> <path d="M3780 2535 c-443 -83 -786 -389 -909 -810 -66 -229 -55 -511 29 -732 237 -620 959 -913 1559 -632 349 163 597 494 651 867 19 129 8 345 -23 465 -29 109 -102 270 -164 360 -175 254 -448 428 -758 483 -96 17 -295 17 -385 -1z m383 -156 c491 -100 828 -528 805 -1022 -7 -138 -35 -251 -94 -376 -223 -473 -755 -690 -1252 -510 -289 105 -527 371 -614 687 -29 105 -32 373 -5 472 52 190 128 328 256 463 228 242 579 353 904 286z"/> <path d="M3472 1679 c-52 -26 -89 -72 -108 -135 -8 -26 -14 -51 -14 -56 0 -4 36 -8 79 -8 76 0 79 1 85 25 14 55 99 58 119 5 11 -30 12 -30 90 -30 l78 0 -7 38 c-10 56 -50 119 -96 150 -58 38 -163 43 -226 11z"/> <path d="M4265 1681 c-51 -23 -101 -79 -114 -128 -20 -72 -19 -73 62 -73 70 1 73 2 92 33 26 41 67 48 101 16 13 -12 24 -28 24 -36 0 -10 19 -13 75 -13 l75 0 0 28 c-1 38 -32 102 -66 134 -62 58 -170 75 -249 39z"/> <path d="M3553 1148 c-35 -17 -49 -62 -34 -117 43 -164 173 -294 342 -342 57 -16 191 -16 248 0 138 39 247 129 307 254 20 42 38 94 41 116 5 35 2 44 -25 71 l-30 30 -414 -1 c-267 0 -421 -4 -435 -11z"/> </g>
                        </svg>
                        <span>Estado de ánimo</span>
                    </a>
                </li>
                <li>
                    <a id="analisis" href="#">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M22 5097 l-22 -23 0 -2516 0 -2517 26 -20 27 -21 1869 0 1869 0 24 25 25 24 0 236 0 235 615 0 616 0 24 25 c26 26 33 72 15 105 -14 26 -63 40 -136 40 l-64 0 0 1109 c0 1077 -1 1109 -19 1132 -19 24 -19 24 -285 27 l-267 3 -29 -30 -30 -29 0 -1106 0 -1106 -150 0 -150 0 0 883 0 884 -23 21 c-23 21 -30 22 -289 22 -247 0 -267 -1 -289 -19 l-24 -19 -3 -886 -2 -886 -150 0 -150 0 0 331 c0 196 -4 338 -10 349 -5 10 -24 23 -41 29 -42 14 -485 15 -526 1 -17 -6 -35 -22 -42 -36 -7 -17 -11 -128 -11 -349 l0 -325 -130 0 -130 0 0 504 c0 471 1 504 18 511 9 4 86 34 171 66 l154 60 31 -30 c51 -49 121 -75 201 -74 119 1 212 58 262 161 23 48 28 69 27 132 -1 45 -8 90 -18 113 -9 21 -13 44 -9 51 4 7 129 153 278 325 199 230 273 310 285 305 8 -4 48 -9 88 -12 171 -10 299 102 310 273 l4 72 208 107 208 106 51 -34 c147 -100 352 -48 433 109 30 57 36 167 13 236 -24 70 -101 149 -169 172 -200 68 -400 -64 -401 -264 l0 -66 -208 -108 c-192 -99 -211 -106 -233 -95 l-24 13 -1 356 c0 196 -4 378 -8 405 -8 48 -14 55 -503 542 l-494 494 -1395 0 -1396 0 -21 -23z m2688 -596 c0 -437 1 -460 19 -482 l19 -24 461 -3 461 -3 0 -304 0 -305 -37 0 c-84 0 -190 -77 -234 -169 -29 -60 -32 -165 -5 -237 l19 -51 -279 -321 c-253 -291 -280 -319 -299 -309 -36 19 -165 14 -216 -10 -97 -44 -161 -131 -176 -242 l-8 -55 -119 -48 c-65 -26 -127 -50 -137 -53 -18 -6 -19 17 -19 844 0 602 -3 857 -11 874 -22 49 -83 60 -126 23 l-28 -24 -3 -1499 c-1 -824 0 -1508 3 -1521 3 -12 14 -31 25 -42 20 -20 37 -20 835 -20 l815 0 0 -180 0 -180 -1755 0 -1755 0 0 2400 0 2400 1275 0 1275 0 0 -459z m505 -1 l340 -340 -343 0 -342 0 0 340 c0 187 1 340 3 340 1 0 155 -153 342 -340z m1462 -832 c31 -29 53 -70 53 -100 0 -61 -69 -128 -133 -128 -97 0 -158 113 -107 198 39 63 135 79 187 30z m-946 -471 c19 -12 42 -40 53 -61 16 -32 17 -44 7 -76 -21 -71 -90 -113 -158 -96 -14 4 -41 22 -60 41 -102 102 38 272 158 192z m1019 -1457 l0 -1050 -150 0 -150 0 0 1050 0 1050 150 0 150 0 0 -1050z m-930 -225 l0 -825 -150 0 -150 0 0 825 0 825 150 0 150 0 0 -825z m-1020 609 c92 -55 76 -201 -25 -234 -48 -16 -90 -4 -131 36 -57 58 -46 154 25 197 34 21 95 21 131 1z m90 -1164 l0 -280 -150 0 -150 0 0 280 0 280 150 0 150 0 0 -280z"/>
                            <path d="M552 3643 c-22 -9 -44 -63 -37 -94 10 -45 39 -59 125 -59 67 0 79 3 98 23 32 34 30 89 -4 116 -22 17 -40 21 -98 20 -39 0 -77 -3 -84 -6z"/> <path d="M965 3625 c-33 -32 -34 -83 -2 -113 23 -22 29 -22 339 -22 174 0 324 3 333 6 8 4 23 20 31 36 12 24 13 36 4 64 -6 19 -20 39 -30 44 -11 6 -145 10 -335 10 l-316 0 -24 -25z"/> <path d="M540 3090 c-28 -28 -36 -69 -19 -99 23 -41 56 -53 133 -48 61 4 73 8 93 31 25 30 29 53 12 89 -16 35 -49 47 -129 47 -56 0 -74 -4 -90 -20z"/> <path d="M965 3085 c-31 -30 -33 -83 -6 -116 l19 -24 327 0 327 0 19 24 c27 33 25 86 -6 116 l-24 25 -316 0 -316 0 -24 -25z"/> <path d="M560 2557 c-54 -27 -63 -94 -20 -137 19 -19 35 -20 475 -20 l456 0 24 25 c41 40 33 105 -16 130 -38 20 -880 22 -919 2z"/> <path d="M535 1995 c-16 -15 -25 -36 -25 -55 0 -19 9 -40 25 -55 l24 -25 534 0 c510 0 536 1 558 19 33 27 33 95 0 122 -22 18 -48 19 -558 19 l-534 0 -24 -25z"/> <path d="M535 1455 c-31 -30 -33 -83 -6 -116 l19 -24 386 0 c385 0 385 0 408 22 33 33 30 89 -6 119 l-27 24 -375 0 -375 0 -24 -25z"/> </g>
                        </svg>
                        <span>Análisis</span>
                    </a>
                </li>
                <li>
                    <a id="recursos" href="#">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M795 4681 c-206 -60 -366 -224 -419 -428 -14 -54 -16 -200 -16 -1233 0 -1301 -4 -1223 67 -1364 48 -96 153 -201 249 -249 143 -72 6 -67 1884 -67 1881 0 1744 -5 1885 68 96 49 201 155 248 248 71 141 67 63 67 1364 0 1301 4 1223 -67 1364 -48 96 -153 201 -249 249 -143 72 -5 67 -1890 66 -1588 0 -1703 -2 -1759 -18z m3490 -250 c82 -33 173 -124 206 -206 l24 -60 0 -1145 0 -1145
                            -24 -60 c-33 -82 -124 -173 -206 -206 l-60 -24 -1665 0 -1665 0 -60 24 c-82 33 -173 124 -206 206 l-24 60 0 1145 0 1145 23 57 c47 116 164 210 284 228 29 4 787 7 1683 6 l1630 -1 60 -24z"/> <path d="M2104 3866 c-58 -27 -115 -81 -139 -132 -32 -68 -36 -155 -33 -765 3 -666 0 -634 67 -718 66 -83 211 -124 313 -88 23 8 277 149 563 314 558 322 598 350 628 438 38 110 13 230 -62 304 -32 30 -209 138 -566 344 -286 164 -537 306 -559 313 -61 22 -153 18 -212 -10z m646 -524 c460 -266 515 -300 515 -322 0 -22 -55 -57 -515 -322 -283 -164 -523 -298 -533 -298 -10 0 -22 11 -27 26 -14 36 -13 1169 0 1195 6 10 18 19 28 19 9 0 249 -134 532 -298z"/> <path d="M1570 1211 c-109 -35 -199 -112 -252 -213 -32 -61 -33 -67 -33 -178
                            0 -111 1 -117 33 -178 42 -81 103 -142 184 -184 61 -32 67 -33 178 -33 111 0 117 1 178 33 81 42 142 103 184 184 32 61 33 67 33 178 0 111 -1 117 -33 178 -42 81 -104 142 -184 183 -57 30 -73 33 -163 36 -55 1 -111 -1 -125 -6z m188 -261 c130 -79 74 -280 -78 -280 -85 0 -150 65 -150 150 0 85 65 150 150 150 27 0 58 -8 78 -20z"/> <path d="M394 906 c-30 -30 -34 -40 -34 -86 0 -46 4 -56 34 -86 l34 -34 292 0 292 0 34 34 c30 30 34 40 34 86 0 46 -4 56 -34 86 l-34 34 -292 0 -292 0 -34 -34z"/> <path d="M2314 906 c-30 -30 -34 -40 -34 -86 0 -46 4 -56 34 -86 l34 -34 1172 0 1172 0 34 34 c30 30 34 40 34 86 0 46 -4 56 -34 86 l-34 34 -1172 0 -1172 0 -34 -34z"/> </g>
                        </svg>
                        <span>Recursos</span>
                    </a>
                </li>
                <li>
                    <a id="organizador" href="{{ route('organizador') }}">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M732 5094 c-87 -43 -131 -118 -139 -235 l-6 -77 -136 -4 c-135 -3 -138 -4 -213 -41 -89 -44 -161 -116 -205 -205 l-28 -57 0 -1741 0 -1740 37 -75 c46 -93 112 -158 206 -202 l67 -32 391 -3 392 -3 4 -207 c4 -200 5 -209 32 -267 33 -72 93 -137 161 -173 l50 -27 1215 0 1215 0 50 27 c70 37 123 92 158 168 31 65 31 65 35 272 l4 207 392 3 392 3 75 37 c93 46 158 112 202 206 l32 67 3 1720 c2 1565 1 1724 -14 1770 -36 112 -120 205 -232 258 -63 30 -75 32 -203 35 l-136 4 -6 78 c-11 165 -107 260 -262 260 -78 0 -119 -15 -173 -65 -61 -54 -82 -106 -82 -198 l0 -77 -170 0 -170 0 0 77 c0 92 -21 144 -82 198 -54 50 -95 65 -173 65 -156 0 -251 -95 -262 -261 l-6 -79 -163 0 -164 0 0 63 c0 81 -14 127 -53 179 -98 131 -316 131 -414 0 -39 -52 -53 -98 -53 -179 l0 -63 -164 0 -163 0 -6 79 c-11 167 -106 261 -264 261 -81 0 -136 -24 -188 -82 -51 -56 -65 -95 -65 -183 l0 -75 -170 0 -170 0 0 77 c0 92 -21 144 -82 198 -55 50 -95 65 -176 65 -53 0 -79 -6 -120 -26z m175 -176 c23 -21 23 -25 23 -220 0 -110 -4 -207 -10 -217 -16 -31 -64 -45 -96 -29 -48 23 -54 47 -54 241 0 220 8 244 84 246 18 1 39 -8 53 -21z m838 16 c37 -15 45 -56 45 -241 0 -194 -6 -218 -54 -241 -32 -16 -80 -2 -96 29 -6 10 -10 107 -10 215 0 189 1 199 22 221 21 23 59 30 93 17z m870 -19 c25 -24 25 -25 25 -220 l0 -197 -29 -29 c-16 -16 -39 -29 -51 -29 -12 0 -35 13 -51 29 l-29 29 0 197 c0 195 0 196 25 220 15 16 36 25 55 25 19 0 40 -9 55 -25z m852 3 c23 -21 23 -25 23 -220 0 -110 -4 -207 -10 -217 -16 -31 -64 -45 -96 -29 -48 23 -54 47 -54 241 0 220 8 244 84 246 18 1 39 -8 53 -21z m838 16 c37 -15 45 -56 45 -241 0 -194 -6 -218 -54 241 -32 -16 -80 -2 -96 29 -6 10 -10 107 -10 215 0 189 1 199 22 221 21 23 59 30 93 17z m-3715 -387 c0 -177 131 -303 295 -282 75 9 151 57 190 119 26 43 30 61 34 133 l3 83 168 0 168 0 3 -83 c4 -72 8 -90 34 -133 39 -62 115 -110 190 -119 164 -21 295 105 295 282 l0 53 165 0 165 0 0 -67 c0 -123 72 -225 181 -257 66 -20 92 -20 158 0 109 32 181 134 181 257 l0 67 165 0 165 0 0 -53 c0 -177 131 -303 295 -282 75 9 151 57 190 119 26 43 30 61 34 133 l3 83 168 0 168 0 3 -83 c4 -72 8 -90 34 -133 39 -62 115 -110 190 -119 164 -21 295 105 295 282 l0 53 101 0 c124 0 167 -12 224 -62 75 -66 85 -100 85 -281 l0 -157 -2380 0 -2380 0 0 157 c0 182 10 215 85 281 58 51 89 60 218 61 l107 1 0 -53z m4350 -2053 c0 -1054 -3 -1437 -12 -1465 -16 -55 -73 -118 -132 -145 -51 -24 -54 -24 -413 -24 l-363 0 0 1058 c0 678 -4 1080 -10 1121 -14 85 -48 149 -110 204 -86 77 -127 87 -364 87 l-203 0 -7 42 c-9 57 -67 115 -124 124 l-42 7 0 65 c0 85 -30 141 -93 171 -42 20 -57 21 -507 21 -450 0 -465 -1 -507 -21 -63 -30 -93 -86 -93 -171 l0 -65 -42 -7 c-57 -9 -115 -67 -124 -124 l-7
                            -42 -203 0 c-237 0 -278 -10 -364 -87 -62 -55 -96 -119 -110 -204 -6 -41 -10 -443 -10 -1121 l0 -1058 -362 0 c-360 0 -363 0 -414 24 -59 27 -116 90 -132 145 -9 28 -12 411 -12 1465 l0 1426 2380 0 2380 0 0 -1426z m-1960 997 c0 -49 4 -101 10 -115 12 -33 59 -56 115 -56 l45 0 0 -80 0 -80 -590 0 -590 0 0 80 0 80 45 0 c56 0 103 23 115 56 6 14 10 66 10 115 l0 89 420 0 420 0 0 -89z m-1530 -1690 l0 -1348 23 -34 c12 -18 38 -44 56 -56 l34 -23 997 0 997 0 34 23 c18 12 44 38 56 56 l23 34 0 1348 0 1349 24 0 c28 0 82 -35 109 -71 10 -15 23 -46 28 -70 11 -60 11 -2644 -1 -2693 -11 -48 -36 -84 -80 -113 l-33 -23 -1157 0 -1157 0 -33 23 c-44 29 -69 65 -80 113 -12 49 -12 2633 -1 2693 5 24 18 55 28 70 27 36 81 71 109 71 l24 0 0 -1349z m340 1328 c0 -35 42 -98 80 -122 l35 -22 656 0 655 0 37 25 c39 27 77 85 77 119 0 20 5 21 80 21 l80 0 0 -1315 0 -1315 -930 0 -930 0 0 1315 0 1315 80 0 c75 0 80 -1 80 -21z"/> <path d="M1855 2733 c-62 -15 -86 -94 -44 -147 l20 -26 729 0 729 0 20 26 c30 38 28 94 -5 125 l-26 24 -701 1 c-386 1 -711 0 -722 -3z"/> <path d="M1815 2365 c-35 -34 -34 -93 1 -126 l26 -24 718 0 718 0 26 24 c35 33 36 92 1 126 l-24 25 -721 0 -721 0 -24 -25z"/> <path d="M1815 2025 c-38 -37 -35 -95 7 -130 31 -26 34 -27 149 -23 98 2 120 6 138 22 40 37 36 109 -8 143 -11 8 -58 12 -139 13 -117 0 -124 -1 -147 -25z"/> <path d="M2325 2025 c-33 -32 -33 -84 -1 -122 l24 -28 460 -3 460 -3 31 27 c41 34 44 92 6 129 l-24 25 -466 0 -466 0 -24 -25z"/> <path d="M1815 1685 c-28 -27 -34 -88 -12 -116 29 -38 45 -39 507 -39 l452 0 29 29 c38 38 40 91 4 126 l-24 25 -466 0 -466 0 -24 -25z"/> <path d="M3008 1680 c-26 -27 -30 -36 -25 -68 4 -22 17 -46 32 -59 24 -21 36 -23 136 -23 144 0 178 18 179 93 0 27 -7 45 -25 62 -23 24 -30 25 -145 25 l-122 0 -30 -30z"/> <path d="M1815 1345 c-19 -18 -25 -35 -25 -65 0 -30 6 -47 25 -65 23 -24 30 -25 145 -25 121 0 122 0 151 29 20 20 29 39 29 61 0 22 -9 41 -29 61 -29 29 -30 29 -151 29 -115 0 -122 -1 -145 -25z"/> <path d="M2344 1358 c-59 -28 -56 -132 5 -158 18 -7 169 -10 485 -8 l458 3 19 24 c28 34 25 96 -6 126 l-24 25 -458 -1 c-294 0 -466 -4 -479 -11z"/> <path d="M1835 1018 c-52 -30 -62 -102 -20 -143 l24 -25 466 0 466 0 24 26 c35 38 34 87 -4 125 l-29 29 -454 0 c-322 -1 -459 -4 -473 -12z"/> </g>
                        </svg>
                        <span>Organización del tiempo</span>
                    </a>
                </li>

                <li>
                    <a id="calendario" href="{{ route('calendar') }}">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M840 4920 l0 -200 -166 0 c-189 0 -246 -11 -358 -67 -96 -48 -201 -153 -249 -249 -72 -143 -67 12 -67 -2044 0 -2056 -5 -1901 67 -2044 48 -96 153 -201 249 -249 144 -72 -34 -67 2244 -67 2278 0 2100 -5 2244 67 96 48 201 153 249 249 72 143 67 -12 67 2044 0 2056 5 1901 -67 2044 -48 96 -153 201 -249 249 -112 56 -169 67 -358 67 l-166 0 0 200 0 200 -200 0 -200 0 0 -200 0 -200 -1320 0 -1320 0 0 200 0 200 -200 0 -200 0 0 -200z m0 -800 l0 -200 200 0 200 0 0 200 0 200 1320 0 1320 0 0 -200 0 -200 200 0 200 0 0 201 0 202 143 -5 c134 -4 147 -6 190 -31 30 -18 56 -44 74 -75 l28 -47 3 -262 4 -263 -2162 0 -2162 0 4 263 3 262 27 47 c30 51 82 88 137 99 20 4 89 7 154 8 l117 1 0 -200z m3878 -2222 l-3 -1343 -28 -47 c-18 -31 -44 -57 -75 -75 l-47 -28 -2005 0 -2005 0 -47 28 c-31 18 -57 44 -75 75 l-28 47 -3 1343 -2 1342 2160 0 2160 0 -2 -1342z"/>
                            <path d="M760 2620 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M1560 2620 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M2360 2620 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M3160 2620 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M3960 2620 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M760 1820 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M1560 1820 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M2360 1820 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M3160 1820 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M3960 1820 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M760 1020 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M1560 1020 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M2360 1020 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> <path d="M3160 1020 l0 -200 200 0 200 0 0 200 0 200 -200 0 -200 0 0 -200z"/> </g>
                        </svg>
                        <span>Calendario</span>
                    </a>
                </li>

                <li>
                    <a id="terapia" href="#">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M2820 4818 c-77 -30 -169 -123 -198 -201 -20 -51 -22 -78 -22 -240 l0 -183 -72 -52 c-76 -54 -183 -152 -256 -234 l-42 -48 -35 39 c-20 22 -44 50 -55 64 -27 35 -173 156 -249 207 -89 59 -251 135 -346 160 -103 28 -314 38 -423 20 -412 -66 -695 -335 -809 -768 -37 -142 -44 -397 -15 -567 78 -453 281 -824 686 -1253 62 -65 67 -72 40 -65 -16 4 -69 8 -119 8 -76 0 -99 -4 -146 -26 -191 -90 -270 -312 -180 -505 52 -112 72 -125 603 -407 267 -142 511 -267 543 -278 32 -11 93 -25 137 -32 72 -10 114 -7 476 32 642 71 974 67 1455 -16 l97 -17 25 -42 c29 -50 75 -90 130 -115 36 -17 70 -19 315 -19 246 0 279 2 316 19 59 27 109 75 138 133 l26 52 0 636 0 636 -26 52 c-29 58 -79 106 -138 133 -37 17 -70 19 -316 19 -317 0 -329 -3 -412 -91 l-47 -50 -38 24 c-21 13 -77 45 -125 71 l-88 47 53 67 c113 143 137 184 137 236 0 90 -72 143 -159 118 -32 -10 -52 -31 -134 -139 -53 -71 -107 -140 -120 -154 l-24 -27 -113 34 c-241 73 -483 108 -715 102 -124 -3 -146 -6 -190 -28 -62 -30 -125 -94 -155 -157 -31 -65 -39 -200 -16 -269 36 -110 139 -200 257 -226 l58 -13 -277 -79 c-152 -44 -284 -81 -292 -83 -19 -5 -284 168 -430 280 -542 416 -868 875 -977 1377 -14 65 -18 127 -18 265 0 157 3 191 23 265 100 366 368 580 726 580 113 0 199 -17 296 -57 193 -79 364 -226 515 -442 55 -78 86 -101 137 -101 41 0 88 33 120 83 58 91 219 277 240 277 4 0 8 -223 8 -495 0 -482 1 -496 22 -552 29 -80 121 -172 201 -201 58 -22 61 -22 897 -22 836 0 839 0 897 22 80 29 172 121 201 201 22 58 22 61 22 897 0 836 0 839 -22 897 -29 80 -121 172 -201 201 -58 22 -61 22 -900 21 -832 0 -843 0 -897 -21z m1713 -241 c15 -9 35 -29 44 -44 17 -25 18 -79 18 -813 0 -734 -1 -788 -18 -813 -9 -15 -29 -35 -44 -44 -25 -17 -79 -18 -813 -18 -734 0 -788 1 -813 18 -66 43 -62 -6 -65 822 -2 412 0 769 3 792 7 52 45 99 88 112 19 6 352 9 802 8 718 -2 773 -3 798 -20z m-1783 -2632 c165 -11 369 -55 561 -120 129 -45 378 -167 484 -238 l80 -53 3 -410 2 -411 -111 19 c-211 33 -384 49 -629 55 -279 6 -390 -1 -875 -54 -333
                            -36 -342 -37 -407 -21 -48 12 -194 85 -539 268 -261 139 -482 259 -491 267 -74 66 -19 213 80 213 24 0 195 -65 504 -190 336 -136 480 -190 509 -190 21 0 295 73 607 162 524 150 569 164 600 194 27 28 32 39 32 82 0 51 -22 91 -59 112 -10 5 -151 39 -312 75 -261 57 -297 68 -316 90 -25 28 -30 82 -12 116 17 33 67 49 139 44 36 -3 103 -7 150 -10z m1830 -245 c20 -20 20 -33 20 -580 0 -547 0 -560 -20 -580 -19 -19 -33 -20 -220 -20 -187 0 -201 1 -220 20 -20 20 -20 33 -20 580 0 547 0 560 20 580 19 19 33 20 220 20 187 0 201 -1 220 -20z"/> <path d="M3634 4446 l-34 -34 0 -391 c0 -328 -2 -391 -14 -391 -24 0 -123 73 -156 114 -16 22 -38 64 -46 95 -15 50 -15 68 0 220 24 246 23 266 -18 307 l-34 34 -132 0 -132 0 -34 -34 c-30 -30 -34 -40 -34 -86 0 -46 4 -56 34 -86 27 -27 42 -34 71 -34 l38 0 -7 -52 c-27 -223 -15 -324 50 -449 67 -127 245 -262 374 -284 l40 -7 0 -170 0 -170 34 -34 c30 -30 40 -34 86 -34 46 0 56 4 86 34 l34 34 0 170 0 170 40 7 c129 22 307 157 374 284 65 125 77 226 50 449 l-7 52 38 0 c29 0 44 7 71 34 30 30 34 40 34 86 0 46 -4 56 -34 86 l-34 34 -132 0 -132 0 -34 -34 c-31 -31 -34 -39 -34 -92 0 -32 7 -130 16 -216 19 -180 13 -220 -38 -300 -29 -46 -134 -128 -164 -128 -12 0 -14 64 -14 391 l0 391 -34 34 c-30 30 -40 34 -86 34 -46 0 -56 -4 -86 -34z"/> <path d="M1234 3766 l-34 -34 0 -146 0 -146 -146 0 -146 0 -34 -34 c-30 -30 -34 -40 -34 -86 0 -46 4 -56 34 -86 l34 -34 146 0 146 0 0 -146 0 -146 34 -34 c30 -30 40 -34 86 -34 46 0 56 4 86 34 l34 34 0 146 0 146 146 0 146 0 34 34 c30 30 34 40 34 86 0 46 -4 56 -34 86 l-34 34 -146 0 -146 0 0 146 0 146 -34 34 c-30 30 -40 34 -86 34 -46 0 -56 -4 -86 -34z"/> </g>
                        </svg>
                        <span>Ayuda profesional</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div>
            <!-- SECCIÓN: Cerrar sesión-->
            <div class="logout">
                <ul>
                    <li>
                        <a href="{{ route('cerrarsesion') }}">
                            <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                                <path d="M285 5101 c-108 -39 -199 -121 -251 -226 l-29 -60 0 -2040 0 -2040 32 -65 c18 -36 46 -81 62 -101 70 -84 101 -97 829 -340 l687 -230 105 3 c96 3 112 6 173 36 81 40 156 111 191 180 43 84 56 154 56 294 l0 128 394 0 c394 0 395 0 475 25 196 62 353 236 396 440 12 56 15 172 15 590 0 520 0 521 -22 565
                                -32 61 -66 83 -135 88 -49 3 -64 0 -93 -20 -19 -13 -45 -39 -57 -57 l-23 -34 0 -517 c0 -581 0 -583 -70 -662 -23 -26 -61 -55 -92 -69 -52 -24 -58 -24 -420 -27 l-368 -3 0 1669 c0 1086 -4 1688 -10 1723 -20 105 -90 211 -181 275 -24 17 -130 59 -253 101 l-211 72 695 -2 695 -2 53 -24 c31 -14 69 -43 92 -69 70 -79 70 -81 70 -662 l0 -517 23 -34 c12 -18 38 -44 57 -57 29 -20 44 -23 93 -20 69 5 103 27 135 88 22 44 22 45 22 565 0 418 -3 534 -15 590 -43 204 -200 378 -396 440 l-80 25 -1297 0 c-1226 -1 -1300 -2 -1347 -19z m810 -524 c352 -118 650 -219 663 -226 55 -30 52 95 52 -2000 0 -1178 -4 -1939 -9 -1954 -16
                                -41 -51 -67 -90 -67 -20 0 -326 97 -685 216 -494 165 -655 223 -672 240 -12 13 -24 41 -28 62 -11 67 -7 3824 4 3864 13 45 52 78 94 78 17 0 319 -96 671 -213z"/> <path d="M4072 3820 c-48 -29 -72 -75 -72 -138 0 -29 5 -63 11 -75 6 -12 133 -145 282 -294 l272 -273 -845 0 -845 0 -36 -24 c-92 -63 -92 -209 0 -272 l36 -24 845 0 845 0 -272 -272 c-149 -150 -276 -283 -282 -295 -6 -12 -11 -46 -11 -75 0 -97 61 -158 158 -158 29 0 63 5 75 11 31 16 855 838 873 871 8 15 14 50 14 78 0 28 -6 63 -14 78 -18 33 -842 855 -873 871 -36 18 -124 13 -161 -9z"/> </g>
                            </svg>
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- SECCIÓN: Activar modo oscuro -->
            <div class="modo-oscuro">
                <div class="switch">
                </div>
            </div>

        </div>
    </div>
    
    <!-- Enlace para todo el contenido de cada una de las vistas -->
    <main>
        @yield('contenido')
    </main>

    <!-- Links para iconos de ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Estilos JavaScript del sidebar -->
    <script src="{!! asset('js/acciones_sidebar.js') !!}"></script>

    <!-- Estilos JavaScript específicos en cada vista -->
    @yield('scripts')
    
</body>
</html>