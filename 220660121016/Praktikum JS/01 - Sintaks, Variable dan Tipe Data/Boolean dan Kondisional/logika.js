//Logika kebalikan (negasi)
var a = true;
console.log(a);//true
console.log(!a);//false

var b = false;
console.log(!b);//true

//Logika AND
var c = true;
var d = true;

console.log(c && d);//true

c = false;
console.log(c && d);//false

c = d = false;
console.log(c && d);//false

c = d = true;
var e = false;
console.log(c && d && e);//false

//Logika OR
var f = true;
var g = true;

console.log(f || g);//true

f = false;
console.log(f || g);//true

f = g = false;
console.log(f || g);//false

g = true;
var h = false;
console.log(f || g || h);//true