jQuery(function($) {
	$('.modale__bouton').click(function(){
		$('.modale').show();
	});

    $('.modale').click(function(event){
        console.log(event.target)
        if (event.target != $('.modale__content')) {
            $('.modale').hide();
        }
    });

    $('.navmobile__bouton').click(function(){
        $('.navmobile__bouton').toggleClass("navmobile__bouton-open");
        $('.navmobile').toggleClass("navmobile__open");
    });

    $('nav > li').click(function(){
        $('.navmobile__bouton').toggleClass("navmobile__bouton-open");
        $('.navmobile').toggleClass("navmobile__open");
    });
});
