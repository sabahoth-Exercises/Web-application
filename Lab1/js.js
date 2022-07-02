
function check(task){
    var fail = false;
    var X = task.X.value;
    var Y = task.Y.value;
    var R = task.R.value;
    if (Y <= -3.0001 || Y >= 3.0001 || isNaN(Y) || Y == "" || Y.length > 5){
        fail = "Некорректно задано значение Y \n";
    }
    if (fail){
        alert(fail);
        return false;
    }
}