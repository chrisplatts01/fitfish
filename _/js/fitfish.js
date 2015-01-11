$(function() {

  // -----------------------------------
  // Randomize home page background
  // -----------------------------------
  var rand = Math.floor(Math.random()*6);
  var bg = "bg" + rand;

  $("#home-page").addClass(bg);

  // -----------------------------------
  // Toggle navigation submenus
  // -----------------------------------
  var $expandable = $('#main-nav').find('li.expandable');

  $expandable.click(function () {
    if ($(this).hasClass('expanded')) {
      $expandable.removeClass('expanded')
    } else {
      $expandable.removeClass('expanded')
      $(this).addClass('expanded');
    }
  });


  // -----------------------------------
  // Meet the team
  // -----------------------------------

  // Show only first team member
  $(".team-member").hide();
  $(".team-member#gaynor-burton").show();
  $(".top").hide();
  $("#related-content-1 blockquote").hide();
  $("#related-content-1 blockquote#gaynor-burton-quote").show();

  // Show selected team member
  $(".thumbs a").click(function(){
    var selected_member = $(this).attr("href");
    var selected_quote = selected_member + "-quote";

    $(".team-member").hide();
    $(selected_member).show();

    $("#related-content-1 blockquote").hide();
    $(selected_quote).show();

    return false;
  });

});
