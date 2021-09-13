var baseUri = $('base').attr('href').replace('/app/','');
function mapInit(lat,lon) {          
    initMap(lat,lon); 
    /*LAYOUT ADJUST*/
    $('#map').height(  $(window).height() - ( $('#top_wrap').height()   ) - 20);
    if($(window).height() <= 900){
        $('#map').height(450)    
    }
    $(window).resize(function() {
        $('#map').height(  $(window).height() - ( $('#top_wrap').height()   ) - 20);
        if($(window).height() <= 900){
            $('#map').height(450)    
        }        
        if(map){
            map.setCenter(lat, lng);
        }
    })
    /*END LAYOUT ADJUST*/
    /*ZOOM CONTROL*/
    var zoomAtual = 8;
    $('#zoomIn').on('click', function() {
        zoomAtual++;
        if(zoomAtual<21){
            var posZoom = zoomAtual*10;
            $("#zoom_slider").animate({
                marginLeft: posZoom
            }, 150);
        }else{
            zoomAtual = 21;
        }
        map.zoomIn(1);
    });
    $('#zoomOut').on('click', function() {
        zoomAtual--;
        if(zoomAtual>0){
            var posZoom = zoomAtual*10;
            $("#zoom_slider").animate({
                marginLeft: posZoom
            }, 150);
        }else{
            zoomAtual = 0;
        }
        map.zoomOut(1);
    });    
    /*END ZOOM CONTROL*/
    getMarkers();
}

function mapReload(lat,lon) {          
    initMap(lat,lon); 
    /*LAYOUT ADJUST*/
    $('#map').height(  $(window).height() - ( $('#top_wrap').height()   ) - 20);
    if($(window).height() <= 900){
        $('#map').height(450)    
    }
    $(window).resize(function() {
        $('#map').height(  $(window).height() - ( $('#top_wrap').height()   ) - 20);
        if($(window).height() <= 900){
            $('#map').height(450)    
        }        
        if(map){
            map.setCenter(lat, lng);
        }
    })
    /*END LAYOUT ADJUST*/
    /*ZOOM CONTROL*/
    var zoomAtual = 8;
    $('#zoomIn').on('click', function() {
        zoomAtual++;
        if(zoomAtual<21){
            var posZoom = zoomAtual*10;
            $("#zoom_slider").animate({
                marginLeft: posZoom
            }, 150);
        }else{
            zoomAtual = 21;
        }
        map.zoomIn(1);
    });
    $('#zoomOut').on('click', function() {
        zoomAtual--;
        if(zoomAtual>0){
            var posZoom = zoomAtual*10;
            $("#zoom_slider").animate({
                marginLeft: posZoom
            }, 150);
        }else{
            zoomAtual = 0;
        }
        map.zoomOut(1);
    });    
    /*END ZOOM CONTROL*/

}


 var url = baseUri + '/mapa/pontos/'
function getMarkers() {    
    $.post(url,{},function(data){
        if(data != 'null'){
            var data = $.parseJSON(data);
            $.each(data.rs,function(k,v){
                addMarker(v)
            })
            
                mcOptions = {styles: [{
                            height: 53,
                            url: "images/icons/m1.png",
                            width: 53
                        },
                        {
                            height: 56,
                            url: "images/icons/m2.png",
                            width: 56
                        },
                        {
                            height: 66,
                            url: "images/icons/m3.png",
                            width: 66
                        },
                        {
                            height: 78,
                            url: "images/icons/m4.png",
                            width: 78
                        },
                        {
                            height: 90,
                            url: "images/icons/m5.png",
                            width: 90
                        }],
                    maxZoom: 12,
                    gridSize: 30
                }
                
            setTimeout(function(){
                markerClusterer = new MarkerClusterer(map.map, mymarkers,mcOptions);
            },1500)            
        }
    })
}
