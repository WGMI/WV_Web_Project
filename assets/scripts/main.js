$(document).ready(function() {
    $('#example').DataTable();
} );

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

// Submit button click
// btnsubmit.click(function(){
// alert("Submit button clicked");
// });


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

$('.form').validate({ // initialize plugin
ignore:":not(:visible)",   
rules: {
region     : "required",
country     : "required",
date     : "required",
people     : "required",
foodsecurity     : "required",
food_assistance     : "required",
nutritiontype     : "required",
educationpro : "required",
education : "required",

// password : "required",
// rpassword: { required : true, equalTo: "#password"},
},

 // Called when the element is invalid:
    // highlight: function(element) {
    //     $(element).css('background', '#f37021');
    // },
    
    // // Called when the element is valid:
    // unhighlight: function(element) {
    //     $(element).css('background', '');
    // }
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


// $(function(){
//     $('#datepicker').datepicker({
//         autoclose: true,
//         todayHighlight: true
//     }).datepicker('update', new Date());
// });


$(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}