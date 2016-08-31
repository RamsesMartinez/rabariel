$('.sm-box').delay(3000).slideUp();

$('.add-to-cart').on('click', function(){

    $.ajax({
        url: BASE_URL + "shop/add-to-cart",
        type: "GET",
        dataType: "html",
        data: {id: $(this).data('id')},
        success: function (response){
            location.reload();
        }
    });
});

$('.sort-prod-asc').on('click', function(){

    $.ajax({
        url: BASE_URL + "shop/sort-prod-asc",
        type: "GET",
        dataType: "html",
        success: function (response){
            console.log(response);
        }
    });
});

$('.sort-prod-des').on('click', function(){
    $.ajax({
        url: BASE_URL + "shop/sort-prod-des",
        type: "GET",

        dataType: "html",
        success: function (response){
            document.getElementsByName('html')
            load(response.get);
        }
    });
});

$('.update-cart').on('click', function(){
    $.ajax({
      url: BASE_URL + "shop/update-cart",
      type: "GET",
      dataType: "html",
      data: {id: $(this).data('id'), op: $(this).data('op')},
      success: function (response){
         location.reload();
      } 
  });
});