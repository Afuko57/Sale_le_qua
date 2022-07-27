jQuery(function(){
 
 jQuery('.showSingle').click(function(){
       jQuery('.targetDiv').hide();
       jQuery('#div'+$(this).attr('target')).show();
 });
});