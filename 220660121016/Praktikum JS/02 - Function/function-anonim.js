function add(a, b) {
    var sum = a() + b();
    console.log(sum);
}

function fn_A() {
    return 1;
}

//fn_B diganti oleh function anonim
add(fn_A, function() {
    return 2;
});