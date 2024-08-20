jQuery(function($) {

	$('.modale__bouton').click(function(){
		$('.modale').show();
	});

    $('.modale').click(function(event){
        console.log(event.target)
        if ($(event.target).is('#modale')) {
            $('.modale').hide();
        }
    });



    $('.navmobile__bouton').click(function(){
        $('.navmobile__bouton').toggleClass("navmobile__bouton-open");
        $('.navmobile').toggleClass("navmobile__open");
        $('header').toggleClass("sticky");
    });

    $('nav > li').click(function(){
        $('.navmobile__bouton').toggleClass("navmobile__bouton-open");
        $('.navmobile').toggleClass("navmobile__open");
        $('header').toggleClass("sticky");
    });



    $(".Post__contact").click(function(){
        $('#ref').val($(".Post__contact").data('ref'));
    });



    $(".Post__arrow-left").hover(function(){
        $("#Post__preview-previous").css("z-index", "1");
    }, function () {
        $("#Post__preview-previous").css("z-index", "0");
    });

    $(".Post__arrow-right").hover(function(){
        $("#Post__preview-next").css("z-index", "1");
    }, function () {
        $("#Post__preview-next").css("z-index", "0");
    });
    
    $("#cat").click(function(){
        $(".cat").toggleClass("tri__filter-hide")
        $(".cat").toggleClass("tri__filter-show")
    });
    $("#form").click(function(){
        $(".form").toggleClass("tri__filter-hide")
        $(".form").toggleClass("tri__filter-show")
    });
    $("#ordre").click(function(){
        $(".ordre").toggleClass("tri__filter-hide")
        $(".ordre").toggleClass("tri__filter-show")
    });


    let currentPage = 1;
    let categorie = ''
    let format = ''
    let ordre = ''
    $('.load_more').on('click', function() {
        currentPage++;
        $.ajax({
            type: 'POST',
            url: './wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'weichie_load_more',
                paged: currentPage,
                categorie: categorie,
                format: format,
                ordre: ordre,
            },
            success: function (res) {
                $('.galerie').append(res);
            }
        });
    });

    $('.tri__filter__arrow-closed').click(function(){
        $('.tri__filter__arrow-closed').css('border','')
        $(this).css('border','solid 1px rgb(33, 90, 255)')
    });

    $('.tri__filter__arrow-closed').click(function(){
        $('.tri__filter__arrow-closed').toggleClass('tri__filter__arrow-opened')
    });

    $(document).ready(function(){
        $(document).on('click', '.tri__filter-show', function(e){
            currentPage = 1;
            e.preventDefault();
            if (categorie == $(this).data('cat')) {
                categorie = '';
                $('.cat').css('background-color', '');
            }else if($(this).data('cat') != null) {
                categorie = $(this).data('cat');
                $('.cat').css('background-color', '');
                $(this).css('background-color', '#FE5858');
            }
            if (format == $(this).data('form')) {
                format = '';
                $('.form').css('background-color', '');
            }else if($(this).data('form') != null) {
                format = $(this).data('form');
                $('.form').css('background-color', '');
                $(this).css('background-color', '#FE5858');
            }
            if (ordre == $(this).data('ordre')) {
                ordre = '';
                $('.ordre').css('background-color', '');
            }else if($(this).data('ordre') != null) {
                ordre = $(this).data('ordre');
                $('.ordre').css('background-color', '');
                $(this).css('background-color', '#FE5858');
            }
            $.ajax({
                url: './wp-admin/admin-ajax.php',
                data: {
                    action: 'filter',
                    categorie: categorie,
                    format: format,
                    ordre: ordre,
                },
                dataType: 'html',
                type: 'POST',
                success: function(result) {
                    $('.galerie').html(result);
                },
                error: function(result) {
                    console.warn(result);
                },
        });
        });
    });
});
