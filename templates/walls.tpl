{extends file='html.tpl'}
{block name='links' append}
	<script src="/js/lightbox.min.js"></script>
	<link rel="stylesheet" href="/css/lightbox.css">
	<script>
		$(function(){

			function getRandomInt(min, max)
			{
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}

			var sides = ['left', 'top', 'right', 'bottom'];

			function glitch() 
			{
				$('.glitch').css('left', 0).css('top', 0).css('right', 0).css('bottom', 0);
				$('.glitch').css(sides[getRandomInt(0, 3)], getRandomInt(-10, 10));
				$('.glitch').css('background-color', getRandomColor());
			}

			function getRandomColor()
			{
				return '#' + Math.floor(Math.random()*16777215).toString(16);
			}

			$('a.navbar-brand div').hover(function(){
				$(this).addClass('glitch');
			}, function(){
				$(this).css('left', 0).css('top', 0).css('right', 0).css('bottom', 0);
				$(this).css('background-color', 'black');
				$(this).removeClass('glitch');
			});

			setInterval(glitch, 100);
		});
	</script>
{/block}
{block name='main'}
	<div class="row gallery" id="walls_gallery">
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/3.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
		<a href="/images/1.jpg" data-lightbox="walls"><div class="preview"><img src="/images/3.jpg" /></div></a>
		<a href="/images/2.jpg" data-lightbox="walls"><div class="preview"><img src="/images/4.jpg" /></div></a>
	</div>
{/block}