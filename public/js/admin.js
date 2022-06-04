var adminNavToggled = 0;


var locked = false;

function unlock () {
    locked = false;
}



$('#admin_expand').on('click',function (e) { 
    e.preventDefault();
    if (!locked) {
        locked = true;
    if(!adminNavToggled) {
        $('#admin_sidebar').css('width','160px');
        $('#admin_expand').text('menu_open');
        setTimeout(() => {
            $('.toggle-display').fadeIn();
        }, 1000);
        setTimeout(unlock, 1000);
        adminNavToggled = 1;
    } else {
        $('#admin_sidebar').css('width','60px');
        $('#admin_expand').text('menu');
        $('.toggle-display').fadeOut();
        setTimeout(unlock, 1000);
        adminNavToggled = 0;
    }
    }
    
});