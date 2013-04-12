function load_wr(url, div, tipo, campos)
{ var div = div;
  var ajax = null;

  if(window.ActiveXObject)
  {
    ajax = new ActiveXObject('Microsoft.XMLHTTP');
  }
  else if(window.XMLHttpRequest)
  {
    ajax = new XMLHttpRequest();
  }


  if(ajax != null)
  {
    var cache = new Date().getTime()
    ajax.open(tipo, url+'&cache='+cache, true);
    ajax.onreadystatechange = function status()
    {
      if(ajax.readyState == 4)
      {
        if(ajax.status == 200)
        {
          document.getElementById(div).innerHTML = ajax.responseText;
        }
      }
      else
      {
        document.getElementById(div).innerHTML = '<div align="center"><img src="images/temp/loader.gif" /><br/><img src="images/temp/loader2.gif" /></div>';
      }
    }

    if(tipo == "POST")
    {
      ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
      ajax.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
      ajax.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
      ajax.setRequestHeader("Pragma", "no-cache");
      ajax.send(campos);
    }
    else
    {
      ajax.send(null);
    }
  }
}