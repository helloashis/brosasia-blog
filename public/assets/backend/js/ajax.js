
$('#category').on('change', function() {
        var getStId = $(this).val();

        if(getStId) {
            $.ajax({
                url: '/admin/searchYourCategory/'+getStId,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    //console.log(data);
                  if(data){
                    
                    $('#subcategory').empty();
                    $('#subcategory').focus;
                    $('#subcategory').append('<option value="">======Select One======</option>'); 
                    $.each(data, function(key, value){
                    
                    $('#subcategory').append('<option value="'+ value.id +'">'+ value.title +'</option>');

                    });

              }else{
                $('#subcategory').append('<option value="">======Not Available======</option>');
              }
              }
            });
        }else{
          $('#subcategory').append('<option value="">======Not Available======</option>');
        }
    });


$('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: 'This record and it`s details will be permanantly deleted!',
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
          }).then(function(value) {
          if (value) {
          window.location.href = url;
        }
      });
});

