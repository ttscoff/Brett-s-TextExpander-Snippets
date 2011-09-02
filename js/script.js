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
    $('#download').attr('href',url);
    $.getJSON('getsnippets.php?file='+$('#group').val()+'.tedist', function(data) {
      var items = ['<tr><th>Name</th><th>Shortcut</th></tr>'];

      $.each(data, function(snippet) {
        items.push('<tr><td class="label">' + data[snippet].label + '</td><td class="shortcut">' + data[snippet].shortcut.replace(/\[\[PREFIX\]\]/,$('#prefix').val()) + '</td></tr>');
      });
      
      $('#preview').html($('<table>', {'id': 'shortcut-table',html: items.join('')}));
    });
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

