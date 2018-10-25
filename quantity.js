function up(max,id) {
    document.getElementById("myNumber"+id).value = parseInt(document.getElementById("myNumber"+id).value) + 1;
    if (document.getElementById("myNumber"+id).value >= parseInt(max)) {
        document.getElementById("myNumber"+id).value = max;
    }
}
function down(min,id) {
	console.log(id);
    document.getElementById("myNumber"+id).value = parseInt(document.getElementById("myNumber"+id).value) - 1;
    if (document.getElementById("myNumber"+id).value <= parseInt(min)) {
        document.getElementById("myNumber"+id).value = min;
    }
}
