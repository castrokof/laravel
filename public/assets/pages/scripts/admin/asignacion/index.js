$('document').ready(function()
{
 $(".select-all").click(function () 
 {
  $('.btn-accion-tabla').attr('checked', this.checked)
 });
  
 $(".btn-accion-tabla").click(function()
 {
  if($(".btn-accion-tabla").length == $(".btn-accion-tabla:checked").length) 
  {
   $(".select-all").attr("checked", "checked");
  } 
  else 
  {
   $(".select-all").removeAttr("checked");
  }
 });
 

   
  });
