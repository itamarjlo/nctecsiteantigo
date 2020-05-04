<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body>

<?

$nome = $_POST['nome'];

$ref = $_POST['ref'];

$email = $_POST['email'];

$texto =$_POST['texto'];



  include ("Mail.php");

  include ("Mail/mime.php");



   $recipients = 'atendimento@nctecbrasilcursos.com.br';



  # Cabeçalho do e-mail.

  $headers = 

    array (

      'From'    => 'atendimento@nctecbrasilcursos.com.br', # O 'From' é *OBRIGATÓRIO*.

      'To'      => $email,

      'Subject' => $ref

    );



  # Utilize esta opção caso deseje definir o e-mail de resposta

  $headers['Reply-To'] = $email;



  # Utilize esta opção caso deseje definir o e-mail de retorno em caso de erro de envio

  # $headers['Errors-To'] = 'EMailDeRerornoDeERRO@DominioDeretornoDeErro.com';



  # Utilize esta opção caso deseje definir a prioridade do e-mail

  # $headers['X-Priority'] = '3'; # 1 UrgentMessage, 3 Normal  



  # Define o tipo de final de linha.

  $crlf = "\r\n";



  # Corpo da Mensagem e texto e em HTML

  $text = $texto;

  $html = "<HTML><BODY><font color=blue>Cliente:&nbsp;&nbsp;</font>$nome";

  $html .= "<br><br><font color=red>Assunto:&nbsp;&nbsp;</font> $ref" ;

  $html .= "<br><br><font color=green>Mensagem:&nbsp;&nbsp;</font> $text </BODY></HTML>";	



  # Instancia a classe Mail_mime

  $mime = new Mail_mime($crlf);



  # Coloca o HTML no email

  $mime->setHTMLBody($html);





##  # Anexa um arquivo ao email.

##  $mime->addAttachment('/home/suapastahome/www/seuarquivo.txt');



  # Procesa todas as informações.

  $body = $mime->get();

  $headers = $mime->headers($headers);



  # Parâmetros para o SMTP. *OBRIGATÓRIO*

  $params = 

    array (

      'auth' => true, # Define que o SMTP requer autenticação.



      'host' => 'smtp.nctecbrasilcursos.com.br', # Servidor SMTP

      'username' => 'atendimento=nctecbrasilcursos.com.br', # Usuário do SMTP

      'password' => 'fatima' # Senha do seu MailBox.

    );

    

  # Define o método de envio

  $mail_object =& Mail::factory('smtp', $params);



  # Envia o email. Se não ocorrer erro, retorna TRUE caso contrário, retorna um

  # objeto PEAR_Error. Para ler a mensagem de erro, use o método 'getMessage()'.

  $result = $mail_object->send($recipients, $headers, $body);

  if (PEAR::IsError($result))

  {

    echo "ERRO ao tentar enviar o email. (" . $result->getMessage(). ") desculpe";

  }   

  else

  {

   include("emailresposta.php");

   

   

  }   

  

   

?>					

<!--?status= $resposta-->

</body>

</html>

