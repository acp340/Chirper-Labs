<?php
// resources embedded below, do not edit!
__halt_compiler() ?>body{margin:0px;padding:0px;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#000;background-color:#e0ebf6;overflow:auto}.body_tbl td{padding:9px 2px 9px 9px}.left_td{width:100px}a{color:#03F;text-decoration:none;cursor:pointer}a:hover{color:#06F}hr{height:1px;border:0;color:#bbb;background-color:#bbb;width:100%}h1{margin:0px;padding:5px;font-size:24px;background-color:#f3cece;text-align:center;color:#000;border-top-left-radius:5px;border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px}#headerlinks{text-align:center;margin-bottom:10px;padding:5px 15px;border-color:#03F;border-width:1px;border-style:solid;border-left-style:none;border-right-style:none;font-size:12px;background-color:#e0ebf6;font-weight:bold}h1 #version{color:#000;font-size:16px}h1 #logo{color:#000}h2{margin:0px;padding:0px;font-size:14px;margin-bottom:20px}input,select,textarea{font-family:Arial,Helvetica,sans-serif;background-color:#eaeaea;color:#03F;border-color:#03F;border-style:solid;border-width:1px;margin:5px;border-radius:5px;-moz-border-radius:5px;padding:3px}input.btn{cursor:pointer}input.btn:hover{background-color:#ccc}fieldset label{min-width:200px;display:block;float:left}fieldset{padding:15px;border-color:#03F;border-width:1px;border-style:solid;border-radius:5px;-moz-border-radius:5px;background-color:#f9f9f9}#container{padding:10px}#leftNav{min-width:250px;padding:0px;border-color:#03F;border-width:1px;border-style:solid;background-color:#FFF;padding-bottom:15px;border-radius:5px;-moz-border-radius:5px}.databaseList select{max-width:200px}.viewTable tr td{padding:1px}#loginBox{width:500px;margin-left:auto;margin-right:auto;margin-top:50px;border-color:#03F;border-width:1px;border-style:solid;background-color:#FFF;border-radius:5px;-moz-border-radius:5px}#main{border-color:#03F;border-width:1px;border-style:solid;padding:15px;background-color:#FFF;border-bottom-left-radius:5px;border-bottom-right-radius:5px;border-top-right-radius:5px;-moz-border-radius-bottomleft:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-topright:5px}.td1{background-color:#f9e3e3;text-align:right;font-size:12px;padding-left:10px;padding-right:10px}.td2{background-color:#f3cece;text-align:right;font-size:12px;padding-left:10px;padding-right:10px}.tdheader{border-color:#03F;border-width:1px;border-style:solid;font-weight:bold;font-size:12px;padding-left:10px;padding-right:10px;background-color:#e0ebf6;border-radius:5px;-moz-border-radius:5px}.confirm{border-color:#03F;border-width:1px;border-style:dashed;padding:15px;background-color:#e0ebf6}.tab{display:block;padding:5px;padding-right:8px;padding-left:8px;border-color:#03F;border-width:1px;border-style:solid;margin-right:5px;float:left;border-bottom-style:none;position:relative;top:1px;padding-bottom:4px;background-color:#eaeaea;border-top-left-radius:5px;border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px}.tab_pressed{display:block;padding:5px;padding-right:8px;padding-left:8px;border-color:#03F;border-width:1px;border-style:solid;margin-right:5px;float:left;border-bottom-style:none;position:relative;top:1px;background-color:#FFF;cursor:default;border-top-left-radius:5px;border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px}.helpq{font-size:11px;font-weight:normal}#help_container{padding:0px;font-size:12px;margin-left:auto;margin-right:auto;background-color:#fff}.help_outer{background-color:#FFF;padding:0px;height:300px;position:relative}.help_list{padding:10px;height:auto}.headd{font-size:14px;font-weight:bold;display:block;padding:10px;background-color:#e0ebf6;border-color:#03F;border-width:1px;border-style:solid;border-left-style:none;border-right-style:none}.help_inner{padding:10px}.help_top{display:block;position:absolute;right:10px;bottom:10px}.warning,.delete,.empty,.drop,.delete_db{color:red}.sidebar_table{font-size:11px}.active_table,.active_db{text-decoration:underline}.null{color:#888}.found{background:#FF0;text-decoration:none}
function initAutoincrement()
{var i=0;while(document.getElementById('i'+i+'_autoincrement')!=undefined)
{document.getElementById('i'+i+'_autoincrement').disabled=true;i++;}}
function toggleAutoincrement(i)
{var type=document.getElementById('i'+i+'_type');var primarykey=document.getElementById('i'+i+'_primarykey');var autoincrement=document.getElementById('i'+i+'_autoincrement');if(!autoincrement)return false;if(type.value=='INTEGER'&&primarykey.checked)
autoincrement.disabled=false;else
{autoincrement.disabled=true;autoincrement.checked=false;}}
function toggleNull(i)
{var pk=document.getElementById('i'+i+'_primarykey');var notnull=document.getElementById('i'+i+'_notnull');if(pk.checked)
{notnull.disabled=true;notnull.checked=true;}
else
{notnull.disabled=false;}}
function checkAll(field)
{var i=0;while(document.getElementById('check_'+i)!=undefined)
{document.getElementById('check_'+i).checked=true;i++;}}
function uncheckAll(field)
{var i=0;while(document.getElementById('check_'+i)!=undefined)
{document.getElementById('check_'+i).checked=false;i++;}}
function changeIgnore(area,e,u)
{if(area.value!="")
{if(document.getElementById(e)!=undefined)
document.getElementById(e).checked=false;if(document.getElementById(u)!=undefined)
document.getElementById(u).checked=false;}}
function moveFields()
{var fields=document.getElementById("fieldcontainer");var selected=[];for(var i=0;i<fields.options.length;i++)
if(fields.options[i].selected)
selected.push(fields.options[i].value);for(var i=0;i<selected.length;i++)
insertAtCaret("queryval",'"'+selected[i].replace(/"/g,'""')+'"');}
function insertAtCaret(areaId,text)
{var txtarea=document.getElementById(areaId);var scrollPos=txtarea.scrollTop;var strPos=0;var br=((txtarea.selectionStart||txtarea.selectionStart=='0')?"ff":(document.selection?"ie":false));if(br=="ie")
{txtarea.focus();var range=document.selection.createRange();range.moveStart('character',-txtarea.value.length);strPos=range.text.length;}
else if(br=="ff")
strPos=txtarea.selectionStart;var front=(txtarea.value).substring(0,strPos);var back=(txtarea.value).substring(strPos,txtarea.value.length);txtarea.value=front+text+back;strPos=strPos+text.length;if(br=="ie")
{txtarea.focus();var range=document.selection.createRange();range.moveStart('character',-txtarea.value.length);range.moveStart('character',strPos);range.moveEnd('character',0);range.select();}
else if(br=="ff")
{txtarea.selectionStart=strPos;txtarea.selectionEnd=strPos;txtarea.focus();}
txtarea.scrollTop=scrollPos;}
function notNull(checker)
{document.getElementById(checker).checked=false;}
function disableText(checker,textie)
{if(checker.checked)
{document.getElementById(textie).value="";document.getElementById(textie).disabled=true;}
else
{document.getElementById(textie).disabled=false;}}
function toggleExports(val)
{document.getElementById("exportoptions_sql").style.display="none";document.getElementById("exportoptions_csv").style.display="none";document.getElementById("exportoptions_"+val).style.display="block";}
function toggleImports(val)
{document.getElementById("importoptions_sql").style.display="none";document.getElementById("importoptions_csv").style.display="none";document.getElementById("importoptions_"+val).style.display="block";}
function openHelp(section)
{PopupCenter('?help=1#'+section,"Help Section");}
var helpsec=false;function PopupCenter(pageURL,title)
{helpsec=window.open(pageURL,title,"toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300");}
function checkLike(srchField,selOpt)
{if(selOpt=="LIKE%"){var textArea=document.getElementById(srchField);textArea.value="%"+textArea.value+"%";}}
function createCORSRequest(method,url)
{var xhr=new XMLHttpRequest();if("withCredentials"in xhr)
{xhr.open(method,url,true);}
else if(typeof XDomainRequest!="undefined")
{xhr=new XDomainRequest();xhr.open(method,url);}
else
{xhr=null;}
return xhr;}
function checkVersion(installed,url)
{var xhr=createCORSRequest('GET',url);if(!xhr)
return false;xhr.onload=function()
{if(xhr.responseText.split("\n").indexOf(installed)==-1)
{document.getElementById('oldVersion').style.display='inline';}};xhr.send();}AAABAAEAEBAAAAEAIAAoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwoKZQAAABMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEMDJMAAAAdAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASDg7BAAAASAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAETDw9CCQkJ1QUFBb4AAABjAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgsLVgAAAO8YExP/AAAA7QAAALEAAAARAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABQNDUsAAADJGBMT/xgTE/8AAAD/AAAAuAAAAA8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAZERE8DQoKwhgTE/8QDQ2sGBMT/xgTE/8AAAA/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwICHkAAAD/EQwMzQAAAMIAAAD/AAAA7gAAAGEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOCwtWAAAA8RgTE/8IBQW1AAAA/wAAAP8AAADlAAAAHQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA0KCsEAAAD/EQ8PzAAAAMkAAAD/AAAA/wAAAHoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABDAAAA/xgTE/8TDw/FAAAA8gAAAP8AAADqAAAAJgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAAALUAAAD/GBMT/wAAALkAAAD/AAAA/wAAAIkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfAAAA4wAAAP8GBgbFAAAA2QAAAP8AAADGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAF4AAAD5AAAA/RgTE/8AAAD/AAAA0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQQAAAOIAAAD/AAAA/wAAAHYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAjAAAArgAAAG4AAAAAAAAAAAAAAAAAAAAA
