<?php

require_once './Conexion.php';

class TipoUsuario extends Conexion
{
    private $pdo;
    public $id;
    public $nombre;
    public $descripcion;
    public $estado;


    public function __construct()
    {
        try {
            $this->pdo = Conexion::Conectar();
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }


    public function readAll()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tipousuario");
            $stm->execute();        
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function readId($id)
    {
     
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tipousuario WHERE id = ?");
            $stm->execute($id);

            return $stm->fetch(PDO::FETCH_OBJ);
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readStates($estado){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tipousuario WHERE estado = ?");
            $stm->execute($estado);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function create($data)
    {
        try {
            $query = "INSERT INTO tipousuario ('nombre', 'descripcion') VALUES (?, ?)";
            $this?->pdo?->prepare($query)->execute(array(
                $data?->nombre,
                $data?->descripcion,
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($data)
    {

        try {

            $query = "UPDATE tipousuario SET nombre = ?, descripcion = ? WHERE id = ? ";
            $this->pdo->prepare($query)->execute(array(
                $data?->nombre,
                $data?->descripcion,
                $data?->id
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function changeStatus($nuevoEstado, $id)
    {
        try {
            $query = "UPDATE tipousuario SET estado = ? WHERE id = ? ";
            $this->pdo->prepare($query)->execute(array(
                $nuevoEstado,
                $id
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
