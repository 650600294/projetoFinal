<?php
// O caminho da nossa imagem no servidor
$caminho_imagem = '../27282.jpg';

// Retorna o identificador da imagem
$imagem = imagecreatefromjpeg($caminho_imagem);

// Cria duas variáveis com a largura e altura da imagem
list( $largura, $altura ) = getimagesize( $caminho_imagem );

// Nova largura e altura
$proporcao = 0.5;
$nova_largura = $largura * $proporcao;
$nova_altura = $altura * $proporcao;

// Cria uma nova imagem em branco
$nova_imagem = imagecreatetruecolor( $nova_largura, $nova_altura );

// Copia a imagem para a nova imagem com o novo tamanho
imagecopyresampled(
    $nova_imagem, // Nova imagem 
    $imagem, // Imagem original
    0, // Coordenada X da nova imagem
    0, // Coordenada Y da nova imagem 
    0, // Coordenada X da imagem 
    0, // Coordenada Y da imagem  
    $nova_largura, // Nova largura
    $nova_altura, // Nova altura
    $largura, // Largura original
    $altura // Altura original
);

// Cria a imagem
imagejpeg( $nova_imagem, 'nova_imagem.jpg', 100 );

// Remove as imagens temporárias
imagedestroy($imagem);
imagedestroy($nova_imagem);
?>