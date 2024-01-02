const ctx = document.getElementById("myChart");
const totalQuestion = document.getElementById("totalQuestion");
const totalAnswer = document.getElementById("totalAnswer");

var options = {
    chart: {
        type: "bar",
    },
    series: [
        {
            name: "Total",
            data: [totalQuestion.innerHTML, totalAnswer.innerHTML],
        },
    ],
    xaxis: {
        categories: ["Question", "Answer"],
    },
};

var chart = new ApexCharts(ctx, options);

chart.render();

const handleChange = (e, data) => {
    switch (e.value) {
        case "daily":
            totalQuestion.innerHTML = data.daily.question;
            totalAnswer.innerHTML = data.daily.answer;

            updateChart(data.daily.question, data.daily.answer);
            break;
        case "weekly":
            totalQuestion.innerHTML = data.weekly.question;
            totalAnswer.innerHTML = data.weekly.answer;

            updateChart(data.weekly.question, data.weekly.answer);
            break;
        case "monthly":
            totalQuestion.innerHTML = data.monthly.question;
            totalAnswer.innerHTML = data.monthly.answer;

            updateChart(data.monthly.question, data.monthly.answer);
            break;
        case "yearly":
            totalQuestion.innerHTML = data.yearly.question;
            totalAnswer.innerHTML = data.yearly.answer;

            updateChart(data.yearly.question, data.yearly.answer);
            break;

        default:
            totalQuestion.innerHTML = data.all.question;
            totalAnswer.innerHTML = data.all.answer;

            updateChart(data.all.question, data.all.answer);
            break;
    }
};

const updateChart = (question, answer) => {
    chart.updateOptions({
        series: [
            {
                name: "Total",
                data: [question, answer], // New data
            },
        ],
    });
};
