
var labels = [];
var questionCounts = [];
var answerCounts = [];

// Extract data for questions
questionsData.forEach(function (item) {
    labels.push(item.created_at);
    questionCounts.push(item.count);
});

// Extract data for answers
answersData.forEach(function (item) {
    answerCounts.push(item.count);
});

var data = {
    labels: labels,
    xLabels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "Questions",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            pointBorderColor: "rgba(75,192,192,1)",
            data: questionCounts,
            spanGaps: false,
        },
        {
            label: "Answers",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,0,192,0.4)",
            borderColor: "rgba(75,0,192,1)",
            pointBorderColor: "rgba(75,0,192,1)",
            data: answerCounts,
            spanGaps: false,
        }
    ]
};

var ctx = document.getElementById("myChart").getContext("2d");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
});
