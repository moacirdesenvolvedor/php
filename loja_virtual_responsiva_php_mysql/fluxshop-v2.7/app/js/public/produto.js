$(function () {
    var baseUri = $('base').attr('href').replace('/app/', '');
    //lightbox fotos
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });


    $('#btn-frete-calculo-produto').on('click', function () {
        $('#btn-frete-calculo-produto').attr('disabled', 'disabled');
        var item_id = $(this).data('produto');
        var url = baseUri + '/carrinho/adicionar/' + item_id + '/';
        $.post(url, {
            attr: '',
            id: item_id
        }, function (data) {
            var cart_id = data;
            var $btncalc = $(this);
            var cep = $.trim($('#frete_cep').val());
            if (cep.length <= 8) {
                return false;
            }
            freteReload(0);//reset valor frete
            $('#frete_cep').removeClass('invalid');
            $btncalc.button('loading');
            var url = baseUri + '/cep/getcep/';
            $.post(url, {cep: cep}, function (data) {
                if (data != -1) {
                    data = $.parseJSON(data);
                    data = data.rs[0];
                    var datacep = {};
                    if (data.cep_unico == 0) {
                        datacep = {
                            cep: cep,
                            uf: data.uf,
                            cidade: data.cidade,
                            bairro: data.bairro
                        };
                    } else {
                        datacep = {
                            cep: cep,
                            uf: data.uf,
                            cidade: data.cidade,
                            bairro: data.bairro
                        };
                    }
                    freteCorreio(cep, datacep);
                } else {
                    $('#btn-frete-calculo-produto').removeAttr('disabled');
                    $('#frete_result_pac').html('');
                    var msg = '<p class="font-12">Confirme seu cep e tente novamente.</p>';
                    var tit = '<p class="font-12"><b>Cep n??o encontrado!</b></p>';
                    addPop('frete_cep', tit, msg, 'bottom');
                    $('#frete_cep').addClass('invalid').focus();
                }
                //remove do carrinho
                setTimeout(function () {
                    var url = baseUri + '/carrinho/remove_calc/' + cart_id + '/';
                    $.post(url, {}, function (rs) {
                        $('#btn-frete-calculo-produto').removeAttr('disabled');
                    });
                }, 3000);
            });
        });
    });

    //adicionar ao carrinho
    $('.addtocart').on('click', function () {
        var item_id = $(this).attr('id');
        var attr_selecteds = true;
        $(".attr_sel").each(function () {
            if ($(this).selectpicker('val') == "") {
                addPopProd($(this).attr('id'), '' + $(this).attr('desc'), 'Selecione uma op&#231;&#227;o para continuar.', 'top');
                attr_selecteds = false;
                return false;
            } else {
                $('.sel_' + $(this).attr('id')).popover('hide');
            }
        });
        if (attr_selecteds == false) {
            return false;
        }
        var attr_data = $('#fattr').serializeArray();
        var url = baseUri + '/carrinho/adicionar/' + item_id + '/';
        $.post(url, {
            attr: attr_data,
            id: item_id
        }, function (data) {
            window.location = baseUri + '/carrinho/';
        });
    });
    setHeigthCarousel();
    setRating();
    setRatingPequeno();
    btnEnviarComentario();
});



function btnEnviarComentario()
{   //adicionar ao carrinho
    $('#btnGravarComent').on('click', function () {
        var nota = ($('#rating-input').val());
        var comentario = $.trim($('#comentario').val());
        /*
         if(comentario == ""){
         $('#comentario').focus();
         $.gritter.add({
         title: 'Campo obrigat??rio',
         text: 'Voc?? precisa preencher o campo coment??rio!',
         class_name: 'danger',
         before_open: function () {
         if ($('.gritter-item-wrapper').length == 1) {
         // prevents new gritter 
         return false;
         }
         }
         });            
         return false;
         }
         */
        var idprod = ($('#id_prod').val());
        var url = baseUri + '/produto/classificar/';
        $.post(url, {
            comentario: comentario,
            nota: nota,
            idprod: idprod
        }, function (data) {
            $.gritter.add({
                title: 'Procedimento Realizado',
                text: 'Coment??rio enviado com sucesso! Aguarde aprova????o',
                class_name: 'success',
                before_open: function () {
                    if ($('.gritter-item-wrapper').length == 1) {
                        return false;
                    }
                }
            });
            ($('#comentario').val(''));
            $('#btnGravarComent').addClass('hide');
        });
    });
}
function setRating()
{
    $('#rating-input').rating({
        language: 'pt',
        min: 0,
        max: 5,
        step: 0,
        size: 'md',
        defaultCaption: 'N??o avaliado',
        showClear: true,
        showCaption: true
    });
    $('#rating-input-travado').rating({
        language: 'pt',
        min: 0,
        max: 5,
        step: 0,
        size: 'md',
        defaultCaption: 'N??o avaliado',
        showClear: true,
        showCaption: true
    });
}

function setRatingPequeno()
{
    $('.rating-input-pequeno').rating({
        language: 'pt',
        min: 0,
        max: 5,
        step: 0,
        size: 'xs',
        defaultCaption: 'N??o avaliado',
        showClear: false,
        showCaption: false
    });
}


function setHeigthCarousel() {
    if ($('.amazingcarousel-image IMG').length <= 1) {
        $('.amazingcarousel-list-container').height('260');
        $('#amazingcarousel-container-10').css('margin-top', '-30px');
        $('#amazingcarousel-container-10').css('margin-left', '-35px');
    }
    $(window).on('load', function () {
        if ($('.amazingcarousel-image IMG').length <= 1) {
            $('.amazingcarousel-list-container').height('260');
            $('#amazingcarousel-container-10').css('margin-top', '-30px');
            $('#amazingcarousel-container-10').css('margin-left', '-35px');
        }
    });

    $('.attr_sel').on('change', function () {
        $('.sel_' + $(this).attr('id')).popover('hide');
    });
}

function addPopProd(elm, title, msg, pos) {
    var  msg = '<span style="color:black"> '+msg+'</span>'
    $('#' + elm).popover({
        placement: pos,
        title: '&nbsp; ' + title,
        html: true,
        content: msg
    });
    $('#' + elm).popover('show');
}


;
(function (window, $, undefined) {
    var conf = {
        center: true,
        backgroundControl: false
    };
    var cache = {
        $carouselContainer: $('.thumbnails-carousel').parent(),
        $thumbnailsLi: $('.thumbnails-carousel li'),
        $controls: $('.thumbnails-carousel').parent().find('.carousel-control')
    };
    function init() {
        cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
        cache.$thumbnailsLi.first().addClass('active-thumbnail');

        if (!conf.backgroundControl) {
            cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
        } else {
            cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
        }

        if (conf.center) {
            cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
        }
    }
    function refreshOpacities(domEl) {
        cache.$thumbnailsLi.removeClass('active-thumbnail');
        cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
    }
    function bindUiActions() {
        cache.$carouselContainer.on('slide.bs.carousel', function (e) {
            refreshOpacities(e.relatedTarget);
        });
        cache.$thumbnailsLi.click(function () {
            cache.$carouselContainer.carousel($(this).index());
        });
    }
    $.fn.thumbnailsCarousel = function (options) {
        conf = $.extend(conf, options);
        init();
        bindUiActions();
        return this;
    }
})(window, jQuery);
$('.thumbnails-carousel').thumbnailsCarousel();