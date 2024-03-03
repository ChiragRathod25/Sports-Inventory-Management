// let sidebarOpen=false;
// let sidebar=document.getElementById("sidebar");

// function openSidebar()
// {
//     if(!sidebarOpen){
//         sidebar.classList.add("sidebar-responsive");
//         sidebarOpen=true;
//     }
// }

// function closeSidebar()
// {
//     if(sidebar)
//     {
//         sidebar.classList.remove("sidebar-responsive");
//         sidebarOpen=false;
//     }
// }
let barChartOptions = {
    series: [{
      data: [10,8,6,4,2]
    }],
    chart: {
      type: 'bar',
      height:350,
      toolbar: {
        show: false
      },
    },
    colors: [
        "#246dec",
        "#cc3c43",
        "#367952",
        "#f5b74f",
        "#4f35a1"
    ],
    plotOptions: {
      bar: {
        distributed:true,
        borderRadius: 4,
        columnWidth:'40%',
        horizontal: false
      }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show:false
    },
    xaxis: {
        categories: ["Bat","Football","Geared Cycles","Skipping ropes","Shoes"]
    },
    yaxis: {
        title:{
            text:"count"
        }
    }
  };
  let barChart= new ApexCharts(document.querySelector("#bar-chart"),barChartOptions);
  barChart.render();

  /*+++++++++++ Area Chart +++++++++++*/
  let areaChartOptions = {
    series: [{
    name: 'Purcharse Orders',
    data: [29, 37, 44, 71, 100, 101, 150]
  }, {
    name: 'Sales Orders',
    data: [55, 69, 45, 61, 43, 54, 37]
  }],
    chart: {
    height: 350,
    type: 'area',
    toolbar:{
        show:false
    },
  },
  colors:["#4f35a1","#246dec"],
  dataLabels:{
    enabled: false,
  },
  stroke: {
    curve: 'smooth'
  },
  labels: [
    "Jan","Feb","Mar","Apr","May","Jun","Jul"
  ],
  markers: {
    size: 0
  },
  yaxis: [
    {
      title: {
        text: 'Purcharse Orders',
      },
    },
    {
      opposite: true,
      title: {
        text: 'Sales Orders',
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
  }
  };

  let areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
  areaChart.render();