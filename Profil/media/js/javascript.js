$(document).ready(function() {

		function visibleopa(element) {
        	/* Check the location of each desired element */
        	$(element).each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},800);
                    
            }
       
       		});
        }

        function visibleright(element) {
        	/* Check the location of each desired element */
        	$(element).each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'right':'0'},500);
                    
            }
       
       		});
        }

	 /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
    	visibleopa("#vorteile ul li");    
    	visibleright("#vorteile .tria a");
    
    });
         
	$("#header a img.menu").click(function( event ) {
		event.preventDefault();
		$("ul.mobile").fadeIn();
	})

	$("li.prevent").click(function( event ) {
		event.preventDefault();
	})

	$("li.closemenu").click(function( event ) {
		event.preventDefault();
		$("ul.mobile").fadeOut();
	})

    var counter = 0;

    $("#meinung .rightc").click(function( event ) {
        event.preventDefault();
        counter++;
        refresh(counter);
    })

    $("#meinung .leftc").click(function( event ) {
        event.preventDefault();
        counter--;
        refresh(counter);
    })

    function refresh(x) {
    if(x == 3) {
        $("#meinung ul li:nth-child(1)").show();
        $("#meinung ul li:nth-child(2)").hide();
        $("#meinung ul li:nth-child(3)").hide();
        // setTimeout(function(){ refresh(1) }, 300);
    }
    if(x == 2) {
        $("#meinung ul li:nth-child(3)").show();
        $("#meinung ul li:nth-child(2)").hide();
        $("#meinung ul li:nth-child(1)").hide();
        // setTimeout(function(){ refresh(2) }, 300);
    }
    if(x == 1) {
        $("#meinung ul li:nth-child(2)").show();
        $("#meinung ul li:nth-child(3)").hide();
        $("#meinung ul li:nth-child(1)").hide();
        // setTimeout(function(){ refresh(1) }, 300);
    }
    if(x <= 0) {
        counter = 3;
        $("#meinung ul li:nth-child(1)").show();
        $("#meinung ul li:nth-child(2)").hide();
        $("#meinung ul li:nth-child(3)").hide();
        // setTimeout(function(){ refresh(1) }, 300);
    }
    if(x > 3) {
        counter = 1;
        $("#meinung ul li:nth-child(2)").show();
        $("#meinung ul li:nth-child(1)").hide();
        $("#meinung ul li:nth-child(3)").hide();
        // setTimeout(function(){ refresh(1) }, 300);
    }
}

    // var products = $('.texting').val();

    var pcounter = 0;

    $(".gone a").click(function( event ) {
        pcounter ++;
        event.preventDefault();
        pnames(pcounter);
    })

    function pnames(x) {
        if (x % 2 == 0) {
            $(".texting").val("");
            $(".gone a").css("background-color","#f4f4f4");
            $(".gone a").css("color","#161616");
        } else {
            $(".texting").val("Diodenlaser Epil8");
            $(".gone a").css("background-color","#db2d26");
            $(".gone a").css("color","white");
        }
    }



    var zcounter = 2;

    var zone = 0;
    var ztwo = 0;
    var zthree = 0;

    $(".zone a").click(function( event ) {
        zcounter = 3;
        zone++;
        event.preventDefault();
        znames(zcounter, zone);
    })
    $(".ztwo a").click(function( event ) {
        zcounter = 5;
        ztwo++;
        event.preventDefault();
        znames(zcounter, ztwo);
    })
    $(".zthree a").click(function( event ) {
        zcounter = 7;
        zthree++;
        event.preventDefault();
        znames(zcounter, zthree);
    })


    function znames(x, y) {
        if (x == 3) {
            if (y % 2 == 0) {
                $(".textingzmglk").val("");
                ztwo = 0; zthree = 0;
                $(".zone a").css("background-color","#f4f4f4");$(".zone a").css("color","#161616");
                $(".ztwo a").css("background-color","#f4f4f4");$(".ztwo a").css("color","#161616");
                $(".zthree a").css("background-color","#f4f4f4");$(".zthree a").css("color","#161616");
                $(".inforesp").html("");
            } else {
                ztwo = 0; zthree = 0;
                $(".textingzmglk").val("Finanzierung");
                $(".zone a").css("background-color","#db2d26");
                $(".zone a").css("color","white");
                $(".ztwo a").css("background-color","#f4f4f4");$(".ztwo a").css("color","#161616");
                $(".zthree a").css("background-color","#f4f4f4");$(".zthree a").css("color","#161616");
                $(".inforesp").html("Finanzierung. Genauere Infos. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.");
            }
        }
        if (x == 5) {
            if (y % 2 == 0) {
                $(".textingzmglk").val("");
                zone = 0; zthree = 0;
                $(".zone a").css("background-color","#f4f4f4");$(".zone a").css("color","#161616");
                $(".ztwo a").css("background-color","#f4f4f4");$(".ztwo a").css("color","#161616");
                $(".zthree a").css("background-color","#f4f4f4");$(".zthree a").css("color","#161616");
                $(".inforesp").html("");
            } else {
                zone = 0; zthree = 0;
                $(".textingzmglk").val("Leasing");
                $(".ztwo a").css("background-color","#db2d26");
                $(".ztwo a").css("color","white");
                $(".zone a").css("background-color","#f4f4f4");$(".zone a").css("color","#161616");
                $(".zthree a").css("background-color","#f4f4f4");$(".zthree a").css("color","#161616");
                $(".inforesp").html("Leasing. Genauere Infos. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.");
            }
        }
        if (x == 7) {
            if (y % 2 == 0) {
                $(".textingzmglk").val("");
                ztwo = 0; ztwo = 0;
                $(".zone a").css("background-color","#f4f4f4");$(".zone a").css("color","#161616");
                $(".ztwo a").css("background-color","#f4f4f4");$(".ztwo a").css("color","#161616");
                $(".zthree a").css("background-color","#f4f4f4");$(".zthree a").css("color","#161616");
                $(".inforesp").html("");
            } else {
                ztwo = 0; ztwo = 0;
                $(".textingzmglk").val("Bar");
                $(".zthree a").css("background-color","#db2d26");
                $(".zthree a").css("color","white");
                $(".zone a").css("background-color","#f4f4f4");$(".zone a").css("color","#161616");
                $(".ztwo a").css("background-color","#f4f4f4");$(".ztwo a").css("color","#161616");
                $(".inforesp").html("Bar. Genauere Infos. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.");
            }
        }
    }



    var kcounter = 2;

    var kone = 0;
    var ktwo = 0;

    $(".kone a").click(function( event ) {
        kcounter = 3;
        kone++;
        event.preventDefault();
        knames(kcounter, kone);
    })
    $(".ktwo a").click(function( event ) {
        kcounter = 5;
        ktwo++;
        event.preventDefault();
        knames(kcounter, ktwo);
    })


    function knames(x, y) {
        if (x == 3) {
            if (y % 2 == 0) {
                $(".textingkont").val("");
                ktwo = 0;
                $(".kone a").css("background-color","#f4f4f4");$(".kone a").css("color","#161616");
                $(".ktwo a").css("background-color","#f4f4f4");$(".ktwo a").css("color","#161616");
            } else {
                ktwo = 0;
                $(".textingkont").val("Interesse am Service");
                $(".kone a").css("background-color","#db2d26");
                $(".kone a").css("color","white");
                $(".ktwo a").css("background-color","#f4f4f4");$(".ktwo a").css("color","#161616");
            }
        }
        if (x == 5) {
            if (y % 2 == 0) {
                $(".textingkont").val("");
                kone = 0;
                $(".kone a").css("background-color","#f4f4f4");$(".kone a").css("color","#161616");
                $(".ktwo a").css("background-color","#f4f4f4");$(".ktwo a").css("color","#161616");
            } else {
                kone = 0;
                $(".textingkont").val("Sonstiges");
                $(".ktwo a").css("background-color","#db2d26");
                $(".ktwo a").css("color","white");
                $(".kone a").css("background-color","#f4f4f4");$(".kone a").css("color","#161616");
            }
        }
    }




    $('#finanz form').ajaxForm({
        success: function (responseText, statusText, xhr, $form) {
            if (responseText == 'ok') {
                    $('#finanz form input.submit').hide();
                    $('#finanz form p.responsive').html('Ihre Email wurde erfolgreich versendet.').fadeIn(300);
                } else if (responseText == 'email falsch') {
                    $('#finanz form p.responsive').html('Bitte füllen Sie alle mit * markierten Felder korrekt aus.').fadeIn(300);
                } else {
                    $('#finanz form p.responsive').html('Bitte alle Felder ausfüllen.').fadeIn(300);
                } 
        }
     });

});