<?php
namespace App\Controller;
use App\Model\NoteModel;
use App\Model\NoteTypeModel;

class NoteController
{
    public $noteModel;
    public function __construct()
    {
        $this->noteModel = new NoteModel();
    }
    public function showAll()
    {
        $notes = $this->noteModel->getAll();
        include_once "App/View/note/list.php";
    }

    public function showById($id)
    {
        $note = $this->noteModel->getById($id);
        include_once "App/View/note/detail.php";

    }
    public function deleteNote($id){
        $this->noteModel->delete($id);
        header("location:index.php?page=note-list");
    }
    public function createNote(){
        if ($_SERVER["REQUEST_METHOD"]== "GET"){
            $noteTypeModel = new NoteTypeModel();
            $noteTypes = $noteTypeModel->getAll();
            include "App/View/note/create.php";
        }
        else {
            $data=[
                "title"=>$_REQUEST["title"],
                "content"=>$_REQUEST["content"],
                "type_id"=>$_REQUEST["type_id"]
            ];
            $this->noteModel->create($data);
            header("location:index.php?page=note-list");
        }
    }

    public function updateNote(){
        if ($_SERVER["REQUEST_METHOD"]== "GET"){
            $noteTypeModel = new NoteTypeModel();
            $noteTypes = $noteTypeModel->getAll();
            $note = $this->noteModel->getById($_REQUEST["id"]);
            include "App/View/note/update.php";
        }
        else {

            $this->noteModel->update($_REQUEST);
            header("location:index.php?page=note-list");
        }
    }

}