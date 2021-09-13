        
$("#mycarousel").show();
$("#mycarousel").carouFredSel({
    circular: true,
    infinite: false,
    responsive: true,
    auto: false,
    prev: { 
        button: "#mycarousel_prev",
        key: "left"
    },
    next:{ 
        button: "#mycarousel_next",
        key: "right"
    },
    scroll:{
        items :5,
        duration : 1000

    },
    items:{
        visible:5
    }
    ,
    pagination: "#mycarousel_pag"
});
