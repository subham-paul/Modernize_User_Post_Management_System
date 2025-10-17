<?php

namespace App\Models;


class Post
{
    //Static Data Source => DAO => Data Access Object / Dto=> Data Transfer Object.
     public function getPosts(){
          return [
            0=>['post_id'=>'p001',"title"=>"first title","desc"=>"first desc"],
            1=>['post_id'=>'p002',"title"=>'second title',"desc"=>"second desc"],
            2=>['post_id'=>'p003',"title"=>'lorem title',"desc"=>"ipsum desc"],
            3=>['post_id'=>'p004',"title"=>'lorem title',"desc"=>"lipsum desc"],
          ];
          
     }
}
