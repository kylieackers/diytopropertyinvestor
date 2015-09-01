
jQuery(function($) {

	var $menuItems = $('.menu-title');   //list of menu titles
	var $menuLists = $('.menu-list');

	$menuItems.addClass('menu-arrow-down');
	$menuLists.hide();

	$menuItems.on('click', function(){
		var $this = $(this);
		var down = $this.hasClass('menu-arrow-down');

		//Hide any menu items that are expanded
		$menuLists.slideUp();
		$menuItems.each(function(){
			$(this).removeClass('menu-arrow-up');
			$(this).addClass('menu-arrow-down');
		});

		// Change the direction of the arrow for the item clicked
		if ( down == true )
		{
			$this.removeClass('menu-arrow-down');
			$this.addClass('menu-arrow-up');
			$this.next().slideDown(1500);
		}
		else
		{
			$this.next().slideUp(1500);
		};
	});
});
