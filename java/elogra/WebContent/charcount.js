var LabelCounter=0;function parseCharCounts()
{var elements=document.getElementsByTagName('textarea');var element=null;var maxlength=9;var newlabel=null;for(var i=0;i<elements.length;i++)
{element=elements[i];if(element.getAttribute('maxlength')!=null&&element.getAttribute('limiterid')==null)
{maxlength=element.getAttribute('maxlength');newlabel=document.createElement('label');newlabel.id='limitlbl_'+LabelCounter;newlabel.style.color='red';newlabel.style.display='block';newlabel.innerHTML="Updating...";element.setAttribute('limiterid',newlabel.id);element.onkeyup=function(){displayCharCounts(this);};element.parentNode.insertBefore(newlabel,element);displayCharCounts(element);}
LabelCounter++;}}
function displayCharCounts(element)
{var limitLabel=document.getElementById(element.getAttribute('limiterid'));var maxlength=element.getAttribute('maxlength');var enforceLength=false;if(element.getAttribute('lengthcut')!=null&&element.getAttribute('lengthcut').toLowerCase()=='true')
{enforceLength=true;}//
var value=element.value.replace(/\u000d\u000a/g,'\u000a').replace(/\u000a/g,'\u000d\u000a');var currentLength=value.length;var remaining=0;if(maxlength==null||limitLabel==null)
{return false;}
remaining=maxlength-currentLength;if(remaining>=0)
{limitLabel.style.color='green';limitLabel.innerHTML=remaining+' character';if(remaining!=1)
limitLabel.innerHTML+='s';limitLabel.innerHTML+=' remaining';}
else
{if(enforceLength==true){value=value.substring(0,maxlength);element.value=value;element.setSelectionRange(maxlength,maxlength);limitLabel.style.color='green';limitLabel.innerHTML='0 characters remaining';}
else{remaining=Math.abs(remaining);limitLabel.style.color='red';limitLabel.innerHTML='Over by '+remaining+' character';if(remaining!=1)
limitLabel.innerHTML+='s';limitLabel.innerHTML+='!';}}}
parseCharCounts();