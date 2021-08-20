/*
 *******************************************************/

/* HTML document is loaded. DOM is ready. 
-----------------------------------------*/
$(document).ready(function(){

  //setInterval(clock, 1000);

  /*Clock*/


	/* Mobile menu */
	$('.mobile-menu-icon').click(function(){
		$('.templatemo-left-nav').slideToggle();				
	});

	/* Close the widget when clicked on close button */
	$('.priori-content-widget .fa-times').click(function(){
		$(this).parent().slideUp(function(){
			$(this).hide();
		});
	});
	
	/*DropDown menu*/
	$('.mdb-select').materialSelect();

  var myModal = document.getElementById('myModal');
  var myInput = document.getElementById('myInput');

  myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
  });


	$('select').wrap('<div class="select_wrapper"></div>');
  $('select').parent().prepend('<span>'+ $(this).find(':selected').text() +'</span>');
  $('select').parent().children('span').width($('select').width());	
  $('select').css('display', 'none');					
  $('select').parent().append('<ul class="select_inner"></ul>');
  $('select').children().each(function(){
      $('select').parent().children('.select_inner').append(
          '<li id='+$(this).val()+'>'+$(this).text()+'</li>'
      );
  });

  $('select').parent().find('li').on('click', function (){
    var cur = $(this).attr('id');
    $('select').parent().children('span').text($(this).text());
    $('select').children().removeAttr('selected');
    $('select').children('[value='+cur+']').attr('selected','selected');					
    console.log($('select').children('[value='+cur+']').text());
  });
  $('select').parent().on('click', function (){
    $(this).find('ul').slideToggle('fast');
  });
});

function clearFields(editForm) {

  $(editForm).find(':input').each(function() {
      switch(this.type) {
          case 'password':
          case 'select-multiple':
          case 'select-one':
          case 'text':
          case 'date':
          case 'textarea':
              $(this).val('');
              break;
          case 'checkbox':
          case 'radio':
              this.checked = false;
      }
  });

}

function resetFields(editForm){
  $(editForm).find(':input').each(function() {
    switch(this.type) {
        case 'password':
        case 'select-multiple':
        case 'select-one':
        case 'text':
        case 'date':
        case 'textarea':
            $(this).reset();
            break;
        case 'checkbox':
        case 'radio':
            this.checked = false;
    }
  });
}

function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  setTimeout(startTime, 1000);

  if(h == 02 && m == 20 && s == 01){
    location.reload();
  }
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }  // add zero in front of numbers < 10
  return i;
}