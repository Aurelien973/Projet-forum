/*var maVa="Toto";
maVar=12;
maVar++;
if(maVar){
	window.alert(maVar);
} else{
	window.alert("oe yamete")	
}

for(i;i<3;i++){	*/

var monTab=new Array();
var monTab2 = [0,1,2,3]; //Conseillé car plus fiablement mieux interpreté //
var monTab3 = [12,"toto",200]
var el1 = monTab3[1];
console.log(el1);
var long = monTab2,lenght;
console.log(long);
monTab3.push("tata");
var el2 = monTab3[3];
console.log(el2);
monTab2.pop();
console.log(log);
delete monTab2[3];
console.log(long);
var el3 = monTab2[3];
console.log(el3);
for(i=0;i<long;i++){
	if (typeof monTab2[i] = "undefined"){
		console.log("l'indice de l'élément vide est :"+i);
	}

}	
delete monTab2[0];
for(i in monTab2){
	console.log("élément non-vide en indice : "+i);
}
var monObj = document.getElementById("div");
var monObj2 = document.getElementByName("formulaire");
//renvoie un tableau avec tous les element avec la class menu //
var monObj3 = document.getElementByClassName("menu");
var monObj4 = document.getElementByTagName("div");

monObj4.children();
monObj4.children();

document.creatElement("div");
monObj4.appendChild("<img src...>");
monObj4.innerHtml = "";