<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public function createBlog($data)
  {
    $this->user_id = auth()->user()->id;
    $this->title = $data['title'];
    $this->description = $data['description'];
    $this->featured_image = $data['featured_image'];
    $this->category = $data['category'];
    $this->status = $data['status'];
    $this->save();
    return 1;
  }

}
