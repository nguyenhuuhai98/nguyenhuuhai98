function userChart(year = 2019) {
    let data = this.value;
    let time = parseInt($(this).data('id'));
    let url = "/admin/userChart";
    $.ajax({
        url : url,
        method: "GET",
        data : {
            year : year
        },
        success: function(response) {
            var chart = new CanvasJS.Chart("userChart", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "User Statistics " + year
                },
                axisY: {
                    title: "Number of Users",
                },
                axisX: {
                    title: "Month",
                },
                data: [{
                    type: "column",
                    // indexLabel: "{y}",
                    dataPoints: [
                        { y: Number(response['0']), label: "Jan" },
                        { y: Number(response['1']),  label: "Feb" },
                        { y: Number(response['2']),  label: "Mar" },
                        { y: Number(response['3']), label: "Apr" },
                        { y: Number(response['4']),  label: "May" },
                        { y: Number(response['5']),  label: "Jun" },
                        { y: Number(response['6']), label: "Jul" },
                        { y: Number(response['7']),  label: "Aug" },
                        { y: Number(response['8']),  label: "Sep" },
                        { y: Number(response['9']), label: "Oct" },
                        { y: Number(response['10']),  label: "Nov" },
                        { y: Number(response['11']),  label: "Dec" }
                    ]
                }]
            });
            chart.render();
        }
    });

}

function testChart(year = 2019) {
    let data = this.value;
    let time = parseInt($(this).data('id'));
    let url = "/admin/testChart";
    $.ajax({
        url : url,
        method: "GET",
        data : {
            year : year
        },
        success: function(response) {
            var chart = new CanvasJS.Chart("testChart", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Test Statistics " + year
                },
                axisY: {
                    title: "Number of Tests",
                },
                axisX: {
                    title: "Month",
                },
                data: [{
                    type: "column",
                    // indexLabel: "{y}",
                    dataPoints: [
                        { y: Number(response['0']), label: "Jan" },
                        { y: Number(response['1']),  label: "Feb" },
                        { y: Number(response['2']),  label: "Mar" },
                        { y: Number(response['3']), label: "Apr" },
                        { y: Number(response['4']),  label: "May" },
                        { y: Number(response['5']),  label: "Jun" },
                        { y: Number(response['6']), label: "Jul" },
                        { y: Number(response['7']),  label: "Aug" },
                        { y: Number(response['8']),  label: "Sep" },
                        { y: Number(response['9']), label: "Oct" },
                        { y: Number(response['10']),  label: "Nov" },
                        { y: Number(response['11']),  label: "Dec" }
                    ]
                }]
            });
            chart.render();
        }
    });

}

window.onload = function () {
    userChart();
    testChart();
}

$(document).on('change', '#userYear', function () {
    console.log(123);
    let year = $(this).val();
    userChart(year);
});

$(document).on('change', '#testYear', function () {
    console.log(123);
    let year = $(this).val();
    testChart(year);
});
