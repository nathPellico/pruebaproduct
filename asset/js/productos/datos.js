var myArray = [
    {id: 1, nombre: "Juan", apellido: "Pérez"},
    {id: 2, nombre: "María", apellido: "García"},
    {id: 3, nombre: "Pedro", apellido: "López"}
];

console.log(myArray)

var xmlhttp = new XMLHttpRequest();
var url = "../../pages/subcategorias/pruebas.php";
var data = JSON.stringify(myArray);

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("resultados").innerHTML = this.responseText;
    }
};

xmlhttp.open("POST", url, true);
xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xmlhttp.send(data);
