$(document).ready(function() {
    $('.nav li a').click(function(e) {
        $('.nav li').removeClass('active');
        var $parent = $(this).parent();
        console.log($parent);
        if (!$parent.hasClass('active')) {
            $parent.addClass('active');
        }
        e.preventDefault();
    });
    
    
    $("#tv").click(function(){
                $(".tv").show();
                $('.movie').hide();
                 $('.people').hide();
    });
    $("#movie").click(function(){
                $(".movie").show();
                $('.tv').hide();
                 $('.people').hide();
    });
    $("#people").click(function(){
                $(".people").show();
                $('.tv').hide();
                 $('.movie').hide();
    });
    
    
    $('.tv').hide();
    $('.people').hide();
    
    
    
    

    
});