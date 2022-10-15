//Reports and statistics
$("#print_button").click(function () {
    window.print();
});

function array_data(array, color_array) {
    var data_array = array.map(a => a.total);
    for (let i = 0; i < data_array.length; i++) {
        var color = randomColor();
        color_array.push(color);
    }
    return data_array;
}
