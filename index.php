<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        td:last-child::after{
            content: '%';
        }

        td:last-child:hover::after{
            color:red;
            font-size:22px;
            transition: 2s;
        }
        tr{
            
            transition: 0.8s;

        }

        tr:hover{
            background-color: red !important;
            transition: 0.4s;

        }

    </style>
    
  </head>
  <body>
        <?php


        if(( $arquivo = fopen("tabela.csv","r")) !== false){
               

            fgetcsv($arquivo, 50, ',');
             

            print"<div class=''alert table-danger'>Atencao! O campeonato está em andamento!</div>";
            print"<div class=''alert alert-success'>Atencao! O periodo de apostas está em andamento</div>";
            print "<table class='table table-striped table-hover'>
            <thead class='thead-dark'>
                <tr>
                    <th>Equipe</th>
                    <th>P</th>
                    <th>J</th>
                    <th>V</th>
                    <th>E</th>
                    <th>D</th>
                    <th>GP</th>
                    <th>GC</th>
                    <th>SG</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>";
            
            while(($linha = fgetcsv($arquivo, 50, ','))!==false){
                $qtdJogos = $linha[1] + $linha[2] + $linha[3];
                $p = ($linha[1]*3) + $linha[2];
                $percentual = ($p*100)/($qtdJogos*3);
                $SG = $linha[4] - $linha[5];
               // echo $qtdJogos;
                print"
                    <tr>
                        <td>{$linha[0]}</td>
                        <td>{$p}</td>
                        <td>{$qtdJogos}</td>
                        <td>{$linha[1]}</td>
                        <td>{$linha[2]}</td>
                        <td>{$linha[3]}</td>
                        <td>{$linha[4]}</td>
                        <td>{$linha[5]}</td>
                        <td>{$SG}</td>
                        <td>{$percentual}</td>
                     
                    </tr>
              
                    ";

                //var_dump($linha);
            }
            print "</tbody></table>";

            fclose($arquivo);
        
        }else{
            die("ocorreu um erro ao abrir o arquivo!");
        }

        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



