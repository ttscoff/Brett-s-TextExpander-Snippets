/* Author: Brett Terpstra

*/
(function($){
  function updateURL() {
    var group = $('#group').val();
    var prefix = $('#prefix').val();
    var url = $('#baseurl').val()
      .replace(/%grp%/,escape(group))
      .replace(/%pre%/,escape(prefix));
    $('#outputurl').val(url);
  }
  updateURL();
  $('#prefixform').change(function(ev){
    updateURL();
    $('#outputurl').select();
  });
  $('#prefix').keyup(function(){
    updateURL();
    return true;
  }).blur(function(){
    $('#outputurl').select();
  });
  $('#outputurl').select().click(function(ev){
    this.select();
  }).keydown(function(ev){
    var code = (ev.keyCode ? ev.keyCode : ev.which);
    if ((ev.metaKey || ev.ctrlKey || ev.altKey) && (code != 86 && code != 88)) {
      return true;
    } else if (code == 9) {
      ev.preventDefault();
      $('#group').focus();
      return false; 
    } else {
      ev.preventDefault();
      return false; 
    }
  });
})(jQuery);























