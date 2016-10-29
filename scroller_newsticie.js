var mc=titlea.length;
var inoout=false;

var tmpv;
tmpv=180-8-8-2*parseInt(1);
var cvar=0,say=0,tpos=0,enson=0,hidsay=0,hidson=0;

var psy = new Array();
divtextb ="<div id=d";
divtev1=" onmouseover=\"mdivmo(";
divtev2=")\" onmouseout =\"restime(";
divtev3=")\" ";
divtev4="";
divtexts = " style=\"position:absolute;visibility:hidden;width:"+tmpv+"; left:0; top:0; margin:0px; overflow-x:hidden; LINE-HEIGHT: 12pt; text-align:left;padding:0px; cursor:'default';\">";
ie6span= " style=\"position:relative; width:"+tmpv+"; LINE-HEIGHT: 14pt; text-align:left;padding:0px;\"";

uzun="<div id=\"enuzun\" style=\"position:absolute;left:0;top:0;\">";
var uzunobj=null;
var uzuntop=0;
var toplay=0;



function mdivmo(gnum)
{
	inoout=true;

	if((linka[gnum].length)>2)
	{
	objd=eval("d"+gnum);
	objd2=eval("hgd"+gnum);

	objd.style.color="#8E0606";
	objd2.style.color="#B90000";

	objd.style.cursor='hand';
	objd2.style.cursor='hand';

	objd.style.textDecoration='none';objd2.style.textDecoration='none';

}

}

function restime(gnum2)
{
	inoout=false;
	objd=eval("d"+gnum2);
	objd2=eval("hgd"+gnum2);

	objd.style.color="#000000";
	objd2.style.color="#414A76";

	objd.style.textDecoration='none';objd2.style.textDecoration='none';

	window.status="";

}

function butclick(gnum3)
{
//buildergenlink


}

function dotrans()
{
	if(inoout==false){
	uzuntop--;
	if(uzuntop<(-1*toplay))
	{
		uzuntop=215;
	}

	enuzun.style.pixelTop=uzuntop;
}
	if(psy[(uzuntop*(-1))+4]==3)
	{
setTimeout('dotrans()',2000+0);
}
else{setTimeout('dotrans()',0);}

}

function initte2()
{
	for(i=0;i<mc;i++)
	{
		objd=eval("d"+i);
		if(parseInt(objd.offsetHeight)<=0){setTimeout('initte2()',1000);return;}
	}
	i=0;
	for(i=0;i<mc;i++)
	{
		objd=eval("d"+i);
		heightarr[i]=parseInt(objd.offsetHeight);
	}

	toplay=4;
	for(i=0;i<mc;i++)
	{
		objd=eval("d"+i);
		objd.style.visibility="visible";
		objd.style.pixelTop=toplay;
		psy[toplay]=3;
		toplay=toplay+heightarr[i]+10;

	}


	enuzun.style.left=8+"px";
	enuzun.style.height=toplay+"px";
	enuzun.style.width=tmpv+"px";
	uzuntop=215;



	dotrans();

}

function getNews(){
	i=0;
	innertxt=""+uzun;
	for(i=0;i<mc;i++)
	{
		innertxt=innertxt+""+divtextb+""+i+""+divtev1+i+divtev2+i+divtev3+i+divtev4+divtexts+"<a href=\"deneme\">"+titlea[i]+"</a><br>"+texta[i]+"</div>";
	}
	innertxt=innertxt+"</div>";
	return 	innertxt;
}
function initte()
{
	innertxt=getNews();
	uagent = window.navigator.userAgent.toLowerCase();
	OPB=(uagent.indexOf('opera') != -1)?true:false;
	if((document.all)&&(OPB==false)){
		spageie.innerHTML=""+innertxt;
		setTimeout('initte2()',500);
	}else{
		//document.getElementById("spageie").innerHTML=""+innertxt;
		//baslaHaber();
	}
}




window.onload=initte;