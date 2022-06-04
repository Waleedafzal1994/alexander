$(function () {
    $(document).on('scroll',function () {
      var $nav = $(".navbar");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });


  function debounce(func, timeout = 500){
    let timer;
    return (...args) => {
      clearTimeout(timer);
      timer = setTimeout(() => { func.apply(this, args); }, timeout);
    };
  }


  const processChange = debounce(() => search());





function search() {
  var searchQuery = $('#search').val();

  if(searchQuery.length > 3) {
    $('#spinner').show();
    $('#myDropdown').show();
    $('#search_content').html('');

    $.ajax({
      type: "GET",
      url: "/search/" + searchQuery,
      data: "",
      success: function (response) {
        $('#spinner').hide();
        $('#search_content').html('');
        var newHTML = '';
        var data = JSON.parse(response);
        data.forEach(el => {
          newHTML += "<div class='search-result' data-id='" + el['id'] +"'>";
          // newHTML += '<a href="/profile/'+ el['id'] +'">';
          if(el['profile_picture']) {
            newHTML += '<img src="'+el['profile_picture']+'" class="search-image">';
          } else {
            newHTML += '<img src="/imgs/avatar.svg" class="search-image">';
          }
          newHTML += '<div style="display:flex; flex-direction:column; justify-content:center;"><h6 style="margin:0 !important; max-width:100%; overflow:hidden; max-width:180px; text-overflow:ellipsis;">'+el['name']+'</h6>';
          if(el['status'] == 'Offline')  {
            newHTML+= '<span class="text-secondary">Offline</span>';
          } else {
            newHTML+= '<span class="text-success">Online</span>';
          }
          newHTML+= '</div>';
          // newHTML += '</a>';
          newHTML += '</div>';
        })
        if(newHTML == '') {
          newHTML = '<div style="text-align:center; padding:10px 0;">No results.</div>';
        }
        $('#search_content').html(newHTML);
      }
    });
  } else {
    $('#myDropdown').hide();
  }
}



  $('#search').on('input',function() {
    processChange();
  });


  $('div').on('click','.search-result',function() {
      window.location = '/profile/' +this.dataset.id;
    });