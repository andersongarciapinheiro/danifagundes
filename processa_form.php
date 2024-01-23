<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "andersongarciapinheiro@gmail.com";
    $subject = "Novo Pedido de Reserva";

    $message = "Quantidade de Pessoas: " . $_POST["qtdpessoas"] . "\n";
    $message .= "Nome Completo: " . $_POST["nome"] . "\n";
    $message .= "Endereço: " . $_POST["endereco"] . "\n";
    $message .= "Estado/Cidade: " . $_POST["estado_cidade"] . "\n";
    $message .= "Bairro: " . $_POST["bairro"] . "\n";
    $message .= "CEP: " . $_POST["cep"] . "\n";
    $message .= "Estado Civil: " . $_POST["estadoCivil"] . "\n";
    $message .= "Profissão: " . $_POST["profissao"] . "\n";
    $message .= "Data de Entrada: " . $_POST["entrada"] . "\n";
    $message .= "Data de Saída: " . $_POST["saida"] . "\n";

    // Processar os anexos (CNH/RG e Comprovante de Residência)
    $uploads_dir = "caminho/para/os/anexos/";
    $cnhRgFile = $uploads_dir . basename($_FILES["cnhRg"]["name"]);
    $comprovanteFile = $uploads_dir . basename($_FILES["comprovanteResidencia"]["name"]);

    move_uploaded_file($_FILES["cnhRg"]["tmp_name"], $cnhRgFile);
    move_uploaded_file($_FILES["comprovanteResidencia"]["tmp_name"], $comprovanteFile);

    // Adicionar os anexos à mensagem
    $message .= "Cópia/Foto CNH ou RG: Veja em anexo\n";
    $message .= "Cópia/Foto Comprovante de Residência: Veja em anexo\n";

    // Headers para e-mail com anexos
    $headers = "From: webmaster@dominio.com" . "\r\n" .
               "Reply-To: webmaster@dominio.com" . "\r\n" .
               "Content-Type: text/plain; charset=utf-8" . "\r\n" .
               "Content-Disposition: attachment; filename=cnh_rg_anexo.jpg" . "\r\n" .
               "Content-Transfer-Encoding: base64" . "\r\n";

    // Enviar e-mail
    mail($to, $subject, $message, $headers);

    // Redirecionar para uma página de confirmação
    header("Location: confirmacao.html");
} else {
    // Se alguém tentar acessar diretamente o script, redirecionar para a página principal
    header("Location: index.html");
}
?>
