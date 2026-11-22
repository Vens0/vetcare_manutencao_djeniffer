<?php
require_once __DIR__.'/../config/database.php';require_once __DIR__.'/../config/auth.php';exigirLogin();
$id=(int)($_GET['id']??0);
try{$s=$pdo->prepare("DELETE FROM tutores WHERE id=?");$s->execute([$id]);}catch(PDOException $e){
    // Chamado 4 - Erro ao tentar excluir tutor se deve a registros que estão vinculados ao tutor, mensagem de erro adicionada como aviso.
    die("Erro ao excluir tutor, há registros relacionados.");
}
header('Location: index.php');exit;
