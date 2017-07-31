
$(document).ready(function($) {
  // -------------menu click function---------------------------------
  $('.menu_icon').click(function () {
    $(".menu_bar").width("250px");
    $(".menu_icon").css('display','none');
    $(".main_body").animate({
        'marginLeft' : "+=250px" //moves right
        });
  	});
  $('#cls_bt').click(function () {
    $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
	});
  //--------------------login function ---------------------------------
  $('#login_form').click(function()
  	{
  		$('.login_form').slideToggle("slow");
  	});
  $('#calatog_list').click (function(){
     $('.calatog_list').slideToggle("slow");
  });
  //-------------------catalog click function ---------------------------
  $('#Sony').click(function(){
    $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "1"},
    success: function(data) {
      $("#content").html(data);
     }
    });
 // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });
  $('#ASUS').click(function(){
     $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "2"},
    success: function(data) {
      $("#content").html(data);
     }
    });
    // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });
  $('#HTC').click(function(){
     $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "3"},
    success: function(data) {
      $("#content").html(data);
     }
    });
     // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });
  $('#Xiaomi').click(function(){
     $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "4"},
    success: function(data) {
      $("#content").html(data);
     }
    });
     // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });

  $('#Iphone').click(function(){
     $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "5"},
    success: function(data) {
      $("#content").html(data);
     }
    });
     // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });

  $('#Samsung').click(function(){
     $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "6"},
    success: function(data) {
      $("#content").html(data);
     }
    });
     // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });

  $('#OPPO').click(function(){
     $.ajax({
    url: 'function/functions.php',
    type: 'post',
    data: { "cata_id": "7"},
    success: function(data) {
      $("#content").html(data);
     }
    });
     // close when click
     $(".menu_bar").width("0px");
    $(".menu_icon").css('display','block');
    $(".main_body").animate({
        'marginLeft' : "-=250px" //moves left
        });
    //end
  });
 // index_logo click
 // -----------------------------------------------
 $('#Sony_index').click(function(){
   $.ajax({
   url: 'function/functions.php',
   type: 'post',
   data: { "cata_id": "1"},
   success: function(data) {
     $("#content").html(data);
    }
   });
 });
 $('#Iphone_index').click(function(){
   $.ajax({
   url: 'function/functions.php',
   type: 'post',
   data: { "cata_id": "5"},
   success: function(data) {
     $("#content").html(data);
    }
   });
    });
 $('#HTC_index').click(function(){
   $.ajax({
   url: 'function/functions.php',
   type: 'post',
   data: { "cata_id": "3"},
   success: function(data) {
     $("#content").html(data);
    }
   });
    });
   $('#Samsung_index').click(function(){
     $.ajax({
     url: 'function/functions.php',
     type: 'post',
     data: { "cata_id": "6"},
     success: function(data) {
       $("#content").html(data);
      }
     });
      });
   $('#OPPO_index').click(function(){
     $.ajax({
     url: 'function/functions.php',
     type: 'post',
     data: { "cata_id": "7"},
     success: function(data) {
       $("#content").html(data);
      }
     });
      });
   $('#ASUS_index').click(function(){
     $.ajax({
     url: 'function/functions.php',
     type: 'post',
     data: { "cata_id": "2"},
     success: function(data) {
       $("#content").html(data);
      }
     });
      });
   $('#Xiaomi_index').click(function(){
     $.ajax({
     url: 'function/functions.php',
     type: 'post',
     data: { "cata_id": "4"},
     success: function(data) {
       $("#content").html(data);
      }
     });
   });

  $("#home").click(function() {
   document.location.href='index.php' ;
});
$("#home_in").click(function() {
 document.location.href='../index.php' ;
});
  $('#test').click(function(){
    // $('#content').css('display','none');
    $('#layout').slideToggle();
   // console.log("Hi");
  });
  $('#register_bt_clr').click(function() {
    /* Act on the event */
    $('#regis_form').reset();
  });
  $('#register_bt').click(function() {
    /* Act on the event */
    window.location = 'function/register.php'
  });


// order function
// -----------------------------------------------


});

function test(name){
  var pro_id;
  pro_id = name;
  // alert(pro_id);
  jQuery.ajax({
        url: "function/order.php",
        type: "post",
        data: { pro_id: pro_id},
        success: function(data) {
          alert("Add to cart success");
          jQuery("#checked").html(data);
         }
       });
}
