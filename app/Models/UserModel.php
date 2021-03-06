<?php namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
        protected $table      = 'users';
        protected $primaryKey = 'id';

        protected $returnType = 'array';

        protected $allowedFields = ['username', 'password', 'userRole'];



        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

}