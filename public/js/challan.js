$('form').each(function () {

        $(this).validate({
        	ignore: [],
          rules: {
    name: {
        required:true,
        normalizer: function( value ) {
        return $.trim( value );
      }
    },
    
    fee :{
      required : true,
      number: true,
      normalizer: function( value ) {
        return $.trim( value );
      }
    },

    priority :{
      required : true,
      number: true,
      normalizer: function( value ) {
        return $.trim( value );
      }
    },
    
    concession :{
      required : true,
      number: true,
      range: [0, 100],
      normalizer: function( value ) {
        return $.trim( value );
      }
    }
  },
  messages: {
    name: 'This field is required',
    //fee: 'This field is required'
  },
  processData: false,
  submitHandler: function(form) {
    storeData(form,status);
    
  }
        });
});//end of form validation

function getIdForm(id){

  var str = id.split("-");

  return str[0];

}//end of getIdForm

function storeData(form,flag){

  var id = getIdForm(form.id);
  $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),

            beforeSend: function(){
              $('#'+id+'-submit').prop('disabled', true);
            },

            success: function(data) {
                console.log(data);

                let row = null;
                if(id == 'challan'){

                  row = '<tr>'+
                            
                            '<td>'+data.name+'</td>'+
                                      
                            '<td>'+data.fee+'</td>'+
                            
                            '<td>'+
                            '<a href="#" id="'+data.id+'" class="btn event_btn add_concession">Add Concession</a>'+
                              //'<a href="#" class="btn event_btn">Delete</a>'+
                              //'<a data-toggle="modal" role="button" data-target="#approve_modal" class="btn event_btn remove_btn_color">Edit</a>'+
                                          '</td>'+
                                      '</tr>';

                }else{

                 let discount = data.challan.fee-((data.concession/100)*data.challan.fee);
                 console.log(discount);
                 row = '<tr id="row-'+data.id+'">'+
                          '<th>'+data.id+'</th>'+
                          '<td>'+data.challan.name+'</td>'+
                                            
                          '<td>'+data.challan.fee+'</td>'+
                          '<td>'+data.priority+'</td>'+
                          '<td>'+data.concession+'</td>'+
                          '<td>'+discount+'</td>'+
                            
                            '<td>'+
                                '<a href="#" id="'+data.id+'" class="btn event_btn delete_concession">Delete</a>'+
                            '</td>'+
                        '</tr>';
                }
                console.log(data.challan.fee+2);
                console.log(row);
                $('#'+id+'-table tr:last').after(row);

                form.reset();
            },

            error: function (jqXHR, exception) {

                
                alert("Something went wrong plx try again");

            },
            complete:function(jqXHR,data){
              $('#'+id+'-submit').prop('disabled', false);
            
            }            
    });

}//end of store data

$( document ).ready(function() {
  //console.log("yes yes");

});//end of document ready

$(document).on('click', '.add_concession', function() {

  id = this.id;
  $('#challan_id').val(id);

});//end of add concession

$(document).on('click', '.delete_concession', function() {

  id = this.id;
  console.log(id);

  $.ajax({
            url: 'delete_challan',
            type: 'GET',
            data: {id:id},

            beforeSend: function(){
              
            },

            success: function(data) {
                console.log(data);
                
            },

            error: function (jqXHR, exception) {
                alert("Something went wrong plx try again");
            },
            complete:function(jqXHR,data){
              
            }            
    });

  $(this).closest("tr").remove();
  return false;
});//end of add concession

$(document).on('click', '#generate_challan', function() {
  $.ajax({
            url: 'generate_challan',
            type: 'GET',
            data: {id:null},

            beforeSend: function(){
              
            },

            success: function(data) {
                console.log(data);

                if (data.challans) {
                  for (var i=0; i< data.challans.length; i++) {

                    let discount = 0;
                    if (data.challans[i].concession) {
                      discount = data.challans[i].fee-((data.challans[i].concession/100)*data.challans[i].fee);
                    }else{
                      discount = data.challans[i].fee;
                    }
                    
                    let row = '<tr>'+
                          '<th>'+data.challans[i].name+'</th>'+
                          '<td>'+discount+'</td>'+
                        '</tr>';
                    $('#generate_challan-table tr:last').after(row);
                  }//end of for loop

                  let row = '<tr>'+
                          '<th>Total</th>'+
                          '<td>'+data.total+'</td>'+
                        '</tr>';

                  $('#generate_challan-table tr:last').after(row);

                  row = '<tr>'+
                
                          '<td>Challan-'+data.gChallan.id+'</td>'+
                        '</tr>';

                  $('#gchallan-table tr:last').after(row);
                }//end of if
                
            },

            error: function (jqXHR, exception) {
                alert("Something went wrong plx try again");
            },
            complete:function(jqXHR,data){
              
            }            
    });

  return false;
});