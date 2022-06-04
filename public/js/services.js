var page = 0;
var menu_id = 1;
var category_id = undefined;
var maxPages = 100;
var locked = false;
var language, gender, age = 18, priceMin, priceMax, minRating;
var audio = new Audio();

function resetAudio() {
    audio.pause();
    audio = new Audio();
}

function debounce(func, timeout = 2500){
    let timer;
    return (...args) => {
      clearTimeout(timer);
      timer = setTimeout(() => { func.apply(this, args); }, timeout);
    };
  }


$('.menu').on('click',function (e) { 
    e.preventDefault();
    menu_id = this.dataset.id;
    $('#menu_categories_'+menu_id).toggle();
});

$(window).on('scroll',function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height() - 50) {
        fetchCategoryItems();
    }
});


function clearServices() {
    $('#services').html('');
    resetAudio();
}

function getMaxPage() {
    // 1 stranica je minimum => poslati zahtjev i provjeriti maxPages
}

function outputIfNotNull(item) {
    if(item != null && item != undefined) {
        return item;
    } else return "";
}

function generateServiceCSS(service) {
    var html = '';
    html += '<div class="service-box" data-id="'+service['id']+'">';

    html += '<div class="audio-box-container">';
    html += '<img src="/imgs/icons/sound-bars.svg" style="height:20px;">';
    html += '<img src="/imgs/icons/play-button2.svg" data-src="'+outputIfNotNull(service['audio_link'])+'" class="service-audio-btn" style="height:20px; width:20px;">';
    html += '</div>';

    if(service['file_name'] != null) {
        html += '<div class="service-image"><img src="'+service['file_name']+'"></div>';
    } else {
        html += '<div class="service-image"><img src="/imgs/services/astronaut.png"></div>';
    }

    if(service['profile_picture'] != null) {
        html += '<div style="display:flex; justify-content:center; "><img src="'+service['profile_picture']+'"  style="height:80px; width:80px; border-radius:50%; border:4px solid white; position:relative; bottom:50px; margin-bottom:-40px;"></div>';
    } else {
        // html += '<img src="/imgs/avatar.svg" style="height:80px; width:80px; border-radius:0px 6px 0px 0px; position:relative;bottom:80px; margin-bottom:-80px;">';
        html += '<div style="display:flex; justify-content:center; "><img src="/imgs/avatar.svg" style="height:80px; width:80px; border-radius:50%; border:4px solid white; position:relative; bottom:50px; margin-bottom:-40px;"></div>';
    }

    html+= "<div style='text-align:center;'>";
    html += '<h4>'+service['users_name']+'</h4>';
    html += '<small style="max-width:80%;">'+showLessText(service['description'],28)+'</small>';
    // html += '<small><span style="font-size:20px;">'+service['price']+'</span> GP</small>';

    html+="</div>";


    html += '<div class="service-description" style="padding:5px 0;">';
    // html += '<strong>'+service['name']+'</strong>';
    // html += '<small><span style="font-size:20px;">'+service['price']+'</span> GP</small>';
    html += '</div>';
    html += '<div class="service-description" style="border-top:1px dashed var(--color-secondary);">';
    if(service['service_duration_type'] != null)
    {
        html += '<small><span style="font-size:20px; color:var(--color-secondary);">'+service['price']+'/'+service['service_duration_type']+'</span> GP</small>';
    }
    else
    {
        html += '<small><span style="font-size:20px; color:var(--color-secondary);">'+service['price']+'</span> GP</small>';
    }
    if(service['average_rate'] == null) {
        html += '<p>- <img src="/imgs/icons/star1.svg" style="height:20px; vertical-align:middle;"></p>';
    } 
    //to-be-removed (dev purposes)
    else { 
        html += '<p>'+service['average_rate']+'('+service['ratings_count']+') <img src="/imgs/icons/star1.svg" style="height:20px; vertical-align:middle;"></p>';
     }
    html += '</div>';
    html += '</div>';
    return html;
}
function showLessText(data,length) {
    if (data == '' || data == null) 
    {

    }
    else
    {
        if(data.length > length){
            return data.slice(0, length) + "....";
        }else{
            return data;
        }
    }
}

function updateCategoryID(id) {
    page = 1;
    maxPages = 100;
    category_id = id;
    $('#filters').css('display','flex');
    $('#filters_hr').css('display','block');
    $('#getStarted').css('display','none');
    clearServices();
    resetAudio();

    clearFilters();
    if(window.innerWidth < 768) {
        toggleMobileMenu();
    }
    $('#category_name').text(' - ' + menuCategories.filter(e => e.id == id)[0]['name']);
    fetchCategoryItems(page);
}

function fetchCategoryItems() {
    if(category_id == undefined) {
        return;
    }
    if(!locked && page <= maxPages) {
    var services_container = $('#services');
    $.ajax({
        type: "GET",
        url: "/services/get",
        data: {category_id:category_id, page:page, language:language, minRating:minRating, age:age, gender:gender, priceMin:priceMin, priceMax:priceMax},
        beforeSend: function() {
            locked = true;
            $('#no_results').hide();
            page++;
            $('#loader').css('display','flex');
        },
        success: function (response) {
            if(response.data) {
                var html = "";
                if(response.data) {
                    response.data.forEach(service => {
                        html += generateServiceCSS(service);
                });
                
                }

                setTimeout(() => {
                    $('#loader').css('display','none');
                }, 200);

                setTimeout(() => {
                    services_container.append(html);
                    locked = false;
                    maxPages = response.last_page;
                    // $('#loader').css('display','none');
                    noResultsCheck();
                }, 300);
       
            }
        },
        error: function() {
            
        }
    });
}
}

function noResultsCheck() {
    if($('#services').html() == '') {
        $('#no_results').show();
    } else {
        $('#no_results').hide();
    }
}

function clearFilters() {
    language = undefined;
    gender = undefined;
    age = undefined;
    priceMin = undefined;
    priceMax = undefined;
    minRating = undefined;
}


$('body').on('click','.service-box',function (e) { 
    if($(e.target).hasClass('service-audio-btn')) { return false };
    e.preventDefault();
    var id = this.dataset.id;
    console.log("clicked on service");
    window.open('/service/' + id,"_self");
});

$('body').on('click','.service-audio-btn',function (e) { 
    e.preventDefault();
    let voiceline = this.dataset.src;
    // on click play
    if($(this).attr('src') == '/imgs/icons/play-button2.svg') {
        if(voiceline != "") {
            resetAudio();
            audio.src = voiceline;
            audio.play();
        }
        $(this).attr('src','/imgs/icons/pause-button.svg');
    } else {
        resetAudio();
        $(this).attr('src','/imgs/icons/play-button2.svg');
    }
});



$('#filterBtn').on('click',function (e) { 
    
    language = $('#language').val();
    gender = $('#gender').val();
    age = $('#age').val();
    priceMin = $('#priceMin').val();
    priceMax = $('#priceMax').val();
    minRating = $('#minRating').val();
    page = 1;
    maxPages = 100;
    clearServices();
    fetchCategoryItems();
    e.preventDefault();
    resetAudio();

});


$('.showMenu').on('click', function () {
    toggleMobileMenu();
});

function toggleMobileMenu() {
    menu = $('.menu-navbar');
    if(menu.css('display') == 'none') {
        menu.css('display','block');
        menu.css('width','100%');
        $('body').css('overflow','hidden');
    } else {
        menu.css('display','none');
        menu.css('width','250px');
        $('body').css('overflow','initial');
    }
   
}