const featureList = { WhiteNavbar: ['login', 'dashboard', 'user-init'], TypingText: ['home'],ServiceSelect:['home'] };


$(window).ready(() => {
    // let featureList = [];

    // expand navbar on toggler pressed
    $("#nav_toggler").click(function () {
        $(this).toggleClass("fa-bars fa-times");
        $("#navbar").toggleClass("expanded");
    });

    // handle ScrollEvent
    let handleScrollEvent = debounce(() => {
        let scrollPos = $(window).scrollTop();
        if (scrollPos > 0) {
            $("#navbar").addClass("scrolled");
            $("#navbar_brand img").attr("src", appData.navbar_brand_img_light_src);
        } else {
            $("#navbar").removeClass("scrolled");
            $("#navbar_brand img").attr("src", appData.navbar_brand_img_dark_src);
        }
    }, 100);

    if (!featureList['WhiteNavbar'].includes(pageName)) {
        handleScrollEvent();
        $(window).scroll(() => handleScrollEvent());
    } else {
        $("#navbar").addClass("scrolled");
        $("#navbar_brand img").attr("src", appData.navbar_brand_img_light_src);
    }

    // handle resize event
    $(window).resize(() => (debounce(() => {
        // const width = $(window).width();
    }, 100))());


    if (featureList['TypingText'].includes(pageName)) {
        var typed = new Typed('.tms_typed', {
            strings: ['Doctors.', 'Nurses.', 'Ambulance Service.'],
            typeSpeed: 200,
            loop: true,
            backDelay: 2000,
            fadeOutDelay: 500,
            cursorChar: '.',
            preStringTyped: (arrayPos, self) => {
                let sliderImg = appData.sliderImg(arrayPos + 1);
                document.querySelector(".header_sec").style.setProperty('--img-url', `url('${sliderImg}')`);
                $(".slider_position_tracker span").removeClass("active").eq(arrayPos).addClass("active");
            },
        });

    }


    $(".select2-selection__arrow")
        .html("<div class='d-flex flex-column justify-content-center h-100'><i class='fas fa-chevron-up'></i><i class='fas fa-chevron-down'></i></div>");

    $(".rating").html(function () {
        let val = $(this).attr("data-value");
        return [..."*****"].map((e, i) => `<i class='fas ${val >= i + 1 ? "active" : ""} fa-star'></i>`).join("");
        // return "HTml"
    });

    $(".faq .faq_answer").toggle();
    $(".faq .faq_question").click(function () {
        $(this).next().slideToggle();
        $(this).parent().find(".faq_toggler i").toggleClass("fa-plus fa-minus");
    });

    $(".faq .faq_toggler").click(function () {
        $(this).parent().find(".faq_question").trigger("click");
    });

    $(".faq .faq_question").eq(0).click();
});
