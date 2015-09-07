<?php

class PostsController extends MikesnewsController {

	public function getAction($request) {
		//Implementing GET requests
		if(isset($request->url_elements[2])) {

			//Post ID is set
			$post_id = (int)$request->url_elements[2];
			$posts = new PostsModel($request);
			$data = $posts->getPostById($post_id);
			//echo "Grabbing post with ID " . $post_id . "\n";

		} else {

			//Find all posts
			$posts = new PostsModel($request);
			$data = $posts->getAllPosts();

		}

		return $data;
	}

	public function postAction($request) {
		$data['message'] = "Unsupported action.";

		return $data;
	}

	public function putAction($request) {
		$data['message'] = "Unsupported action.";

		return $data;
	}

	public function deleteAction($request) {
		$data['message'] = "Unsupported action.";

		return $data;
	}

}


