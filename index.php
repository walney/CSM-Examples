<html>
    <head>
        <title>CSM Store</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    </head>
    <body style="background-color: #fefefe">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <a class="navbar-brand" href="#" style="font-family: 'Shadows into light'" >CSM Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Produtos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Fale conosco</a>
                    </li>
            </div>
        </nav>

        <div class="container">
            <div style="background-color: #6600a5">
                <h1 class="jumbotron" style="background-color: #6600a5; color: #fff; font-family: 'Shadows into light'; text-align: center; font-size: 100px">CSM Store</h1>    
                <div  style="background-color: #cc9eca; padding: 40px">;
                    <h2>Informática</h2>
                    <div class="row">
                        <?php
                        //$url = 'https://spreadsheets.google.com/feeds/cells/19vT4qkWn-PdfvIwKI9sVnDrOFqzb_fjeN9sEGhrNqE8/1/public/full?alt=json';
                        $url = 'https://spreadsheets.google.com/feeds/cells/1VhyhFoHOgGwlDxiXCJW_fcciLmMHTr9vJAW0mUVuvPk/1/public/full?alt=json';
						
						$file = file_get_contents($url);
                        $produtosDeInformatica = json_decode($file);
                        //var_dump($produtosDeInformatica);
						
						$produtos = $produtosDeInformatica->{'feed'}->{'entry'};
                        /*
						 echo '<pre>';
						 var_dump($produtos);
                         echo '</pre>';
                        */
						
                        $prodAsStrings = Array();
                        foreach ($produtos as $prod) {
                            array_push($prodAsStrings, $prod->{'gs$cell'}->{'$t'});
                        }
                        /*
						 echo '<pre>';
						 var_dump($prodAsStrings);
                         echo '</pre>';
                        */
						
                        $produtosObjetos = Array();
                        for ($i = 0; $i < sizeof($prodAsStrings); $i = $i + 17) {
                            $cli_codigo      = $prodAsStrings[$i];
                            $cli_tipo        = $prodAsStrings[$i + 1];
                            $cli_cpf         = $prodAsStrings[$i + 2];
                            $cli_rg          = $prodAsStrings[$i + 3];
                            $cli_nome        = $prodAsStrings[$i + 4];
                            $cli_endereco    = $prodAsStrings[$i + 5];
                            $cli_bairro      = $prodAsStrings[$i + 6];
                            $cli_cidade      = $prodAsStrings[$i + 7];
                            $cli_uf          = $prodAsStrings[$i + 8];
                            $cli_cep         = $prodAsStrings[$i + 9];
                            $cli_telefone    = $prodAsStrings[$i + 10];
                            $cli_email       = $prodAsStrings[$i + 11];
                            $cli_imagem      = $prodAsStrings[$i + 12];

                            $cli_criado_at   = $prodAsStrings[$i + 13];
                            $cli_alterado_at = $prodAsStrings[$i + 14];
                            $cli_excluido_at = $prodAsStrings[$i + 15];
                            $cli_usuario     = $prodAsStrings[$i + 16];
                            $cli_status      = $prodAsStrings[$i + 17];
                            
                            $item = Array();

                            array_push($item, $cli_codigo);
                            array_push($item, $cli_tipo);
                            array_push($item, $cli_cpf);
                            array_push($item, $cli_rg);
                            array_push($item, $cli_nome);

                            array_push($item, $cli_endereco);
                            array_push($item, $cli_bairro);
                            array_push($item, $cli_cidade);
                            array_push($item, $cli_uf);
                            array_push($item, $cli_cep);
                            array_push($item, $cli_telefone);
                            array_push($item, $cli_email);
                            array_push($item, $cli_imagem);

                            array_push($item, $cli_criado_at);
                            array_push($item, $cli_alterado_at);
                            array_push($item, $cli_excluido_at);
                            array_push($item, $cli_usuario);
                            array_push($item, $cli_status);


                            array_push($produtosObjetos, $item);
                        }
                       
                        
						 echo '<pre>';
						 var_dump($produtosObjetos);
                         echo '</pre>';
                        

                        
                        for ($i = 1; $i < sizeof($produtosObjetos); $i++) {
                            ?>

                                <div class="col-md-6 card-deck mb-3 text-center">
                                    <div class="card mb-4 shadow-sm">
                                        <div style="text-align: center">
                                            <img height="300" width="300" src="<?= $produtosObjetos[$i][3] ?>">
                                        </div>
                                        <div class="card-header">
                                            <h4 class="my-0 font-weight-normal"><?= $produtosObjetos[$i][0] ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title"><?= $produtosObjetos[$i][4] ?></h1>
                                            <div>
                                                <?= $produtosObjetos[$i][2] ?>
                                            </div>
                                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Comprar agora</button>
                                        </div>
                                    </div>

                                </div>


                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div id='footer' style="background-color: #6600a5; color:#fff; font-family: 'shadows into light'; font-size: 20px; text-align: center; padding: 20px">
                <div>Produto desenvolvido por ComputerScienceMaster</div>
            </div>
        </div>


    </body>



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</html>
