<?php
require_once "Model.php";

class Usuario extends Model {
    public function getUsuarios() {
        $stmt = $this->db->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
