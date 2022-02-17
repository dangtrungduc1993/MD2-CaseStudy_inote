<?php

namespace App\Model;

class NoteModel
{
    public $connect;
    public function __construct()
    {
        $db = new DBConnect();
        $this->connect = $db->connect();
    }
    public function getAll()
    {
        $sql = "select notes.id,title,content,note_type.name from notes
                join note_type on type_id = note_type.id order by notes.id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    public function getById($id)
    {
        $sql = "select * from notes where id = ".$id;
        $stmt = $this->connect->query($sql);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    public function delete($id){
        $sql="delete from note where id=$id";
        $this->connect->query($sql);

    }
    public function create($data){
        $sql="Insert into notes(title,content,type_id) values (?,?,?)";
        $stmt= $this->connect->prepare($sql);
        $stmt->bindParam(1,$data['title']);
        $stmt->bindParam(2,$data['content']);
        $stmt->bindParam(3,$data['type_id']);
        $stmt->execute();
    }
    public function update($data){
        $sql="update notes set title = ?, content = ?, type_id = ? where  id=?";
        $stmt= $this->connect->prepare($sql);
        $stmt->bindParam(1,$data['title']);
        $stmt->bindParam(2,$data['content']);
        $stmt->bindParam(3,$data['type_id']);
        $stmt->bindParam(4,$data['id']);
        $stmt->execute();
    }



}

