
// Attendance Month
    $('body').on('click','.attendance-m-w',function(){
        
            var angle = $(this).attr("data-angle_value");
            var current_month = $("#current_month").val();
            var default_page_value = $("#default_page").val();
            var zone_cluster = $("#zone_cluster").val();
            var city_id = $("#city_id").val();
            var search_key = $("#search_key").val();
            var from_date = $("#fromdate").val();
            var to_date = $("#todate").val();
            var action_url = $("#attendance_month_url").val();
            
            $.ajax({
                url: action_url,
                data: {'from_date':from_date,'to_date':to_date,'angle':angle,'current_month':current_month,'zone_cluster':zone_cluster,'default_page_value':default_page_value,'city_id':city_id,'search_key':search_key,},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                dataType: "json",
                type: 'POST',
                success: function (res) {
                  if(res.status == 'success'){
                    $('#pills-profile').html(res.htm);
                    $("#current_month").val(res.nextmonth);
                    $("#fromdate").val(res.fromDate);
                    $("#todate").val(res.toDate);
                    $("#currentmonth").val(res.nextmonth);
                  }else if(res.status=='loggedout'){
                      window.location.href = BASEURL;
                  }else{
                      alert(res.msg);
                  }
              },
              error:function(){
                    alert('An error has occurred');
              }
          });
    });


// Attendance Week
    $('body').on('click','.attendance-week',function(){
            
        var angle = $(this).attr("data-angle_value");
        var current_week = $("#current_week").val();
        var default_page_value = $("#default_page").val();
        var zone_cluster = $("#zone_cluster").val();
        var city_id = $("#city_id").val();
        var search_key = $("#search_key").val();
        var from_date = $("#fromdate").val();
        var to_date = $("#todate").val();
        var action_url = $("#attendance_week_url").val();
    
        $.ajax({
            url: action_url,
            data: {'from_date':from_date,'to_date':to_date,'angle':angle,'current_week':current_week,'zone_cluster':zone_cluster,'default_page_value':default_page_value,'city_id':city_id,'search_key':search_key,},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            dataType: "json",
            type: 'POST',
            success: function (res) {
              if(res.status == 'success'){
                  $('#pills-home').html(res.htm);
                  $("#current_week").val(res.nextweek);
              }else if(res.status=='loggedout'){
                  window.location.href = BASEURL;
              }else{
                  alert(res.msg);
              }
            },
            error:function(){
                    alert('An error has occurred');
            }
        });

    });

    $(".nav-link").click(function(){
        $(".preme").removeClass("attendance-week");
        $(".preme").removeClass("attendance-m-w");
        $(".nextme").removeClass("attendance-week");
        $(".nextme").removeClass("attendance-m-w");
     var getbtn= $(this).attr("data-btn");
        $(".preme").addClass(getbtn);
        $(".nextme").addClass(getbtn);

    });

/*
    $('#export').on('click', function(){ 

        var current_month = $("#current_month").val();
        
        $.ajax({
            url: $('meta[name="csrf-token"]').attr('siteurl')+'/exportfile',
            data: {'current_month':current_month,},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            dataType: "json",
            type: 'POST',
            success: function (res) {
              if(res.status == 'success'){
                    alert("success");
              }else if(res.status=='loggedout'){
                  window.location.href = BASEURL;
              }else{
                  alert(res.msg);
              }
            },
            error:function(){
                alert('An error has occurred');
            }
      });

    });
*/

// search ninja commandcenter
 function searchninja(){
     
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("searchninja");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("strong")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
 }

// search ninja commandcenter
 function availableNinja() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("availableninja_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("assignninjaaa");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("p")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }


// Tracking Details Command Center

 function tracking_details(bucket_id,increment){

    var currentActivePage = $('#currentActiveTab').val();
    var action_url = $('#trackingDetailsUrl').val();

    $.ajax({
        url: action_url,
        data: {'bucket_id':bucket_id,},
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        type: 'POST',
        success: function (res) {
          if(res.status == 'success'){
            if(currentActivePage=="Pending Task"){
                $('#panding_tracking_accordion-'+increment).html(res.htm);
            }else if(currentActivePage=="Assigned Tasks"){
                $('#assign_tracking_accordion-'+increment).html(res.htm);
            }else if(currentActivePage=="Started"){
                $('#started_tracking_accordion-'+increment).html(res.htm);
            }else if(currentActivePage=="Completed Tasks"){
                $('#completed_tracking_accordion-'+increment).html(res.htm);
            }else{
                if(currentActivePage=="Unpaid Tasks"){
                    $('#unpaid_tracking_accordion-'+increment).html(res.htm);
                }
            }
          }else if(res.status=='loggedout'){
              window.location.href = BASEURL;
          }else{
              alert(res.msg);
          }
      },
      error:function(){
            alert('An error has occurred');
      }
  });

 }
