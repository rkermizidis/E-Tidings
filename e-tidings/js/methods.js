function date(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Κυριακή","Δευτέρα","Τρίτη","Τετάρτη","Πέμπτη","Παρασκευή","Σάββατο")
var montharray=new Array("Ιανουαρίου","Φεβρουαρίου","Μαρτίου","Απριλίου","Μαίου","Ιουνίου","Ιουλίου","Αυγούστου","Σεπτεμβρίου","Οκτωμβρίου","Νοεμβρίου","Δεκεμβρίου")
document.getElementById("demo").innerHTML = dayarray[day]+", "+daym+" "+montharray[month]+" " +year;



}
function startTime() {
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML = h+":"+m+":"+s;
    window.setTimeout("startTime()",1000);
	
}

function checkTime(i) {
    if (i<10) {i = "0" + i}; 
    return i;
}




myarray = new Array(4);



myarray[0] = new Array("images/demo/Fotor0701150853.jpg");
myarray[1] = new Array("images/demo/Fotor070115253.jpg");
myarray[2] = new Array("images/demo/Fotor0701153214.jpg");
myarray[3] = new Array("images/demo/Fotor070713234.jpg");

var counter = 0;
function next(){

var x = document.getElementById("img1");
counter+=1;
if (counter == myarray.length)
counter = 0;
img1.src = myarray[counter];


}
function myfun(){
window.setInterval("next()",2000);
}
function previus(){

var x = document.getElementById("img1");
counter--;
if (counter < 0)
counter = myarray.length-1;
img1.src = myarray[counter];

}



