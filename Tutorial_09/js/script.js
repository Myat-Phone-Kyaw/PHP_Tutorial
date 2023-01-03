$(document).ready(function () {
    if (typeof yearly_label !== 'undefined') {
        const yearly = document.getElementById('myChart');
        new Chart(yearly, {
            type: 'bar',
            data: {
                labels: yearly_label,
                datasets: [{
                    label: 'Number of posts',
                    data: yearly_data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    if (typeof monthly_label !== 'undefined') {
        const monthly = document.getElementById('myChart');
        new Chart(monthly, {
            type: 'bar',
            data: {
                labels: monthly_label,
                datasets: [{
                    label: 'Number of posts',
                    data: monthly_data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    if (typeof weekly_label !== 'undefined') {
        const weekly = document.getElementById('myChart');
        new Chart(weekly, {
            type: 'bar',
            data: {
                labels: weekly_label,
                datasets: [{
                    label: 'Number of posts',
                    data: weekly_data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    
    $('.delete-btn').on('click', function () {
        $('#delete-modal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete-id').val(data[0]);
    });
})
