<?php

class PostsModel extends MikesnewsModel {
	const EXCERPT_SIZE = 55;  //55 words

	public function getAllPosts() {
		$sql = "SELECT ID, post_title, post_author, post_date, post_content FROM wp_posts" . 
			" WHERE post_type='post' AND post_status='publish' ORDER BY post_date DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$this->fillExcerpts($data);
		$this->getAttachments($data);

		return $data;
	}

	public function getPostById($post_id) {
		$sql = "SELECT ID, post_title, post_author, post_date, post_content FROM wp_posts" .
			" WHERE ID=" . $post_id;
		$query = $this->db->prepare($sql);
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$this->fillExcerpts($data);
		$this->getAttachments($data);

		return $data[0];
	}

	public function getPostsForPage($page, $posts_per_page) {
		$offset = $posts_per_page * ($page-1);
		$sql = "SELECT ID, post_title, post_author, post_date, post_content FROM wp_posts" .
			" WHERE post_type='post' AND post_status='publish' ORDER BY post_date DESC LIMIT " . 
			$posts_per_page . " OFFSET " . $offset;
		$query = $this->db->prepare($sql);
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$this->fillExcerpts($data);
		$this->getAttachments($data);

		return $data;
	}

	public function getTotalPages($posts_per_page) {
		$sql = "SELECT count(*) as count FROM wp_posts WHERE post_type='post' AND post_status='publish'";
		$query = $this->db->prepare($sql);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		$pages = array("total_pages" => (int)(ceil($data['count'] / $posts_per_page)));

		return $pages;
	}

	/*
	 *Protected function fillExcerpts
	 *  Examines post content and fills in field for excerpt
	 *
	 *Parameters:
	 *  @posts: Array of posts retrieved from db
	 *
	 *Returns:
	 *  No return value, just modifies original
	 *  array.
	 */
	protected function fillExcerpts(&$posts) {
		for($i=0; $i<sizeof($posts); $i++) {
			$wordArr = explode(" ", $posts[$i]['post_content']);

			$excerpt = "";
			for($word=0; $word<self::EXCERPT_SIZE; $word++) {
				$excerpt .= $wordArr[$word] . " ";
			}
			$excerpt = rtrim($excerpt, " ");
			$excerpt .= "[...]";


			$posts[$i]['post_excerpt'] = $excerpt;

		}
	}


	/*
	 *Protected function getAttachments
	 *  Finds attachments for posts, and 
	 *  adds them to the array.
	 *
	 *Parameters:
	 *  @posts: Array of posts retrieved from db
	 *
	 *Returns:
	 *  No return value, just modifies original
	 *  array.
	 */
	protected function getAttachments(&$posts) {
		for($i=0; $i<sizeof($posts); $i++) {
			$sql = "SELECT post_name, guid FROM wp_posts WHERE post_type='attachment' AND post_parent=" . $posts[$i]['ID'];
			$query = $this->db->prepare($sql);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($results) > 0) {
				$posts[$i]['post_attachments'] = $results;
			}
		}
	}


	
}