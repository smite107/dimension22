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