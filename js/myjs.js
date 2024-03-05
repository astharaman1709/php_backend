$(document).on('click','ul#mymenu>li>a',function()
{
	$(this).siblings('#down-menu').slideToggle();
	$(this).closest('li').siblings('li').find('#down-menu').slideUp();
})

$(document).on('click','ul#update>li>a',function()
{
  $(this).siblings('#update_list').slideToggle();
  $(this).closest('li').siblings('li').find('#update_list').slideUp();
})


$(document).ready(function(){

	$('.mobilemenu').on('click',function(){
		$('.fadebg').toggleClass('active');
		$('.sidemenu').toggleClass('active');
	})

	$('.fadebg').on('click',function(){
		$('.fadebg').toggleClass('active');
		$('.sidemenu').toggleClass('active');
	})
})



// navbar fixed in scroll
$(document).ready(function(){
  $(window).scroll(function(){
      if($(this).scrollTop() > 20){
          $('.top').addClass('topshodw')
      }else{
          $('.top').removeClass('topshodw')
      }
  });
});

	

$(document).ready(function(){
    $('#search').keyup(function(){
        // Search Text
        var search = $(this).val();

        // Hide all table tbody rows
        $('table tbody tr').hide();

        // Count total search result
        var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

        if(len > 0){
          // Searching text in columns and show match row
          $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
              $(this).closest('tr').show();
          });
        }else{
          $('.notfound').show();
        }
        
    });
   
});