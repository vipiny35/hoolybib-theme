
<!-- Facebook Like and Share Button START-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1064411637010104";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-like" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true" style="vertical-align:text-bottom;zoom:1;*display:inline">Like &amp; Share</div>
<!-- Facebook Like and Share Button END-->


<!-- Tweet Button START -->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<style> .twitter-share-button[style] { vertical-align: text-bottom !important; } </style>

	<a href="http://twitter.com/share" 
	class="twitter-share-button"
    data-size="large"
    data-url="<?php the_permalink(); ?>"
    data-via="hoolybib"
    data-text="<?php the_title(); ?>"
    data-related="hoolybib:Hoolybib Official"
    data-count="vertical">Tweet</a>
<!-- Tweet Button END -->




<!-- Whatsapp Share Button START-->
<style>
	.whatsapp{
		display: inline-block;
		height: 28px; 
		font-size: 18px;
    	line-height: 28px;
		border-radius: 4px;
		padding: 0px 10px; 
		color: #fff !important;
		background-color: #34AF23;
		vertical-align: text-bottom !important;
	}
	@media(min-width: 800px){
		.whatsapp{
			display: none;
		}
	}
</style>
<a class="whatsapp" href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
<!-- Whatsapp Share Button END-->

<!-- Email Share Button START-->
<style>
	.email{
		display: inline-block;
		height: 28px; 
		font-size: 18px;
    	line-height: 28px;
		border-radius: 4px;
		padding: 0px 10px; 
		color: #fff !important;
		background-color: #4285F4;
		vertical-align: text-bottom !important;
	}
	@media(max-width: 800px){
		.email{
			display: none;
		}
	}
</style>

<a class="email" href="mailto:?subject=<?php the_title(); ?>&amp;body=Check out this site <?php the_permalink(); ?>" title="Share by Email">
	<i class="fa fa-envelope" aria-hidden="true"></i>
</a>
<!-- Email Share Button END-->	


<!-- Google +1 Button START -->
<!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
<div class="g-plusone"></div> -->
<!-- Google +1 Button END -->
