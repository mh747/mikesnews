getPostsForPage = function(page, callback) {
  	$.ajax({
        method: "GET",
        url: "http://localhost/mikesnews/api/pages/" + page,
        contentType: 'application/json'
    })
    .done(function(msg){
    	//Create HTML to be displayed
    	var posts_html = "";

    	for(var i=0; i<msg.length; i++) {
    		posts_html += "<div class='span4'>\n";
    		posts_html += "<h2><a class='link_to_single' id='" + msg[i].ID + "' href='#'>" + msg[i].post_title + "</a></h2>\n";
    		posts_html += "<br><small>" + msg[i].post_date + "</small>";
    		posts_html += "<p>" + msg[i].post_excerpt + " <a class='link_to_single' id='" + msg[i].ID + "' href='#'>Read more...</a></p>";
    		posts_html += "</div>";
    	}

        callback(posts_html);
    });

}

getSinglePost = function(post_id, callback) {
  	$.ajax({
        method: "GET",
        url: "http://localhost/mikesnews/api/posts/" + post_id,
        contentType: 'application/json'
    })
    .done(function(msg){
    	//Create HTML to be displayed
    	console.log(msg);
    	var post_html = "";
		post_html += "<h1>" + msg.post_title + "</h1>";
		post_html += "<p><em>" + msg.post_date + "</em></p>";
		post_html += "<p>" + msg.post_content + "</p>";

        callback(post_html);
    });

}

getPageLinksForCurrentPage = function(page, callback) {
  	$.ajax({
        method: "GET",
        url: "http://localhost/mikesnews/api/pages/",
        contentType: 'application/json'
    })
    .done(function(msg){
    	//Now that we have the total number of pages 
    	//create link html if needed
    	var total_pages = msg.total_pages;
    	var older_link = "";
    	var newer_link = "";

    	if(page < total_pages) {
    		older_link = "<a class='older_link' href='#'>Older Posts</a>";
    	}
    	if(page > 1) {
    		newer_link = "<a class='newer_link' href='#'>Newer Posts</a>";
    	}

        callback(older_link, newer_link);
    });

}


setUpPage = function(current_page) {

	var requests = 0;

	$('#posts_div').fadeOut('slow', function(){
		$('#older').fadeOut('slow');
		$('#newer').fadeOut('slow');
		getPostsForPage(current_page, function(posts_html) {
			$('#posts_div').html(posts_html);

			//Set up 'older' and 'newer' links after articles are loaded
			getPageLinksForCurrentPage(current_page, function(older_link, newer_link) {
				$('#older').html(older_link);
				$('#newer').html(newer_link);

				$('#loading').html('&nbsp');
				$('#posts_div').fadeIn('slow', function(){
					$('#older').fadeIn('slow');
					$('#newer').fadeIn('slow');
				});
			});	
		});

	});			
}