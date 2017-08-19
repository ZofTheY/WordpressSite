
jQuery(document).ready(function(){
	var xhr = new XMLHttpRequest();
	btnLoadMorePosts(xhr);
});

function getUrl(action,getData){
	if(action!=undefined){
		if(action=='getMorePosts'){
			action = 'action=' + action;
			getData = '&getData=' + getData;
			postsDisplayed = '&postsDisplayed=' + jQuery('article[class="article"]').length;
			var url = 'wp-admin/admin-ajax.php?' + action + getData + postsDisplayed;
			return url;
		}
		throw new Error('getUrl(INVALID) parameter is invalid');
	}
	throw new Error('getUrl(string) parameter must contain a string');
}

function btnLoadMorePosts(xhr){
	jQuery('#btnLoad').on('click', function(){
		event.preventDefault();
		jQuery('#btnLoad').addClass('hidden');
		var url = getUrl('getMorePosts','posts')
		/*xhr.onreadystatechange = function(){
			console.log('---------------------------');
			console.log('*properties*');
			console.log('ReadyState: '+xhr.readyState);
			console.log('Status: '+xhr.status);
			console.log('StatusText: '+xhr.statusText);
			console.log('Response: '+xhr.response);
			console.log('ResponseText: '+xhr.responseText);
			console.log('ResponseType: '+xhr.responseType);
			console.log('ResponseURL: '+xhr.responseURL);
			console.log('*methods*')
			console.log('ResponseAllHeader: '+xhr.getAllResponseHeaders());
			console.log('ResponseHeader: '+xhr.getResponseHeader('content-type'));
			console.log('---------------------------');
		}*/
		xhr.open('GET', url);
		xhr.onreadystatechange = function(){
			if(xhr.readyState==4 && xhr.status==200){
				response = JSON.parse(xhr.response);
				for(var i = 0; i < response.length; i++){
					jQuery('.article:last').after(jQuery(
						'<article class="article">\
							<div class="article-title">\
								<h2>'+
									'<a href="'+response[i].permalink+'">'
										+response[i].title+
									'</a>\
								</h2>\
							</div>\
							<div class="article-content">'
								+response[i].content+
							'</div>\
						</article>'
					));
				}
				if(jQuery('article[class="article"]').length<parseInt(PHPobj.publishedPosts)){
					jQuery('#btnLoad').removeClass('hidden');
				}
			}
		}
		xhr.send();
	});
}