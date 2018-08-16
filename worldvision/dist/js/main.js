// $(document).ready(function() {
//     $('#example').DataTable({
//       stateSave: true,
//       responsive:true
//     });
// } );


$(document).ready(function() {
    var table = $('#example').DataTable( {
        stateSave: true,
        responsive: true
    } );
 
    new jQuery.fn.dataTable.FixedHeader( table );
} );

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);

$(document).ready(function(){
var current = 1;

widget      = $(".step");
btnnext     = $(".next");
btnback     = $(".back"); 
btnsubmit   = $(".submit");

// Init buttons and UI
widget.not(':eq(0)').hide();
hideButtons(current);
setProgress(current);

// Next button click action
btnnext.click(function(){
if(current < widget.length){
// Check validation
if($(".form").valid()){
widget.show();
widget.not(':eq('+(current++)+')').hide();
setProgress(current);
}
}
hideButtons(current);
})


// Back button click action
btnback.click(function(){
if(current > 1){
current = current - 2;
if(current < widget.length){
widget.show();
widget.not(':eq('+(current++)+')').hide();
setProgress(current);
}
}
hideButtons(current);
})

$('.form').validate({ 
// initialize plugin
ignore:":not(:visible)",   
rules: {
region: "required",
country     : "required",
date     : "required",
foodsecuritylivelihood     : "required",
confidence : "required",
wash     : "required",
hnutrition     : "required",
health     : "required",
protection    : "required",
mprevention   : "required",
narrative : "required",
nfooditems     : "required",
people     : "required",
foodsecurity     : "required",
food_assistance     : "required",
nutrition     : "required",
educationpro : "required",
education : "required",

},


});

});

// Change progress bar action
setProgress = function(currstep){
var percent = parseFloat(100 / widget.length) * currstep;
percent = percent.toFixed();
$(".progress-bar").css("width",percent+"%").html(percent+"%");  
}

// Hide buttons according to the current step
hideButtons = function(current){
var limit = parseInt(widget.length); 

$(".action").hide();

if(current < limit) btnnext.show();
if(current > 1) btnback.show();
if (current == limit) { 
// Show entered values
$(".display label.lbl").each(function(){
$(this).html($("#"+$(this).data("id")).val()); 
});
btnnext.hide(); 
btnsubmit.show();
}
}



// $(".next").click(function() {
//     var editorContent = tinyMCE.get('narrative').getContent();
//     if (editorContent == '' || editorContent == null)
//     {
//         // Add error message if not already present
//         if (!$('#editor-error-message').length)
//         {
//             $('<span id="editor-error-message">Editor empty</span>').insertAfter($(tinyMCE.get('narrative').getContainer()));
//         }
//     }
//     else
//     {
//         // Remove error message
//         if ($('#editor-error-message'))
//             $('#editor-error-message').remove();
//     }
   
// })

// $('#btndelete').click(function(e){
//   swal("Hello world!");
// })


 function sweetalertdelete(){


  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });


 }


$(document).ready(function(){
  $(document).on("click",".delete_beneficiary",function(e){
  e.preventDefault();
  var benid = $(this).attr('data-ben-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "Cancel",
     className: "btn-warning",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'deletebeneficiary.php',
         data: 'deleteben='+benid
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
  });





$(document).ready(function(){
 $(document).on("click",".delete_funding",function(e){
  e.preventDefault();
  var fundid = $(this).attr('data-fund-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "Cancel",
     className: "btn-warning",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'deletefunding.php',
         data: 'deletefund='+fundid
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
});


$(document).ready(function(){
  $(document).on("click",".delete_people",function(e){
  e.preventDefault();
  var peopleid = $(this).attr('data-people-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "Cancel",
     className: "btn-warning",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'deletepeople.php',
         data: 'deletepeople='+peopleid
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
});




$(document).ready(function(){
  $(document).on("click",".delete_fragility",function(e){
  e.preventDefault();
  var fragilityid = $(this).attr('data-fragility-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "Cancel",
     className: "btn-warning",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'deletefragility.php',
         data: 'deletefragilityindex='+fragilityid
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
});



$(document).ready(function(){
  $(document).on("click",".delete_earlywarning",function(e){
  e.preventDefault();
  var earlywarningid = $(this).attr('data-earlywarning-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "Cancel",
     className: "btn-warning",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'delete_early_warning.php',
         data: 'delete_earlywarning='+earlywarningid
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
});



$(document).ready(function(){
  $(document).on("click",".delete_situation",function(e){
  e.preventDefault();
  var deletesituationid = $(this).attr('data-situation-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "Cancel",
     className: "btn-warning",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'delete_situation_report.php',
         data: 'deletesituationreport='+deletesituationid
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
});





$('#add-date').datepicker({
    format: 'mm/yyyy',
    startView: "months", 
    minViewMode: "months"
});


$('#last-update').datepicker({
    format: 'mm/yyyy',
    startView: "months", 
    minViewMode: "months"
});


function category_earlywarning(){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","indicator.php?category_indicator="+document.getElementById("selectewc").value,false);
          xmlhttp.send(null);
          document.getElementById("ewindicator").innerHTML=xmlhttp.responseText;
 }


function indicator_possibleanswer(){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","possible_answer.php?panswer="+document.getElementById("ewindicator").value,false);
          xmlhttp.send(null);
          document.getElementById("pa").innerHTML=xmlhttp.responseText;
}



$("#resetform").ready(function(){
  $("#resetform").validate({
    rules: {
      password:{
        required:true,
        minlength:6
      },
      cpassword:{
        required: true,
        equalTo:"#password"

      }
    }
  });
});



 $(function() {
      $( 'ul.nav li' ).on( 'click', function() {
            $( this ).parent().find( 'li.active' ).removeClass( 'active' );
            $( this ).addClass( 'active' );
      });
});



 $("#add_situation").ready(function(){
  $("#add_situation").validate();
});









    