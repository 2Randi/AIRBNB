<?php
$uploadDir = '/home/e20230012311/HAI726I/PROJET/photos/';
$uploadFile = $uploadDir . basename($_FILES['photo']['name']);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
    echo "La photo a été téléchargée avec succès.";
    
} else {
    echo "Erreur lors du téléchargement de la photo.";
}
?>