<?php 
namespace App\Models;
use CodeIgniter\Model;
class PostModel extends Model{
    protected $table = 'posts';
    protected $allowedFields = ['id','title','body','thumbnail','slug'];
    public function getPosts($id = null){
        if($id == null){
            return $this->findAll();
        }
    }
    public function searchPost($key){
        return $this->asArray()->like('title',$key)->orLike('body',$key)->findAll();
    }
}