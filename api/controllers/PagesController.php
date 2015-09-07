<?php

class PagesController extends MikesnewsController {
	const POSTS_PER_PAGE = 3;

	public function getAction($request) {
		//Implementing GET requests
		if(isset($request->url_elements[2])) {
			//Page number is set

			$page = $request->url_elements[2];
			$posts = new PostsModel($request);
			$data = $posts->getPostsForPage($page, self::POSTS_PER_PAGE);
		} else {
			//Page number is not set

			/*We will use this endpoint to return the 
			 *total number of pages required, using the 
			 *constant POSTS_PER_PAGE
			 */

			$posts = new PostsModel($request);
			$data = $posts->getTotalPages(self::POSTS_PER_PAGE);
		}

		return $data;
	}

	public function putAction($request) {
		$data['message'] = "Unsupported action.";

		return $data;
	}

	public function postAction($request) {
		$data['message'] = "Unsupported action.";

		return $data;
	}

	public function deleteAction($request) {
		$data['message'] = "Unsupported action.";

		return $data;
	}
	
}