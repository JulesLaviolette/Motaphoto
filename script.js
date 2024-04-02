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
    });

    $('nav > li').click(function(){
        $('.navmobile__bouton').toggleClass("navmobile__bouton-open");
        $('.navmobile').toggleClass("navmobile__open");
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
                console.log(res);
                $('.galerie').append(res);
            }
        });
    });

    
    $(document).ready(function(){
        $(document).on('click', '.tri__filter-show', function(e){
            e.preventDefault();
            if (format == '' || $(this).data('form') != null) {
                format = $(this).data('form');
            }else if(format == $(this).data('form')) {
                format = ''
            }
            if (categorie == '' || $(this).data('cat') != null) {
                categorie = $(this).data('cat');
            }else if(categorie == $(this).data('cat')) {
                categorie = ''
            }
            if (ordre == '' || $(this).data('ordre') != null) {
                ordre = $(this).data('ordre');
            }else if(ordre == $(this).data('ordre')) {
                ordre = ''
            }
            console.log(categorie);
            console.log(format);
            console.log(ordre);
            $.ajax({
                url: './wp-admin/admin-ajax.php',
                data: {
                    action: 'filter',
                    categorie: categorie,
                    format: format,
                    ordre: ordre,
                },
                dataType: 'html',//json
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
   
    /*class lightbox {
        static init () {
           $('.fullscreen').each($('.fullscreen').on('click',function(e){
            e.preventDefault();
            new lightbox($(this).data('id'))
           }));
        }

        constructor (url) {
            const element = this.buildDOM(url)
            document.body.appendChild(element)
        }

        buildDOM (url) {
            const dom = document.createElement('div')
            dom.classList.add('lightbox')
            dom.innerHTML = ''
        }
    }

    lightbox.init()
    /*<div class="lightbox">
        <div class="lightbox__button lightbox__button-close"></div>
        <div class="lightbox__button lightbox__button-prev"></div>
        <div class="lightbox__button lightbox__button-next"></div>
        <div class="lightbox__content">
            <img src="https://picsum.photos/600/600" alt="">
        </div>
    </div>*/
});
