<?php
session_start();
include_once 'equipeDAO.php';

if (isset($_GET['id']) && isset($_GET['id_comp'])) {
    $id = (int)$_GET['id'];
    $id_comp = (int)$_GET['id_comp'];
    $equipeDAO = new equipeDAO();
    if ($equipeDAO->excluir($id)) {
        header("Location: ../Front/visualizarEquipes.php?id=$id_comp&toast=exclusaoSucesso");
    } else {
        header("Location: ../Front/visualizarEquipes.php?id=$id_comp&toast=exclusaoErro");
    }
} else {
    header("Location: ../Front/visualizarEquipes.php?toast=parametroInvalido");
}
exit;

?>
