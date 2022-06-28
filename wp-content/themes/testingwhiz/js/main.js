jQuery(document).ready(function(){
  wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: false, // default
    live: true // default
  })
  wow.init();
  jQuery('.search-icon .overlay').click(function(){
     jQuery('.search-icon').toggleClass('show');
  }); 
  // jQuery('.icon-box .action .readmore').click(function(){
  //   jQuery(this).parents('.action').siblings('.description').toggleClass('show-text')
  // });
  // jQuery('.product-feature-tab ul li:first-child').addClass('active');
  // jQuery('.product-feature-tab ul li').click(function(){
  //   jQuery(this).addClass('active').siblings('li').removeClass('active');
  // });

  jQuery('.navbar-toggler').click(function(){
    jQuery('html').toggleClass('overflow-h');
  });
  

  var sectionIds = jQuery('.product-feature-tab a');

  jQuery(document).scroll(function(){
      sectionIds.each(function(){
          var container = jQuery(this).attr('href');
          var containerOffset = jQuery(container).offset().top;
          var containerHeight = jQuery(container).outerHeight();
          var containerBottom = containerOffset + containerHeight;
          var scrollPosition = jQuery(document).scrollTop() + 180;
  
          if(scrollPosition < containerBottom - 20 && scrollPosition >= containerOffset - 20){
              jQuery(this).addClass('active');
          } else{
              jQuery(this).removeClass('active');
          }
      });
  });  
  jQuery(function() {
    jQuery('a[href*=\\#]:not([href=\\#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
  && location.hostname == this.hostname) {
  
        var target = jQuery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          jQuery('html,body').animate({
            scrollTop: target.offset().top - 185 //offsets for fixed header
          }, 300);
          return false;
        }
      }
    });
    //Executed on page load with URL containing an anchor tag.
    if(jQuery(location.href.split("#")[1])) {
        var target = jQuery('#'+location.href.split("#")[1]);
        if (target.length) {
          jQuery('html,body').animate({
            scrollTop: target.offset().top - 185 //offset height of header here too.
          },300 );
          return false;
        }
      }
  });

  jQuery(window).scroll(function() {
    var sticky = jQuery('header .navbar'),
      scroll = jQuery(window).scrollTop();
  
    if (scroll >= 48) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });

});

function AddReadMore() {
  //This limit you can set after how much characters you want to show Read More.
  var carLmt = 20;
  // Text to show when text is collapsed
  var readMoreTxt = " Read More";
  // Text to show when text is expanded
  var readLessTxt = " Read Less";
  
  //Traverse all selectors with this class and manupulate HTML part to show Read More
  jQuery(".icon-box .description").each(function() {
    
    //alert(words.length);
      if (jQuery(this).find(".firstSec").length)
          return;

      var allstr = jQuery(this).text().split(" ");
      var firstSet = '';
      var secdHalf = '';
        for (var i=0;i<allstr.length;i++)
        {
          if(i < carLmt){
            firstSet += allstr[i]+' ';
          } else {
            secdHalf += allstr[i]+' ';
          }
        }        
          
        if(secdHalf != ''){
            var strtoadd = firstSet + "<span class='dot'>...</span>" + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
         }
         else{
          var strtoadd = firstSet;
        
         }
          jQuery(this).html(strtoadd);
         
  });
  //Read More and Read Less Click Event binding
  jQuery(document).on("click", ".readMore, .readLess", function() {
      jQuery(this).closest(".icon-box .description").toggleClass("showlesscontent showmorecontent");
  });
}
jQuery(function() {
  //Calling function after Page Load
  AddReadMore();
}); 



jQuery(function() {

  //cache a reference to the tabs
  var tabs = jQuery('.sygnature-type-content .nav-tabs li .nav-link');

  //on click to tab, turn it on, and turn previously-on tab off
  tabs.click(function() { jQuery(this).addClass('active').parent('li').siblings('li').children('.active').removeClass('active'); });

  //auto-rotate every 5 seconds
  setInterval(function() {

          //get currently-on tab
      var onTab = tabs.filter('.active');

          //click either next tab, if exists, else first one
      var nextTab = onTab.index() < tabs.length-1 ? onTab.next() : tabs.first();
      nextTab.click();
  }, 5000);
});

// function solution(){
//   var windowWidth = jQuery(window).width();
//   var secWidth = jQuery('.solution .tab-content').width();
//   var marginSet = (secWidth - windowWidth) / 2;
//   jQuery('.solution .tab-content').css({marginLeft: marginSet, marginRight: marginSet});
// }

jQuery(document).ready(function(){
  jQuery(".accordion_section.faq-accordian:nth-child(2) .accordion-content-item:first-child").find('.accordion-collapse').addClass("show");
  jQuery(".accordion_section.faq-accordian:nth-child(2) .accordion-content-item:first-child").find('.accordion-button').removeClass("collapsed");

  //solution();

  setTimeout(() => { jQuery('#contact_us').addClass('shake-btn') }, 400); 
      jQuery('#contact_us').addClass('shake-btn')
     
      setTimeout(function() {
        jQuery('#contact_us').removeClass('shake-btn')
      }, 10000);

      jQuery('#primary-menu-list > .menu-item-has-children > a').click(function(){
        jQuery(this).parent('li').toggleClass('show-menu');
      });
      jQuery('.loader').fadeOut();

      jQuery('input[name=phrase]').change(function() { 
          if(jQuery('input[name=phrase]').val().length > 0){
            jQuery('.search-icon .overlay').hide();
          }
          else{
            jQuery('.search-icon .overlay').show();
          }
      });
      jQuery('.testimonials h2 a').attr("href","#");
      jQuery('.testimonials h2 a').attr("href","#");

       
  });
// jQuery(window).on('resize', function(){
//   solution();
// });

jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();

  if (scroll >= 300) {
      jQuery('#contact_us').addClass('shake-btn');     
      setTimeout(function() {
        jQuery('#contact_us').removeClass('shake-btn')
      }, 10000);
  } else if(scroll >= 600) {
      jQuery('#contact_us').addClass('shake-btn');     
      setTimeout(function() {
        jQuery('#contact_us').removeClass('shake-btn')
      }, 10000);
  }
  else if(scroll >= 900) {
    jQuery('#contact_us').addClass('shake-btn');     
    setTimeout(function() {
      jQuery('#contact_us').removeClass('shake-btn')
    }, 10000);
}
else if(scroll >= 1200) {
  jQuery('#contact_us').addClass('shake-btn');     
  setTimeout(function() {
    jQuery('#contact_us').removeClass('shake-btn')
  }, 10000);
}
});

    jQuery('.ac-back').click(function(e) {
          e.preventDefault();
          jQuery('.product-feature-tab ul').animate({
            scrollLeft: "+=200px"
          }, "slow");
      });

     jQuery('.ac-fow').click(function(e) {
      e.preventDefault();
      jQuery('.product-feature-tab ul').animate({
        scrollLeft: "-=200px"
      }, "slow");
   });



