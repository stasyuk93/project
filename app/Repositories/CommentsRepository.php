<?php

namespace Project\Repositories;

use Project\Models\Comment;

class CommentsRepository extends Repository {
	
	
	public function __construct(Comment $comment) {
		$this->model = $comment;
	}
	
}

?>