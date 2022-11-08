function clearValue(){
	var val = document.getElementById("ans").innerHTML;
	if(val == "0"){
		val = " ";
		document.getElementById("ans").innerHTML = val;
	}
}

function putValue(val){
	clearValue();
	document.getElementById("ans").innerHTML += val;
}

function clearAns(){
	document.getElementById("ans").innerHTML = "0";
}

function showAns(){
	clearValue();
	var equation = (document.getElementById("ans").innerHTML).trim();
	document.getElementById("ans").innerHTML = eval(equation);
}

function backspace(){
	var val = ((document.getElementById("ans").innerHTML).trim()).toString();
	val = val.slice(0,val.length-1);
	if(val.length==0)
		val="0";
	document.getElementById("ans").innerHTML = val;
}

function factorial(){
	var val = (document.getElementById("ans").innerHTML).trim();
	var f=1;
	for(var i = 1; i <= val; i++)
		f=f*i;
	document.getElementById("ans").innerHTML = f;
}

function root(){
	var val = (document.getElementById("ans").innerHTML).trim();
	var x = window.prompt("Enter Nth Root : ");
	document.getElementById("ans").innerHTML = val**(1/x);
}
