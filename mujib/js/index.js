$(document).ready(function () {

  //Scroll to Sections
  $(document).on('click', '.nav-item .nav-link', function (e) {
    moveToElements(e, this)
  });

  $(document).on('click', '.navbar-brand', function (e) {
    moveToElements(e, this)
  });

  function moveToElements(e, ele) {
    e.preventDefault();
    $('html, body').stop().animate({
        scrollTop: $($(ele).attr('href')).offset().top
    }, 500, 'linear');
    if($(ele).hasClass('menu-opend')) {
    $(".navbar-toggler").click().removeClass('close-toggler');
    }
  }

  //Change Class Active To Nav Links When Scroll
  $(window).on("scroll", function () {
    let navLinks = document.querySelectorAll(".nav-link"),
        fromTop  = this.scrollY + 40;
    navLinks.forEach(function (link) {
        let section = document.querySelector(link.hash);
        if(section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop || section.offsetTop <= fromTop && fromTop < 500) {
            //console.log(section);
            link.parentElement.classList.add("active");
        } else {
            link.parentElement.classList.remove("active");
        }
    })    
  });

  //Toggle Active Class for Indestry Section =============
  $(".categories .cat").on("click", function () {
    $(this).siblings().removeClass("active");
    $(this).addClass("active");
  });

   // Change The Current GIF According to The Current Indestry Selector
   $('.categories li.cat').on('click', function () {
    var currChat = $(this).attr('data-chat');

    $('.chat__screen').hide();

    $('.chat__screen img').removeClass('show');

    $(currChat).delay(500).fadeIn();

    displayChats(currChat);
    
    });

    function displayChats(currChat) {
        var elements = document.querySelectorAll(currChat + ' img');
        var index = 0;
        elements[index].classList.add('show');
        var swapImgs = setInterval(function () {
            if(index < elements.length) {
                    // elements[index].style.display = 'block';
                    index ++;
                    elements[index].classList.add('show');
                } else {
                    index = 0;
                    clearInterval(swapImgs);
                }
        }, 1500);
    }

    // Fire the First Chat When Scroll To Bussiness Case Section
    displayChats('.display__finance');

    // $(window).on('scroll', function () {
    //     var offsetBussiness = Math.floor($('#businessCase').offset().top);
    //     var scrollTopBody = $('html, body').scrollTop();
    //     if(scrollTopBody >= offsetBussiness - 50) {
    //         displayChats('.display__finance');
    //     }
    // });

    // Show FAQ Function =====================
    function showFAQ() {
      if($(this).find(".fa-play").hasClass("rotate-play-btn")) {
          $(".card-header").removeClass("collapse-style");
          $(".open-answer .fa-play").removeClass("rotate-play-btn");
      } else {
          $(".card-header").removeClass("collapse-style");
          $(this).addClass("collapse-style");
          $(".open-answer .fa-play").removeClass("rotate-play-btn");
          $(this).find(".fa-play").addClass("rotate-play-btn");
      }
  }

  // Fire Show FAQ Function On Click ===============
  var faqIndex = 1;
  var faqElement = document.querySelectorAll('.card-header')[faqIndex];
  var changeFAQ = setInterval(autoToggleFAQ, 4000);

  function autoToggleFAQ () {
      faqElement = document.querySelectorAll('.card-header')[faqIndex];
      faqElement.click(showFAQ);
      faqIndex == 3 ? faqIndex = 0 : faqIndex++;
  }

  // Fire Show FAQ Function On Click ===
  $(".card-header").on({
      "click": showFAQ,
      "mouseenter": function () {clearInterval(changeFAQ)},
      "mouseleave": function () {changeFAQ = setInterval(autoToggleFAQ, 4000);}
  });

  // FAQ Toggle Vector =======
  $("#accordion-question li").on("click", function () {

      $(".imageShow div").removeClass("currentImgShow");

      $($(this).attr("data-faq")).addClass("currentImgShow");
  });

   // Animate Chatbot Icon ================
   setInterval(function () {$('.chatbotIcon').toggleClass('tadaMe');}, 2500);

});