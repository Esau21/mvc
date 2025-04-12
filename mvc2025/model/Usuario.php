<?php


require_once('./Conexion.php');

class Usuario extends Conexion
{
    private $pdo;
    public $nombrecompleto;
    public $email;
    public $password;
    public $fotografia;
    public $id_tipousuario;
    public $estado;




    public function readAll()
    {
        try {
            $stm = $this->pdo->prepare("SELECT u.id, u.nombrecompleto, u.email, u.password, u.fotografia, t.nombre as tipousuarionombre FROM usuario as u INNER JOIN tipousuario as t ON u.id_tipousuario = t.id ORDER BY u.id ASC");
            $stm->execute();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function readId($id)
    {

        try {
            $stm = $this->pdo->prepare("SELECT u.id, u.nombrecompleto, u.email, u.password, u.fotografia, t.nombre as tipousuarionombre FROM usuario as u INNER JOIN tipousuario as t ON u.id_tipousuario = t.id WHERE u.id = 1");
            $stm->execute($id);

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readStates($estado)
    {
        try {
            $stm = $this->pdo->prepare("SELECT u.id, u.nombrecompleto, u.email, u.password, u.fotografia, t.nombre as tipousuarionombre FROM usuario as u INNER JOIN tipousuario as t ON u.id_tipousuario = t.id WHERE u.estado = ?");
            $stm->execute($estado);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function create($data)
    {
        try {
            $query = "INSERT INTO usuario ('nombrecompleto', 'email', 'password', 'fotografia', 'id_tipousuario') VALUES (?, ?, MD5(?), ?, ?)";
            $this?->pdo?->prepare($query)->execute(array(
                $data?->nombrecompleto,
                $data?->email,
                $data?->password,
                $data?->fotografia,
                $data?->id_tipousuario ?? 'sin datos',
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($data)
    {

        try {

            $query = "UPDATE usuario SET nombrecompleto = ?, email = ?, fotografia = ?, id_tipousuario = ? WHERE id = ? ";
            $this->pdo->prepare($query)->execute(array(
                $data?->nombrecompleto,
                $data?->email,
                $data?->fotografia,
                $data?->id_tipousuario ?? 'sin datos',
                $data?->id
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function changeStatus($nuevoEstado, $id)
    {
        try {
            $query = "UPDATE usuario SET estado = ? WHERE id = ? ";
            $this->pdo->prepare($query)->execute(array(
                $nuevoEstado,
                $id
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
