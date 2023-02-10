var options = {
    series: [
        { name: "2018", type: "line", data: [20, 34, 27, 59, 37, 26, 38, 25] },
        { name: "2019", data: [10, 24, 17, 49, 27, 16, 28, 15], type: "area" },
    ],
    chart: { height: 320, type: "line", toolbar: { show: !1 }, zoom: { enabled: !1 } },
    colors: ["#45cb85", "#3b5de7"],
    dataLabels: { enabled: !1 },
    stroke: { curve: "smooth", width: "3", dashArray: [4, 0] },
    markers: { size: 3 },
    xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"], title: { text: "Month" } },
    fill: { type: "solid", opacity: [1, 0.1] },
    legend: { position: "top", horizontalAlign: "right" },
};
(chart = new ApexCharts(document.querySelector("#line-chart"), options)).render();
options = {
    series: [
        { name: "Series A", data: [11, 17, 15, 15, 21, 14] },
        { name: "Series B", data: [13, 23, 20, 8, 13, 27] },
        { name: "Series C", data: [44, 55, 41, 67, 22, 43] },
    ],
    chart: { type: "bar", height: 450, stacked: !0, toolbar: { show: !1 }, zoom: { enabled: !0 } },
    plotOptions: { bar: { horizontal: !1, columnWidth: "20%", endingShape: "rounded" } },
    dataLabels: { enabled: !1 },
    xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"] },
    colors: ["#eef3f7", "#ced6f9", "#3b5de7"],
    fill: { opacity: 1 },
};