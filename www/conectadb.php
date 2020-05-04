<?php 

//$servidor = 'xmysql.nctecbrasilcursos.com.br'; //PARA USO DE TESTE INTERNO
$servidor = 'mysql.nctecbrasilcursos.com.br'; // PARA USO QUANDO UP NO SITE
$usuario='nctecbrasilcurso';
$senha='nctec22609393';
$banco='nctecbrasilcursos';

    if(!$conexao = mysqli_connect($servidor, $usuario, $senha, $banco)){
        echo mysqli_connect_error();     
    }
    mysqli_set_charset($conexao,"utf8");