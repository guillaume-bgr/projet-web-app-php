$.ajax({
    url: "../../controllers/TeamController.php?method=advantages&id=" + id,
    method: "GET",
    dataType: "json",
    success: function (data) {
        let lbls = [];
        let values = [];
        let colors = [];
        let sum = 0;

        for (let i = 0; i < data.length; i++) {
            sum = sum + parseInt(data[i]['value'], 10);
        }

        for (let i = 0; i < data.length; i++) {
            lbls.push(data[i]['name']);
        }

        for (let i = 0; i < data.length; i++) {
            values.push(parseInt(data[i]['value'], 10));
        }

        let color1 = 'rgb(0, 183, 100)';
        let color2 = 'rgb(207, 153, 0)';
        let color3 = 'rgb(178, 223, 138)';

        for (let i = 0; i < data.length / 3; i++) {
            colors.push(color1);
            colors.push(color2);
            colors.push(color3);
        }

        if (data.length % 3 != 0) {
            if (data.length % 3 == 1) {
                colors.push(color1);
            }
            else {
                colors.push(color1);
                colors.push(color2);
            }
        }

        const chartdata = {
            labels: lbls,
            datasets: [{
                label: 'My First Dataset',
                data: values,
                backgroundColor: colors,
                hoverOffset: 5,
            }]
        };

        const config = {
            type: 'doughnut',
            data: chartdata,
            options: {
                cutout: 60,
                elements: {
                    arc: {
                        borderWidth: 1,
                        borderColor: "#CFCFCF"
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        
        $('.advantages__label').text(sum + ' €/an');
    }
})
$('.modal__underlay').hide();
$('#modify').on('click', function() {
    $('.modal__underlay').fadeIn(100);
})
$('.dismiss i').on('click', function() {
    $('.modal__underlay').fadeOut(100);
})
$('.delete').on('click', function() {
    $.ajax({
        url: "../../controllers/TeamController.php?id="+id+"&method=delete",
        method: "GET",
        success: function (data) { 
            window.location.href = '../../views/team.php';
        }});
})